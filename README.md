# Tire Management Dashboard

Sistem manajemen ban berbasis Laravel untuk memantau kondisi ban, riwayat pemasangan, umur pakai, dan data kendaraan secara terpusat.

## 🚀 Features

* Dashboard KPI
* Monitoring Ban Aktif
* Monitoring Ban Scrap
* Lifetime Ban Tracking
* Riwayat Pemasangan Ban
* Manajemen Data Ban
* Manajemen Kendaraan
* Responsive Dashboard
* Docker Support
* MySQL/MariaDB Database

---

## 🛠 Tech Stack

* Laravel 12
* PHP 8.3+
* MySQL / MariaDB
* Docker & Docker Compose
* Tailwind CSS
* Blade Template Engine

---

## 📋 Requirements

Pastikan software berikut sudah terinstall:

* Docker
* Docker Compose
* Git

Cek versi:

```bash
docker --version
docker compose version
git --version
```

---

## 📦 Installation

Clone repository:

```bash
git clone https://github.com/YOUR_USERNAME/tire-admin.git
cd tire-admin
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## ⚙️ Database Configuration

Sesuaikan konfigurasi database pada file `.env`.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=tire_management
DB_USERNAME=laravel
DB_PASSWORD=password123
```

> Sesuaikan dengan konfigurasi database yang digunakan.

---

## 🐳 Run Using Docker

Build dan jalankan container:

```bash
docker compose up -d --build
```

Cek container:

```bash
docker ps
```

Pastikan container `tire-dashboard` berstatus **Up**.

---

## 🗄 Database Migration

Masuk ke container:

```bash
docker exec -it tire-dashboard bash
```

Jalankan migration:

```bash
php artisan migrate
```

Jika tersedia seeder:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate:fresh --seed
```

⚠️ Perintah `migrate:fresh` akan menghapus seluruh data database.

---

## 🌐 Access Application

Buka browser:

```text
http://localhost:8000
```

Akses dari perangkat lain dalam jaringan:

```text
http://IP-LAPTOP:8000
```

Contoh:

```text
http://192.168.1.10:8000
```

---

## 📱 Responsive Design

Dashboard dirancang agar dapat digunakan pada:

* Desktop
* Laptop
* Tablet
* Smartphone

---

## 🔧 Useful Commands

Restart container:

```bash
docker compose restart
```

Stop container:

```bash
docker compose down
```

Melihat log:

```bash
docker logs tire-dashboard
```

Masuk ke container:

```bash
docker exec -it tire-dashboard bash
```

Clear cache Laravel:

```bash
php artisan optimize:clear
```

---

## 📂 Project Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
Dockerfile
docker-compose.yml
README.md
```

---

## 🔒 Security Notes

* Jangan commit file `.env`
* Jangan simpan password database di repository publik
* Gunakan `.env.example` untuk konfigurasi contoh

---

## 👨‍💻 Author

Developed by Mas

Tire Management Dashboard Project
Built with Laravel & Docker

---

## 📄 License

This project is licensed under the MIT License.
.
