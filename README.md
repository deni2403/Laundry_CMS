# Alza Laundry CMS
Tugas Capstone Kelompok 7 MSIB 5


## Features :
- Web Profile
- CRUD Order
- CRUD Event
- CRUD Member
- CRUD Worker
- Read & Update Ironer
- Read & Update Packer
- WA Notification
- Add Member Point
- Discount by Point
- Tracking Order


# This project was built using :

## FrontEnd :
- HTML 5
- Bootstrap 5
- CSS 3
- JavaScript
- Sweetalert (https://realrashid.github.io/sweet-alert/)
- Trix Editor (https://trix-editor.org/)

## BackEnd :
- Laravel Breeze (https://laravel.com/docs/10.x/starter-kits#laravel-breeze)
- Intervention Image (https://image.intervention.io/v2)
- Wablas (https://pati.wablas.com/)

## Database :
- MySQL

## Settings
- Copy - Paste ENV Example and rename to .env
- change ";extension=gd" to "extension=gd" at php.ini file to use gd driver.

## Instalation & Run :
```bash
- https://github.com/deni2403/Laundry_CMS.git 
- composer install 
- npm install
- npm run build
- php artisan storage:link (for link storage to public)
- php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent" (for intervention image)
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan serve
- npm run dev (for hot reload)
```