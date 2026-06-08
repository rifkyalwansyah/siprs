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
siprs_cibarusah
```

## 🔐 Login Default

Silakan sesuaikan dengan data pengguna yang tersedia pada database.

Contoh:

Username : admin

Password : admin123

## 📸 Screenshot

* Halaman Login
  <img width="1536" height="1024" alt="login page" src="https://github.com/user-attachments/assets/c9650da0-53b0-4c48-a9f1-9775a65af8f9" />

* Dashboard
  <img width="1918" height="968" alt="dashboard page" src="https://github.com/user-attachments/assets/1532fced-c4e5-4a26-9c02-6ed9bf934784" />

* Data Inventaris
  <img width="1918" height="966" alt="inventaris aset page" src="https://github.com/user-attachments/assets/b21ab862-bf06-47c6-a066-bb244c0aa8c6" />

<img width="1918" height="967" alt="master data kategori page" src="https://github.com/user-attachments/assets/c5e8d188-7411-4457-9840-61790fd1f610" />

<img width="1918" height="971" alt="master data ruangan page" src="https://github.com/user-attachments/assets/a70f6d39-83c6-4792-ab3a-1b41a19e8a7f" />

* Form Tambah Inventaris
<img width="1918" height="971" alt="master data ruangan page" src="https://github.com/user-attachments/assets/4f6e5f4e-f462-486b-aed1-90c4de33de7c" />

<img width="1918" height="963" alt="tambah kategori aset page" src="https://github.com/user-attachments/assets/100c4fe9-8bf6-43cd-9ffa-858f0882fd00" />

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
