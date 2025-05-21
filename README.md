# Aplikasi Manajemen Data Barang

Aplikasi ini dibuat menggunakan Framework Laravel 12 dan Filament 3

## Fitur Utama

- CRUD Data Produk dengan kategori terstruktur  
- Validasi input dan format harga Rupiah  
- Filter produk berdasarkan kategori dan stok  
- Dashboard ringkasan produk dan stok  
- Autentikasi user dengan role admin  

## Untuk Instalasi bisa gunakan ini

1. Clone repository ini  git clone https://github.com/username/manajemen-data-barang.git
2. Install dependensi composer dan npm  
> composer install
> npm install && npm run build
3. Buat file `.env` dan atur konfigurasi database serta APP_KEY  
> cp .env.example .env
> php artisan key:generate
4. Migrasi dan seeder  
5. Running
> php artisan serve

6.  Login di `/admin` dengan user admin yang sudah dibuat lewat seeder

## Lisensi
Project ini dibuat untuk mememnuhi persyaratan Nilai Akademik

File analisa ada Pada Analisis-Aplikasi.pdf
