@echo off

docker-compose exec php-fpm sh -c "cd /var/www/laravel_activity && php artisan %*"


@REM .\laravel.bat migrate
@REM .\laravel.bat route:list
