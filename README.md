<div>
    <img src="./public/assets/img/relearun-logo.svg" width="350" alt="" />
</div>

ReleaRun s'occupe de la gestion des versions applicatives. L'objectif est d'avoir une vision globale des versions deployées sur les envirronements.

## ⭐ Features
* Push version
* Gestion des versions
* Authentification token
* Addons chrome

## 🔧 Installation
```
# 1 - installation fichier d'envirronnement
cp _.env.exempl .env
# 2 - installation des packages
composer install
# 3 - installation de la base de donnée
# 3.1 Création des fichiers SQL (compatible sqlite/Mysql/Mariadb)
php bin/console make:migration
# 3.2 Import de la structure SQL
php bin/console doctrine:migration:migrate
```

### Author 
- Benoit Foujols 
- Noa Sillam 
- Athittyan Balagowriyan

### MIT License