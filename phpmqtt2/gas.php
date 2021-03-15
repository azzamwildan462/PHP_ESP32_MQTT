<?php
require 'fungsi.php'; //gk tau namanya apa :v intinya dia memanggil 'fungsi.php'

if (isset($_POST['tombol'])) {  //jika 'tombol' telah ditekan (Jika tersedia $_POST['tombol']) maka ....
    $pesan = $_POST['perintah'];    //tampung hasil dari $_post pada variabel baru
    publish_mqtt('perintah', $pesan, 1, 0.01, 0); //Publish pesan
}

if (isset($_POST['cek'])) { //jika 'cek' telah ditekan (Jika tersedia $_POST['cek']) maka ....
    $status_led = subscribe_mqtt('status_led', 0); //mengisi variabel status_led dengan pesan dari topik 'status_led'... Mindblowing :v
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IOT dengan PHP, ESP32, dan protokol MQTT</title>
</head>

<body>
    <form action="" method="post">
        <!-- membuat form dengan metode POST -->
        <label for="perintah">Perintah: </label> <!-- buat label biasa -->
        <input type="text" name="perintah" id="perintah"> <!-- membuat tempat inputan pesan -->
        <button type="submit" name="tombol" id="tombol">Kerjakan</button> <!-- membuat tombol -->
    </form>
    <br> <!-- Fungsinya seperti 'enter' atau '\n' -->
    <p>
        Status LED: <?= $status_led; ?>
        <!-- Mengeluarkan hasil status led yang telah kita dapat -->
    <form action="" method="post"><button name="cek" id="cek">Cek status</button></form> <!-- Membuat tombol untuk cek status led -->
    </p>
</body>

</html>