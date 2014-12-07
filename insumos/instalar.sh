sudo chmod -R 777 app/storage/
composer install
rm vendor/mrjuliuss/syntara/src/models/Permissions/Permission.php
rm vendor/cartalyst/sentry/src/Cartalyst/Sentry/Users/Eloquent/User.php
rm vendor/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Eloquent/Group.php

cp configModels/Permission.php vendor/mrjuliuss/syntara/src/models/Permissions/Permission.php
cp configModels/User.php vendor/cartalyst/sentry/src/Cartalyst/Sentry/Users/Eloquent/User.php
cp configModels/Group.php vendor/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Eloquent/Group.php

psql -U postgres -w -h localhost -p 5432 < bdSql/respaldo_insumos.sql

php artisan migrate
php artisan db:seed
