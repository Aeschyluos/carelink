# CareLink - Healthcare Consultation System

CareLink adalah aplikasi berbasis web untuk konsultasi kesehatan yang memudahkan pasien untuk:

-   Mencari dan berkonsultasi dengan dokter
-   Menemukan klinik/rumah sakit terdekat
-   Membeli obat over-the-counter (OTC)

## 🚀 Fitur Utama

### Admin

-   Manajemen Data Dokter (CRUD)
-   Manajemen Data Klinik (CRUD)
-   Manajemen Data Obat (CRUD)
-   Monitoring Konsultasi & Pesanan
-   Dashboard Statistik

### Client

-   Browse & Search Dokter
-   Browse & Search Klinik
-   Booking Konsultasi Dokter
-   Beli Obat OTC
-   Shopping Cart
-   History Konsultasi & Pesanan

## 📋 Requirements

-   PHP >= 8.2
-   Composer
-   MySQL
-   Laravel 12

## 🛠️ Instalasi

```bash
# Clone repository
git clone https://github.com/username/carelink.git
cd carelink

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Konfigurasi database di .env
# DB_DATABASE=carelink
# DB_USERNAME=root
# DB_PASSWORD=

# Run migrations & seeders
php artisan migrate --seed

# Link storage
php artisan storage:link

# Start server
php artisan serve
```

## 👥 Login Credentials

**Admin:**

-   Email: admin@carelink.com
-   Password: password

**Client:**

-   Email: client@carelink.com
-   Password: password

## 🌐 Teknologi

-   Laravel 12
-   Bootstrap 5 (via CDN)
-   Bootstrap Icons
-   MySQL
-   PHP 8.2+

## 📸 Screenshots

[Tambahkan screenshots aplikasi]

## 👨‍💻 Tim Pengembang

-   [Nama 1] - [NIM]
-   [Nama 2] - [NIM]
-   [Nama 3] - [NIM]

## 📄 License

This project is for educational purposes.
