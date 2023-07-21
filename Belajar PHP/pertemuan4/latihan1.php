<?php 
// Function
// .

// Built-in Function
// date/Time
// 1. time()
// 2. date()
// 3. mktime()
// 4. strtotime()
// 

// DATE
// echo date("l, d-M-y"); // Untuk Menampilkan tanggal dengan format tertentu

// TIME
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo date("l, d M Y", time()-60*60*24*100);

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, tanggal, bulan, tahun
// echo date("l", mktime(0,0,0,17,5,2003));

// strtotime
// kebalikan dari mktime
// echo date("l", strtotime("17 mei 2003"));


// STRING
// 1. strlen() untuk menghitung panjang dari string
// 2. strcmp() untuk menggabungkan dua string
// 3. explode() untuk memecah string menjadi array
// 4. htmlspecialchars() untuk mencegah menjaga website kita dari hecker

// UTILITY
// var_dump()
// isset() untuk mengecek apakah sebuah variabel sudah pernah di buat apa belum
// empty() untuk mengecek variabel yang ada sudah ada isis apa belum
// die() untuk memberhentikan program kita
// sleep() untuk memeberhentikan program kita sementara

