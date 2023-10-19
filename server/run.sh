#!/bin/sh
php artisan migrate:fresh --seed -n --force
php artisan serve --host=0.0.0.0 --port=8000