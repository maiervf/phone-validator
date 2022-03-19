## Requisites
- PHP ^7.1
- Composer 
- Laravel pre-requisites (sudo apt install openssl php-common php-curl php-json php-mbstring php-xml php-zip)

## Installation

- Clone the repository (git clone )
- cd phoneValidator
- composer install
- php artisan serve
- See the app running on 127.0.0.1:8000

## Considerations

- To improve performance, we should add a column on the database, "validNumber", and use a script to validate and set the valid/invalid property before run it
- Update the app (if exists) to not allow invalid numbers, or at least to save the register with the valid/invalid property
- I used PHP to filter for valid/invalid numbers, it could be done with mysql, but I believe it is not the idea of the test
