<div align="center">
    <h3>Virtual Internship Experience (Investree)</h3>
    <p>Membangun Blog Sederhana Menggunakan laravel Blade serta Laravel UI</p>
</div>

<br></br>
#### Tujuan : Agar dapat menerapkan fitur blade serta laravel ui ke dalam project

1. Buatlah fitur authentication menggunakan laravel UI
2. Kemudian buatlah fungsional CRUD article serta category 
3. Gunakan laravel blade untuk membuat templatenya
4. Gunakan relasi laravel eloquent untuk menghubungkan relasi antar tabel
5. Gunakan seeder untuk membuat sample user
6. Unit testing setiap halaman crud dan fitur 

<br></br>
### Prepare dependencies
    - composer install
    - cn .env.example .env

### Change Database Config
    Change Database configuration in .env

### Generate and Migration
    - php artisan key:generate
    - php artisan migrate
    - php artisan db:seed --class=UserSeeder
    
### Prepare FrontEnd
    - npm install
    - npm run dev

### Run PHP Unit Testing and Development Server
    - php artisan test
    - php artisan serve
