# MVC PHP Native - Data Film
# MVC PHP Native - Data Film

Aplikasi CRUD sederhana data film untuk mempelajari pola Model-View-Controller pada PHP Native.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- XAMPP atau Laragon
- Git

## Instalasi
1. Clone atau salin project ke folder htdocs.
2. Import `database/film.sql`.
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/laprak2_mvcfilm_109062530011/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data.
- `app/controllers/` : alur request dan pemanggilan Model/View.
- `app/views/` : tampilan HTML.
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point dan aset (CSS).

## Fitur
- Menampilkan data film
- Menambah data film
- Mengubah data film
- Menghapus data film
- Validasi input dan pesan sukses/gagal

## Histori Git
c9c0b38 (HEAD -> main) style: add basic stylesheet
* 78f3d4e feat: add front controller and routing
* 31deb3a feat: add film list, create, and edit views
* 6a9c4f3 feat: add film CRUD controller with validation and flash message
* 920aab3 feat: add film CRUD model
* 6c591d5 feat: add PDO database connection
* b842cad feat: add film database schema and seed data
:...skipping...
* c9c0b38 (HEAD -> main) style: add basic stylesheet
* 78f3d4e feat: add front controller and routing
* 31deb3a feat: add film list, create, and edit views
* 6a9c4f3 feat: add film CRUD controller with validation and flash message
* 920aab3 feat: add film CRUD model
* 6c591d5 feat: add PDO database connection
* b842cad feat: add film database schema and seed data
* e42c542 chore: initialize mvc php native film project
~
~
~
~
~
~
~
~
~
~
~
~
~
~
(END)...skipping...
* c9c0b38 (HEAD -> main) style: add basic stylesheet
* 78f3d4e feat: add front controller and routing
* 31deb3a feat: add film list, create, and edit views
* 6a9c4f3 feat: add film CRUD controller with validation and flash message
* 920aab3 feat: add film CRUD model
* 6c591d5 feat: add PDO database connection
* b842cad feat: add film database schema and seed data
* e42c542 chore: initialize mvc php native film project
~
~
~
~
~
~
~
~
~
~
~
~
~
~
~
(END)
* c9c0b38 (HEAD -> main) style: add basic stylesheet
* 78f3d4e feat: add front controller and routing
* 31deb3a feat: add film list, create, and edit views
* 6a9c4f3 feat: add film CRUD controller with validation and flash message
* 920aab3 feat: add film CRUD model
* 6c591d5 feat: add PDO database connection