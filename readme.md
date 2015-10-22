## Med-dico

Install
-------
    git clone ...
    php composer install
    ouvrir config/app.php, env('APP_DEBUG') passé la valeur à "true", pour activé le debug
    cp .env.example .env
    php artisan key:generate

Update
------
    git pull
    php composer install

Install BDD
-----------
    crée une BDD "med-dico"
    configurer le fichier config/database.php
    php artisan migrate

