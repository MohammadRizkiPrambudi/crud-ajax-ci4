Minimal 
- PHP 7.3
- MAMP, XAMPP, Laragon, Nginx sebagai web server

Cara Installasi dan Menjalankan Program

- Clone atau download file
- Ketik composer install
- Buat database baru bernama latihan
- import database yang ada di folder db
- Rename .env.example jadi .env atau ketik cp .env.example .env
- Konfigurasi database di .env sesuai web server yang kamu gunakan
- Atur CI_ENVIRONMENT=production jadi CI_ENVIRONMENT=development (optional)
- Jalankan php spark serve
- Selesai
