## Med-dico

Mettre à jour avec :

    git remote set-url origin git@bitbucket.org:leaneous/jobtruster.git
    git pull

Install
-------
    git clone ...
    php composer install
    ouvrir config/app.php, puis 'debug' => env('APP_DEBUG', false) => debug' => env('APP_DEBUG', true). Pour activé le debug
    cp .env.example .env
    php artisan key:generate

Update
------
    git pull
    php composer install