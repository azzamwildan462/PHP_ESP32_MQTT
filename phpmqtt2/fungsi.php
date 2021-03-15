<?php
require 'vendor/bluerhinos/phpmqtt/phpMQTT.php'; //memanggil librari yang telah kita instal

function publish_mqtt($topik, $pesan, $jumlah, $delay, $qos) //membuat fungsi publish
{
    $server = '192.168.1.5'; //set IP Broker/Server
    $port = 1883;   //set port
    $id = 'wildan462'; //set ID terserah mau dibuat apa atau bisa pake fungsi uniqid()
    $i = 0; //untuk keperluan perulangan mengirim pesan

    $mqtt_client = new Bluerhinos\phpMQTT($server, $port, $id); //instansce class 
    if ($mqtt_client->connect(true, NULL, '', '')) {    //memulai hubungan dengan broker
        while ($i < $jumlah) {  //perulangan kirim pesan
            $mqtt_client->publish($topik, $pesan, $qos);    //kirim pesan
            $i++;
            sleep($delay);
        }
        $mqtt_client->close();  //memutuskan hubungan dengan broker :(
    }
}

function subscribe_mqtt($topik, $qos)   //Membuat fungsi Subscribe
{
    $server = '192.168.1.5';    //Sama seperti diatas
    $port = 1883;       //sama juga
    $id = 'wildan462';  //sama juga

    $mqtt_client = new Bluerhinos\phpMQTT($server, $port, $id); //sama juga instance Class
    if ($mqtt_client->connect(true, NULL, '', '')) { //sama juga :) :v
        $pesan = $mqtt_client->subscribeAndWaitForMessage($topik, $qos); //subscribe pada topik dan menunggu sampai ada yang publish ke topik itu
        $mqtt_client->close();  //sama juga :)
    }
    return $pesan;  //mengembalikan nilai berupa pesan yang didapat dari topik yang telah di subscribe
}
