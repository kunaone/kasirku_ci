# Panduan Migrasi Database (CLI Only)

Gunakan perintah terminal (CLI) berikut untuk mengelola struktur tabel database proyek ini.

## Persiapan Awal
Pastikan fitur migrasi sudah aktif di file: `application/config/migration.php`
* `$config['migration_enabled'] = TRUE;`

---

## Perintah Jalankan Migrasi (CLI)

### 1. Migrasi ke Versi Terbaru (Run UP)
Menjalankan fungsi `up()` untuk semua file migrasi baru yang belum masuk ke database.
```bash
php index.php migrate
```

### 2. Rollback ke Versi Tertentu (Run DOWN)
Menjalankan fungsi `down()` untuk membatalkan perubahan dan menurunkan versi database.

* **Format Sequential (001, 002):**
  Untuk mundur ke versi 2 (menghapus versi 3 ke atas):
  ```bash
  php index.php migrate version 2
  ```

* **Format Timestamp (20171001120000):**
  Untuk mundur ke waktu/timestamp tertentu:
  ```bash
  php index.php migrate version 20171001120000
  ```

### 3. Reset Total (Hapus Semua Tabel)
Menjalankan fungsi `down()` ke versi `0` untuk menghapus semua tabel yang dikelola migrasi.
```bash
php index.php migrate version 0
```

---

## Catatan Penting
* **Error Silang / Tidak Jalan?** Cek tabel `migrations` di database. Jika angka versinya sama dengan file terbaru Anda, CodeIgniter akan menganggap database sudah *up-to-date*. Ubah angkanya ke `0` secara manual di phpMyAdmin jika ingin mengulang dari awal.