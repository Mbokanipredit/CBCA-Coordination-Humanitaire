<?php
/**
 * CBCA Coordination Humanitaire - Connexion Base de Données (Railway & Local XAMPP)
 *
 * Lit automatiquement les variables configurées dans Railway :
 *   DB_CONNECTION=mysql
 *   DB_HOST=${{MySQL.MYSQLHOST}}
 *   DB_PORT=${{MySQL.MYSQLPORT}}
 *   DB_DATABASE=${{MySQL.MYSQLDATABASE}}
 *   DB_USERNAME=${{MySQL.MYSQLUSER}}
 *   DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Charger un fichier .env local s'il existe (sans écraser les variables Railway existantes)
$envFile = dirname(__DIR__) . '/.env';
if (is_readable($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value, " \t\n\r\0\x0B\"'");
        if (getenv($name) === false) {
            putenv("$name=$value");
            $_ENV[$name] = $value;
        }
    }
}

/**
 * Récupère une variable d'environnement avec valeur par défaut
 */
function cbca_env(array $keys, $default = '')
{
    foreach ($keys as $key) {
        $val = getenv($key);
        if ($val !== false && $val !== '') {
            return $val;
        }
        if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
            return $_ENV[$key];
        }
        if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
            return $_SERVER[$key];
        }
    }
    return $default;
}

$dbHost = cbca_env(['DB_HOST', 'MYSQLHOST'], '127.0.0.1');
$dbPort = cbca_env(['DB_PORT', 'MYSQLPORT'], '3306');
$dbName = cbca_env(['DB_DATABASE', 'MYSQLDATABASE'], 'cbca_db');
$dbUser = cbca_env(['DB_USERNAME', 'MYSQLUSER'], 'root');
$dbPass = cbca_env(['DB_PASSWORD', 'MYSQLPASSWORD'], '');

$pdo = null;
$dbError = null;

try {
    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $dbHost, $dbPort, $dbName);
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_TIMEOUT            => 5,
    ];

    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
    } catch (PDOException $e) {
        // En local (XAMPP), si la base cbca_db n'existe pas encore, la créer automatiquement
        if (in_array($dbHost, ['127.0.0.1', 'localhost'], true)) {
            $rootPdo = new PDO(sprintf('mysql:host=%s;port=%s;charset=utf8mb4', $dbHost, $dbPort), $dbUser, $dbPass, $options);
            $safeDb = preg_replace('/[^a-zA-Z0-9_]/', '', $dbName);
            $rootPdo->exec("CREATE DATABASE IF NOT EXISTS `{$safeDb}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
        } else {
            throw $e;
        }
    }

    // Initialisation automatique des tables si elles n'existent pas encore sur Railway / Local
    cbca_ensure_schema($pdo);
} catch (Throwable $e) {
    $dbError = $e->getMessage();
    error_log('[CBCA DB] Connexion MySQL indisponible : ' . $dbError);
}

/**
 * Crée automatiquement les tables requises si la base MySQL est vierge
 */
function cbca_ensure_schema(PDO $pdo): void
{
    static $checked = false;
    if ($checked) {
        return;
    }
    $checked = true;

    try {
        $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
        if ($stmt && $stmt->fetchColumn()) {
            return;
        }

        $pdo->exec("
            CREATE TABLE IF NOT EXISTS `users` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `first_name` VARCHAR(100) NOT NULL,
                `last_name` VARCHAR(100) NOT NULL,
                `email` VARCHAR(191) NOT NULL UNIQUE,
                `password_hash` VARCHAR(255) NOT NULL,
                `gender` VARCHAR(30) DEFAULT 'Masculin',
                `phone` VARCHAR(50) DEFAULT '+243 999 717 524',
                `birth_date` VARCHAR(50) DEFAULT '15 Juin 1988',
                `postal_code` VARCHAR(30) DEFAULT '6001',
                `city` VARCHAR(100) DEFAULT 'Goma',
                `country` VARCHAR(100) DEFAULT 'RDC',
                `address` VARCHAR(255) DEFAULT 'Quartier Katindo, Goma, Nord-Kivu',
                `bio` TEXT,
                `avatar` VARCHAR(255) DEFAULT 'images/dashboard_profile_img.webp',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        $pdo->exec("
            CREATE TABLE IF NOT EXISTS `donations` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `first_name` VARCHAR(100) NOT NULL,
                `last_name` VARCHAR(100) NOT NULL,
                `email` VARCHAR(191) NOT NULL,
                `phone` VARCHAR(50) NOT NULL,
                `amount` DECIMAL(12, 2) NOT NULL DEFAULT 20.00,
                `currency` VARCHAR(10) NOT NULL DEFAULT 'USD',
                `contribution_method` VARCHAR(120) NOT NULL DEFAULT 'Mobile Money (Airtel/M-Pesa/Orange)',
                `message` TEXT,
                `status` VARCHAR(30) NOT NULL DEFAULT 'pending',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        $pdo->exec("
            CREATE TABLE IF NOT EXISTS `contact_messages` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `full_name` VARCHAR(150) NOT NULL,
                `email` VARCHAR(191) NOT NULL,
                `phone` VARCHAR(50) DEFAULT NULL,
                `subject` VARCHAR(200) DEFAULT NULL,
                `message` TEXT NOT NULL,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        $pdo->exec("
            CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
                `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `email` VARCHAR(191) NOT NULL UNIQUE,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");

        // Insérer l'utilisateur par défaut s'il n'existe pas
        $defaultHash = password_hash('Password123!', PASSWORD_DEFAULT);
        $seed = $pdo->prepare("
            INSERT IGNORE INTO `users` (
                `id`, `first_name`, `last_name`, `email`, `password_hash`,
                `gender`, `phone`, `birth_date`, `postal_code`, `city`, `country`, `address`, `bio`
            ) VALUES (
                1, 'Jean', 'Kabanga', 'coordhum.cbca@gmail.com', :hash,
                'Masculin', '+243 999 717 524', '15 Juin 1988', '6001', 'Goma', 'RDC',
                'Quartier Katindo, Goma, Nord-Kivu',
                'Acteur humanitaire engagé au sein de la Coordination Humanitaire CBCA pour le soutien des populations vulnérables et la résilience communautaire au Nord-Kivu.'
            )
        ");
        $seed->execute([':hash' => $defaultHash]);
    } catch (Throwable $e) {
        error_log('[CBCA DB] Erreur initialisation schéma : ' . $e->getMessage());
    }
}

/**
 * Récupère l'utilisateur connecté (ou le profil par défaut id=1 pour la démo)
 */
function cbca_get_current_user(?PDO $pdo): array
{
    $fallback = [
        'id'          => 1,
        'first_name'  => 'Jean',
        'last_name'   => 'Kabanga',
        'email'       => 'coordhum.cbca@gmail.com',
        'gender'      => 'Masculin',
        'phone'       => '+243 999 717 524',
        'birth_date'  => '15 Juin 1988',
        'postal_code' => '6001',
        'city'        => 'Goma',
        'country'     => 'RDC',
        'address'     => 'Quartier Katindo, Goma, Nord-Kivu',
        'bio'         => 'Acteur humanitaire engagé au sein de la Coordination Humanitaire CBCA pour le soutien des populations vulnérables et la résilience communautaire au Nord-Kivu.',
        'avatar'      => 'images/dashboard_profile_img.webp',
    ];

    if (!$pdo) {
        return $fallback;
    }

    try {
        $userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : 1;
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `id` = :id LIMIT 1');
        $stmt->execute([':id' => $userId]);
        $user = $stmt->fetch();
        if ($user) {
            return array_merge($fallback, $user);
        }
        $stmt = $pdo->query('SELECT * FROM `users` ORDER BY `id` ASC LIMIT 1');
        $user = $stmt ? $stmt->fetch() : false;
        return $user ? array_merge($fallback, $user) : $fallback;
    } catch (Throwable $e) {
        return $fallback;
    }
}

// Traitement global du formulaire Newsletter (présent dans includes/footer.php)
$newsletterNotice = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cbca_newsletter_email'])) {
    $nlEmail = filter_var(trim($_POST['cbca_newsletter_email']), FILTER_VALIDATE_EMAIL);
    if ($nlEmail && $pdo) {
        try {
            $stmt = $pdo->prepare('INSERT IGNORE INTO `newsletter_subscribers` (`email`) VALUES (:email)');
            $stmt->execute([':email' => $nlEmail]);
            $newsletterNotice = 'Merci ! Votre inscription à la newsletter CBCA a bien été enregistrée.';
        } catch (Throwable $e) {
            $newsletterNotice = 'Votre adresse email a bien été prise en compte.';
        }
    } elseif ($nlEmail) {
        $newsletterNotice = 'Merci pour votre inscription à la newsletter CBCA !';
    }
}

