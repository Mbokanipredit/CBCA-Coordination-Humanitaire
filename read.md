# 🤝 CBCA Coordination Humanitaire

[![License](https://img.shields.io/badge/License-Proprietary-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![GitHub](https://img.shields.io/badge/GitHub-Repository-181717?style=flat&logo=github&logoColor=white)](https://github.com/Mbokanipredit/CBCA-Coordination-Humanitaire)

> Plateforme web officielle de la **Coordination Humanitaire de la Communauté Baptiste au Centre de l'Afrique (3e CBCA)** en République Démocratique du Congo (RDC).

---

## 📌 À propos du projet

La **Communauté Baptiste au Centre de l'Afrique (3e CBCA)**, régie par l'Ordonnance n°170 du 12 juin 1964, est une organisation humanitaire et sociale active dans l'éducation, la santé, la protection et l'action d'urgence. 

À travers sa **Coordination Humanitaire**, elle met en œuvre des projets à haut impact pour alléger la souffrance des populations vulnérables et apporter secours, dignité et espoir aux communautés affectées par les crises.

### 🎯 Objectifs principaux de la plateforme :
- **Sensibilisation et visibilité** : Présentation des domaines d'intervention (Sécurité Alimentaire, Eau, Hygiène et Assainissement, Protection, Santé & Éducation).
- **Rapports et projets** : Publication des projets réalisés, des ressources téléchargeables, actualités et rapports d'impact.
- **Appel à la solidarité** : Module de dons et engagement des partenaires et bénévoles.

---

## 🛠️ Technologies & Stack Technique

- **Langage Serveur** : PHP 7.4+
- **Frontend & UI** : HTML5, CSS3, JavaScript (ES6), Bootstrap 5
- **Librairies JS** : 
  - jQuery 3.7.1
  - Slick Carousel (Bannières et carrousels)
  - Venobox (Modals vidéo et galerie)
  - CountUp.js & Waypoints (Statistiques animées)
  - Select2 & FontAwesome
- **Serveur Web** : Apache avec réécriture d'URL via `.htaccess`

---

## 📁 Structure du Projet

```text
CBCA-Project/
├── .htaccess                   # Configuration Apache & Réécriture d'URL
├── index.php                   # Page d'accueil principale
├── apropos.php                 # À propos de la CBCA
├── domaines.php                # Domaines d'intervention & détails
├── domaines_details.php
├── projets.php                 # Projets humanitaires réalisés
├── projets_details.php
├── actualites.php              # Actualités et communiqués
├── actualites_details.php
├── faire-un-don.php            # Module de don & contribution
├── contact.php                 # Page de contact
├── equipe.php                  # Présentation de l'équipe
├── impact.php                  # Rapport d'impact humanitaire
├── ressources.php              # Documents et publications
├── partenaires.php             # Partenaires techniques et financiers
├── sign_in.php / sign_up.php   # Authentification utilisateurs
├── includes/                   # Composants réutilisables (header, footer, head)
├── css/                        # Feuilles de styles
├── js/                         # Scripts et dépendances JS
├── images/                     # Médias, logos et illustrations
└── webfonts/                   # Polices typographiques (FontAwesome)
```

---

## 🚀 Installation & Déploiement Local

### Prérequis
- Un serveur web local avec support PHP (ex. **LAMP**, **XAMPP**, ou **WAMP**).
- PHP version 7.4 ou plus récente.
- Apache avec le module `mod_rewrite` activé.

### Étapes d'installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/Mbokanipredit/CBCA-Coordination-Humanitaire.git
   ```

2. **Placer le projet dans le répertoire web** :
   - Pour **XAMPP / LAMP** (Linux) : `/opt/lampp/htdocs/`
   - Pour **XAMPP** (Windows) : `C:/xampp/htdocs/`
   - Pour **WAMP** : `C:/wamp64/www/`

3. **Accéder à l'application** :
   Ouvrez votre navigateur web et naviguez vers :
   ```text
   http://localhost/CBCA-Project/
   ```

---

## 📝 Contribution

Les contributions pour l'amélioration du site ou la correction de bugs sont les bienvenues.
1. Forkez le projet.
2. Créez votre branche d'action (`git checkout -b feature/nom-de-fonctionnalite`).
3. Commitez vos modifications (`git commit -m 'Ajout d'une fonctionnalité'`).
4. Pushez votre branche (`git push origin feature/nom-de-fonctionnalite`).
5. Ouvrez une Pull Request.

---

## 📧 Contact & Support

**Coordination Humanitaire 3e CBCA**  
📍 Nord-Kivu, République Démocratique du Congo  
🌐 Site web : [CBCA Coordination Humanitaire](https://github.com/Mbokanipredit/CBCA-Coordination-Humanitaire)
