-- ============================================================================
-- CBCA Coordination Humanitaire - Schéma de Base de Données MySQL
-- Compatible avec Railway MySQL 8 & XAMPP / phpMyAdmin
-- ============================================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- 1. Table des utilisateurs (Authentification & Profil Dashboard)
-- ----------------------------------------------------------------------------
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

-- ----------------------------------------------------------------------------
-- 2. Table des intentions de dons (faire-un-don.php)
-- ----------------------------------------------------------------------------
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

-- ----------------------------------------------------------------------------
-- 3. Table des messages de contact (contact.php)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_messages` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(191) NOT NULL,
    `phone` VARCHAR(50) DEFAULT NULL,
    `subject` VARCHAR(200) DEFAULT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- 4. Table des abonnés à la newsletter (footer.php)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(191) NOT NULL UNIQUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Données initiales (Compte par défaut : coordhum.cbca@gmail.com / Password123!)
-- ----------------------------------------------------------------------------
INSERT IGNORE INTO `users` (
    `id`, `first_name`, `last_name`, `email`, `password_hash`,
    `gender`, `phone`, `birth_date`, `postal_code`, `city`, `country`, `address`, `bio`
) VALUES (
    1,
    'Jean',
    'Kabanga',
    'coordhum.cbca@gmail.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Masculin',
    '+243 999 717 524',
    '15 Juin 1988',
    '6001',
    'Goma',
    'RDC',
    'Quartier Katindo, Goma, Nord-Kivu',
    'Acteur humanitaire engagé au sein de la Coordination Humanitaire CBCA pour le soutien des populations vulnérables et la résilience communautaire au Nord-Kivu.'
);

SET FOREIGN_KEY_CHECKS = 1;

