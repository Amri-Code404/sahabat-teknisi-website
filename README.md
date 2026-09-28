# SahabatTeknisi — Admin Web

SahabatTeknisi adalah aplikasi jasa servis komputer dan jaringan Wi-Fi yang dibuat untuk membantu proses pengelolaan layanan servis, pelanggan, teknisi, transaksi, dan laporan.

Repository ini berisi **aplikasi web admin SahabatTeknisi** yang digunakan oleh admin sekaligus pemilik toko untuk mengelola berbagai data dan aktivitas yang berkaitan dengan layanan servis.

> **Catatan:** Repository ini merupakan bagian admin web dari project SahabatTeknisi. Aplikasi Android merupakan bagian terpisah dari project ini.

---

## Fitur

Admin web SahabatTeknisi menyediakan beberapa fitur utama:

* Dashboard
* Pengelolaan data pelanggan
* Pengelolaan data teknisi
* Pengelolaan data servisan
* Pengelolaan transaksi
* Pengelolaan data lainnya yang berkaitan dengan operasional servis
* Melihat laporan
* Mencetak laporan
* Autentikasi admin

---

## Teknologi

Project ini dibangun menggunakan:

* Laravel 12
* PHP
* MySQL
* Laragon
* Blade

MySQL digunakan sebagai database selama proses pengembangan dan dijalankan melalui Laragon.

---

## Persyaratan

Sebelum menjalankan project, pastikan perangkat sudah memiliki:

* PHP
* Composer
* MySQL
* Laragon
* Git

Pastikan versi PHP yang digunakan kompatibel dengan Laravel 12.

---

## Instalasi

### 1. Clone repository

```bash
git clone https://github.com/Amri-Code404/sahabat-teknisi-website
```

Masuk ke folder project:

```bash
cd nama-folder-project
```

### 2. Install dependency

```bash
composer install
```

### 3. Buat file environment

Salin `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

Pada Windows, file tersebut juga dapat disalin secara manual kemudian diubah namanya menjadi `.env`.

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Konfigurasi database

Buka file `.env` dan sesuaikan konfigurasi database MySQL.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sahabatteknisi
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nama database, username, dan password dengan konfigurasi MySQL pada perangkat masing-masing.

### 6. Migrasi database

Jalankan:

```bash
php artisan migrate
```

Jika project menggunakan seeder:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate --seed
```

### 7. Jalankan aplikasi

Jalankan server development Laravel:

```bash
php artisan serve
```

Kemudian buka alamat yang diberikan oleh Laravel, biasanya:

```text
http://127.0.0.1:8000
```

Project juga dapat dijalankan menggunakan environment Laragon sesuai konfigurasi yang digunakan.

---

## Akun Admin

Project menyediakan akun admin untuk mengakses halaman administrasi.

Informasi password tidak dicantumkan di repository untuk menghindari penyimpanan kredensial secara terbuka.

Jika akun admin dibuat melalui seeder, silakan periksa file seeder yang tersedia pada source code.

---

## Database

Project menggunakan MySQL sebagai database.

Pada lingkungan pengembangan, MySQL dijalankan melalui Laragon.

Struktur database dikelola menggunakan migration Laravel:

```bash
php artisan migrate
```

Jika tersedia seeder:

```bash
php artisan db:seed
```

Repository ini tidak menyertakan database MySQL secara langsung. Struktur database dikelola melalui migration Laravel.

---

## Struktur Project

Struktur aplikasi mengikuti struktur standar Laravel:

```text
sahabatteknisi/
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

Struktur sebenarnya dapat berbeda sesuai perkembangan project.

---

## Integrasi dengan Aplikasi Android

SahabatTeknisi juga memiliki aplikasi Android yang dikembangkan sebagai bagian dari project yang sama.

Saat ini admin web dan aplikasi Android belum memiliki integrasi langsung. Pengembangan selanjutnya direncanakan menggunakan Firebase sebagai salah satu teknologi untuk mendukung integrasi dengan aplikasi Android.

Integrasi tersebut masih merupakan bagian dari pengembangan selanjutnya.

---

## Status Project

Project ini telah selesai dikembangkan untuk kebutuhan project kuliah dan saat ini masih berjalan pada lingkungan lokal.

```text
Status       : Selesai untuk kebutuhan project
Environment  : Local Development
Deployment   : Belum dipublikasikan
```

Meskipun awalnya dibuat untuk kebutuhan tugas kuliah, repository ini dikelola sebagai project pengembangan aplikasi dan masih dapat dikembangkan lebih lanjut.

---

## Pengembangan Selanjutnya

Beberapa pengembangan yang dapat dilakukan di masa mendatang:

* Integrasi admin web dengan aplikasi Android
* Integrasi Firebase
* Penyediaan API untuk aplikasi Android
* Deployment ke server
* Peningkatan sistem autentikasi dan keamanan
* Pengembangan laporan yang lebih lengkap
* Pengembangan notifikasi status servis
* Peningkatan tampilan dan pengalaman pengguna

---

## Lisensi

Project ini menggunakan **MIT License**.

Lisensi ini memungkinkan kode digunakan, dimodifikasi, dan didistribusikan kembali dengan tetap mempertahankan pemberitahuan hak cipta dan lisensi.

Lihat file [`LICENSE`](LICENSE) untuk informasi lengkap mengenai lisensi yang digunakan.

---

## Pengembang

**SahabatTeknisi**

Project aplikasi jasa servis komputer dan jaringan Wi-Fi.
