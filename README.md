# **13 Maret 2021**

Saya memulai untuk mencoba menggabungkan PHP, ESP32, dan dengan menggunakan protokol MQTT dalam sebuah jaringan lokal. Lebih lengkapnya
bisa lihat di [`Blog saya`](http://vellstar.epizy.com/Apps/konten.php?konten=Misc&&materi=IOT%20dengan%20esp32,%20PHP,%20Protokol%20MQTT%201) Sorry Hosting Gratis gan hehe :)

Untuk Library PHP_MQTT saya dapat dari
http://github.com/bluerhinos/phpMQTT

## Instalasi Library PHP-MQTT menggunakan Composer pada [`/phpmqtt2`](https://github.com/azzamwildan462/PHP_ESP32_MQTT/tree/main/phpmqtt2)

Ketikkan pada Terminal: 

`composer require bluerhinos/phpmqtt=@dev`

Jika di dalam folder [`/phpmqtt2`](https://github.com/azzamwildan462/PHP_ESP32_MQTT/tree/main/phpmqtt2) sudah terdapat folder 'vendor'
maka instalasi Library telah berhasil

## Instalasi Library 'PubSubClient' untuk ESP32 
Jika menggunakan platformIO, klik gambar lebah 'platformIO icon' lalu klik 'LIbraries' tinggal cari 'PubSubClient' lalu klik 'add to project'

## Penggunaan

Jangan lupa untuk mengganti konfigurasi SSID, PW, IP, dan Port pada
ESP32 dan juga konfigurasi Server, Port, dan ID pada PHP. Jangan lupa juga untuk mengahapus library 'Arduino.h' pada ESP32 (Jika anda menggunakan Arduino IDE)

## Kerjasama

Jika ingin bekerja sama dan menyumbang ide sekaligus belajar bersama monggo chat [`saya`](https://api.whatsapp.com/send?phone=6282245090113). Oh iya, saya juga baru terjun ke dunia IoT hehe.. 

#### Jadilah orang yang berakhlak mulia, cerdas, dan kompetitif. MAJU BERSAMA HEBAT SEMUA..

