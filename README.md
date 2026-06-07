# SI-KUD

---

## Tech Stack

- Laravel
- PHP
- MySQL
- Tailwind CSS
- JavaScript
- Vite
- GitHub
- API
- Filament 5

---

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/valora-app.git
```

Masuk ke folder project:

```bash
cd valora-app
```

---

### 2. Install Dependency Backend

```bash
composer install
```

---

### 3. Install Dependency Frontend

```bash
npm install
```

---

### 4. Setup Environment

Copy file environment:

#### Linux / Mac

```bash
cp .env.example .env
```

#### Windows

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## Konfigurasi Database

Edit file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=valora_db
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru di MySQL/phpMyAdmin dengan nama:

```bash
valora_db
```

Lalu jalankan migration:

```bash
php artisan migrate
```

Jika ada seeder:

```bash
php artisan db:seed
```

---

## Menjalankan Project

Jalankan Laravel server:

```bash
php artisan serve
```

Jalankan Vite:

```bash
npm run dev
```

Akses aplikasi melalui:

```bash
http://127.0.0.1:8000
```

---

## Workflow Tim Development

### Buat branch baru sebelum coding

```bash
git checkout -b feature/nama-fitur
```

Contoh:

```bash
git checkout -b feature/login
```

---

### Setelah selesai coding

```bash
git add .
git commit -m "Menambahkan fitur login"
git push origin feature/login
```

---

### Pull Request

Setelah push:

- Buka repository GitHub
- Buat Pull Request
- Tunggu review dari project leader
- Merge ke branch `main`

---

## Struktur Tim

| Role               | Tugas                |
| ------------------ | -------------------- |
| Frontend Developer | UI/UX dan Blade View |
| Backend Developer  | Controller & Logic   |
| Database Developer | Migration & Database |
| Project Leader     | Review & Merge       |

---

## Rules Project

- Tidak boleh push langsung ke `main`
- Semua fitur wajib menggunakan branch sendiri
- Semua perubahan harus melalui Pull Request
- Gunakan migration untuk perubahan database

---

## Developer Team

Yogi Sepdu Dehiya
