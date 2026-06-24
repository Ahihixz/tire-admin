# 🚛 Tire Management Dashboard

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-Database-4169E1?style=for-the-badge&logo=postgresql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-UI-7952B3?style=for-the-badge&logo=bootstrap)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## 📌 Overview

Tire Management Dashboard adalah aplikasi berbasis Laravel untuk memonitor kondisi ban kendaraan tambang, alat berat, maupun armada operasional.

Dashboard ini membantu memantau:

- Total Ban
- Ban Aktif
- Ban Scrap
- Riwayat Pemasangan
- Monitoring Unit
- Lifetime Ban
- Jam Operasi
- Kilometer Operasi
- Inventory Ban

---

## ✨ Features

### 📊 Dashboard Monitoring

- KPI Cards
- Grafik Monitoring Ban
- Statistik Ban Aktif & Scrap
- Lifetime Tracking

### 🚛 Tire Management

- Tambah Ban
- Edit Ban
- Hapus Ban
- Detail Ban
- Tracking Status Ban

### 🚜 Vehicle Management

- Manajemen Unit Kendaraan
- Riwayat Pemasangan Ban
- Posisi Ban

### 📦 Inventory Management

- Data Stok Ban
- Supplier Ban
- Monitoring Persediaan

### 🛠 Maintenance

- Jadwal Maintenance
- Riwayat Perawatan Ban

---

## 🏗 Tech Stack

| Technology | Version |
|------------|---------|
| PHP | 8.2+ |
| Laravel | 12 |
| PostgreSQL | Latest |
| Bootstrap | 5 |
| Chart.js | Latest |

---

## 📂 Project Structure

```bash
app/
├── Models
├── Http/Controllers
resources/
├── views
routes/
├── web.php
database/
├── migrations


⚙️ Installation

Clone repository:

git clone https://github.com/USERNAME/tire-management-dashboard.git

Masuk ke folder project:

cd tire-management-dashboard

Install dependency:

composer install

Copy environment:

cp .env.example .env

Generate key:

php artisan key:generate

Setup database lalu jalankan:

php artisan migrate --seed

Jalankan server:

php artisan serve

Akses:

http://127.0.0.1:8000