# Laravel Command

## Laravel-Modules
```
php artisan module:make AdminModule
```

## filamentphp
```
php artisan make:filament-panel app
```
```
php artisan shield:setup --fresh
php artisan shield:generate --all
```

## Eloquent
Generate a model: controller, resource, requests, migration, seeder
```
php artisan make:model User -crRms
```

## Migrate
```
php artisan make:migration create_users_table
```
```
php artisan make:migration update_users_table
```
```
php artisan migrate:refresh --seed
```
```
php artisan migrate:rollback --step=1
```

## Seed
```
php artisan make:seeder UserSeeder
php artisan db:seed --force
```

## Reset
```
composer dump-autoload
php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```
