1.Masuk Ke phpmyadmin
2.Pilih tab Import
3.Pilih sql setupnya
    -CleanSetup.sql :Struktur Table Bersih
    -DummySetup.sql :Struktur Table Berisi Data Dummy
5.lalu import

(Lewati Langkah ini jika pilih CleanSetup.sql)
6.lalu Masuk Database green-core
7.Masuk Tab import
8.Pilih DummySetup > green-core_extra.sql(Untuk Konfigurasi Primary Key)
9.Lalu Import(Abaikan Error Category Karna Table Tersebut Sudah Mempunyai Primary Key)
10.Masuk ke Table Produk
11.Masuk Tab Import
12.Import Data yang Berada Di DummySetup diBawah ini
    -green-core-alat-dummy.sql
    -green-core-bibit-dummy.sql
    -green-core-iot-dummy.sql
13.Setelah Selesai Anda BIsa Akses localhost/green-core/ untuk ke Halaman Beranda

--Dummy Account--
Email:user@mail.com     pass:12345678   Sebagai:Tokoh Alat
Email:user2@mail.com    Pass:12345678   Sebagai:Tokoh Bibit
Email:user3@mail.com    Pass:12345678   Sebagai:Tokoh IOT