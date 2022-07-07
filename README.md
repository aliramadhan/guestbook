## guestbook
 
## Cara Deploy

# Clone repo

https://github.com/aliramadhan/guestbook.git

# Buat database dengan nama 'guestbook'

# edit file .env.example menjadi .env

# edit file .env dan setting database, user, password sesuai settingan database anda

# buka cmd dan masuk ke direktori projek kemudian jalankan command : 

1. php artisan key:generate (untuk regenerate key projek laravel).
2. php artisan composer install (untuk mendownload dan install vendor-vendor yang dibutuhkan)
3. php artisan migrate --seed (untuk membuat table dan data admin untuk login)
4. php artisan serve (digunakan untuk launch server laravel)

# akses web menggunakan ip yang diperoleh ketika run 'php artisan serve' (127.0.0.1:8000)

# login menggunakan email : test@example.com dan password : qweqweqwe
