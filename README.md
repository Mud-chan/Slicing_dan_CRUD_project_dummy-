# Laravel Dummy Boilerplate - Figure Shop

Proyek ini adalah **boilerplate Laravel** dengan fitur:
- Autentikasi menggunakan **Laravel Breeze**
- CRUD Produk (Create, Read, Update, Delete)
- Upload gambar produk
- Tampilan dengan Bootstrap
- Pagination data
- Layout Blade Template

---
# Instalasi & Menjalankan Proyek
1. **Clone Repository**
   ```bash
    [git clone https://github.com/username/projek-wesclic.git
    cd projek-wesclic](https://github.com/Mud-chan/Slicing_dan_CRUD_project_dummy-.git)
2. **Atur Konfigurasi Database di .env**
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=projek_wesclic
    DB_USERNAME=root
    DB_PASSWORD=
3. **Jalankan Migrasi Database**
    php artisan migrate
4. **nstall Laravel Breeze**
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install
    npm run build
    php artisan migrate
5. **Membuat Model Products**
    php artisan make:model Product -mcr
    php artisan migrate
6. **Membuat Seeder Products**
    php artisan make:seeder ProductSeeder
7. **Jalankan Projek**
    php artisan serve

   
# Struktur Project
projek-wesclic/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controller aplikasi
│   │   │   └── ProductController.php
│   ├── Models/
│   │   └── Product.php       # Model produk
├── public/
│   └── uploads/              # Folder untuk upload gambar produk
├── resources/
│   ├── views/
│   │   ├── layouts/          # Template layout utama
│   │   ├── products/         # View CRUD produk
│   │   └── auth/             # View login/register Breeze
├── routes/
│   └── web.php               # Routing aplikasi
├── database/
│   ├── migrations/           # Struktur database
│   └── seeders/              # Seeder database
├── .env                      # Konfigurasi environment
└── README.md                 # Dokumentasi proyek


# Sample Akun Login
email : hikarilight83@gmail.com
pass  : 12345678

