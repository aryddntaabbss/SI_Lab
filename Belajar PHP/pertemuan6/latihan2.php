<?php
$mahasiswa = [
                ["Nama" => "Agil Aryaddinata Abbas", "NPM" => "07352111135", "Jurusan" => "Teknik Informatika", "Email" => "aryaddinataabbas017@gmail.com"],
                ["Nama" => "Ildha Rahmelia Umasugi", "NPM" => "07352111030", "Jurusan" => "Teknik Informatika", "Email" => "ildharahmelia04@gmail.com"]
];

// Array Associative
// definisinya sama dengan array numerik, kecuali
// key-nya adalah string yang kita buat sendiri

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Mahasiswa</title>
    </head>

    <body>
        <h1>Daftar Mahasiswa</h1>
        <?php foreach ($mahasiswa as $mhs) ?>
            <ul>
                <li>Nama    : <?= $mhs["Nama"]; ?></li>
                <li>Npm     : <?= $mhs["NPM"] ?></li>
                <li>Jurusan : <?= $mhs["Jurusan"] ?></li>
                <li>Email   : <?= $mhs["Email"] ?></li>
            </ul>



    </body>

</html>