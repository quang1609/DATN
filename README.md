# DATN
## How to install project and run
### Clone project
    git clone https://github.com/dangdinhphuong/logistics
### Setup verdor
    composer install
### Setup .env        
      cp .env.example .env
      php artisan key:generate
      ...
      // install further in .env :)
### Run
      php artisan serve
      
### Download template   
https://adminlte.io/
composer create-project --prefer-dist laravel/laravel:^7.0 blog