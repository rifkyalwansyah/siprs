# 🏥 SIPRS - Sistem Informasi Pengelolaan Rumah Sakit

SIPRS (Sistem Informasi Pengelolaan Rumah Sakit) adalah aplikasi berbasis web yang dikembangkan untuk membantu pengelolaan data inventaris, aset, dan administrasi rumah sakit secara lebih efektif dan terstruktur.

## 📋 Fitur Utama

* Dashboard Admin
* Manajemen Data Inventaris
* Tambah Data Inventaris
* Edit Data Inventaris
* Hapus Data Inventaris
* Upload Foto Inventaris
* Pencarian Data Inventaris
* Login dan Logout
* Manajemen Pengguna
* Penyimpanan Data ke Database MySQL

## 🛠️ Teknologi yang Digunakan

* PHP Native
* MySQL
* HTML5
* CSS3
* JavaScript
* Bootstrap
* XAMPP
* Git & GitHub

## 📂 Struktur Project

```text
siprs/
│
├── assets/
├── config/
├── inventaris/
├── uploads/
├── login.php
├── logout.php
├── dashboard.php
├── index.php
└── database.sql
```

## 💻 Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan telah menginstall:

* XAMPP
* PHP 8.x atau lebih baru
* MySQL/MariaDB
* Web Browser (Chrome, Edge, Firefox)

## 🚀 Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/rifkyalwansyah/siprs.git
```

### 2. Pindahkan ke Folder htdocs

```text
C:\xampp\htdocs\
```

### 3. Buat Database

Buka phpMyAdmin kemudian buat database:

```sql
siprs
```

### 4. Import Database

Import file:

```text
database.sql
```

ke database yang telah dibuat.

### 5. Konfigurasi Koneksi Database

Edit file konfigurasi database sesuai pengaturan lokal:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "siprs";
```

### 6. Jalankan Aplikasi

Aktifkan:

* Apache
* MySQL

melalui XAMPP Control Panel.

Kemudian akses:

```text
http://localhost/siprs
```

## 🔐 Login Default

Silakan sesuaikan dengan data pengguna yang tersedia pada database.

Contoh:

Username : admin

Password : admin123

## 📸 Screenshot

Tambahkan screenshot aplikasi pada folder:

```text
assets/screenshots/
```

Contoh:

* Halaman Login
* Dashboard
* Data Inventaris
* Form Tambah Inventaris

## 🌟 Pengembangan Selanjutnya

* QR Code Inventaris
* Cetak Laporan PDF
* Export Excel
* Multi Level User
* Riwayat Aktivitas Pengguna
* Notifikasi Inventaris
* Backup Database Otomatis

## 👨‍💻 Developer

Rifky Alwansyah Rajasa

GitHub:
https://github.com/rifkyalwansyah

## 📄 License

Project ini menggunakan lisensi MIT License.
