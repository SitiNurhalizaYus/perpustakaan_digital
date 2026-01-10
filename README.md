# Perpustakaan Digital Universitas  
Mini Project – Konstruksi dan Evolusi Perangkat Lunak

Halo!  
Project ini adalah mini project yang saya bangun untuk mata kuliah **Konstruksi dan Evolusi Perangkat Lunak**.  
Melalui project ini, saya mencoba mensimulasikan bagaimana sebuah sistem perangkat lunak tidak hanya dibuat sekali, tetapi **dikembangkan dan berevolusi** seiring bertambahnya kebutuhan.

Studi kasus yang digunakan adalah **Sistem Perpustakaan Digital Universitas**.

---

## Apa yang dilakukan sistem ini?

Sistem ini dibuat untuk membantu aktivitas di perpustakaan kampus, seperti:
- Mencari buku
- Meminjam dan mengembalikan buku
- Mengelola data mahasiswa
- Memberikan rekomendasi buku
- Menampilkan ringkasan data dalam dashboard

Sistem ini berkembang dari versi sederhana menjadi sistem yang lebih kompleks dan terintegrasi.

---

## Versi 1 – Sistem Awal

Pada versi pertama, sistem ini masih sederhana.  
Fitur yang tersedia:
- Daftar buku
- Pencarian buku berdasarkan judul dan penulis
- Peminjaman buku
- Pengembalian buku

Pada tahap ini, sistem belum mengenal identitas mahasiswa.  
Setiap peminjaman hanya dicatat sebagai teks biasa (`borrower`).  
Versi ini menggambarkan **sistem awal yang fungsional tetapi masih terbatas**.

---

## Versi 2 – Sistem Berevolusi

Pada versi kedua, sistem mulai dikembangkan menjadi lebih realistis seperti sistem di kampus sungguhan.

Perubahan yang dilakukan:
- Sistem sekarang memiliki data **mahasiswa** (tabel `users`)
- Data mahasiswa diambil dari **Sistem Akademik Kampus (SIAKAD)** melalui API
- Peminjaman sekarang terhubung ke mahasiswa melalui `user_id`
- Sistem menyimpan **riwayat pencarian**
- Sistem menampilkan **rekomendasi buku**
- Ditambahkan **dashboard** untuk melihat ringkasan data

Kolom lama `borrower` dihapus dan digantikan dengan relasi ke data mahasiswa.

---

## Integrasi dengan Sistem Akademik

Untuk mensimulasikan sistem kampus, dibuat sebuah API sederhana bernama:

mock_academic_api

akses sitem -> https://github.com/SitiNurhalizaYus/mock_academic_api.git

API ini menyediakan data mahasiswa melalui endpoint:
http://localhost:8001/api/students

Data mahasiswa dapat disinkronkan ke sistem perpustakaan melalui:
http://localhost:8000/sync-academic

Dengan ini, sistem perpustakaan benar-benar terhubung ke sistem akademik (walaupun masih dalam bentuk simulasi).

---

## Pengujian (Regression Test)

Setelah sistem berevolusi, dilakukan **pengujian regresi** menggunakan PHPUnit untuk memastikan bahwa fitur lama tetap berjalan.

Fitur yang diuji:
- Pencarian buku
- Peminjaman buku
- Pengembalian buku
- Integrasi data mahasiswa
- Rekomendasi buku

Semua test dijalankan dengan:
php artisan test

Hasilnya seluruh test **PASS**, yang berarti evolusi sistem tidak merusak fungsi lama.

---

## Teknologi yang Digunakan

- Laravel
- MySQL
- Bootstrap
- REST API
- PHPUnit

---

## Kesimpulan

Melalui project ini, saya belajar bahwa:
- Sistem tidak berhenti di versi pertama
- Perubahan pada database dan arsitektur sangat berpengaruh
- Testing sangat penting saat sistem berevolusi

Project ini bukan hanya CRUD buku, tetapi simulasi **sistem informasi perpustakaan yang terintegrasi dengan sistem akademik kampus**.

---


# Mini Project – Konstruksi dan Evolusi Perangkat Lunak
Siti Nurhaliza Yus 2511089003


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
