# **Maret 2021**

Saya memulai untuk mencoba menggabungkan PHP, ESP32, dan dengan menggunakan protokol MQTT dalam sebuah jaringan lokal. Lebih lengkapnya
bisa lihat di [`Blog saya`](http://vellstar.epizy.com/Vellstar/Apps/konten.php?konten=Misc&&materi=IOT%20dengan%20esp32,%20PHP,%20Protokol%20MQTT%201) Sorry Hosting Gratis gan hehe :)

Untuk Library PHP_MQTT saya dapat dari
http://github.com/bluerhinos/phpMQTT

## Instal Library menggunakan Composer pada [`/phpmqtt2`](https://github.com/azzamwildan462/PHP_ESP32_MQTT/tree/main/phpmqtt2)

`composer require bluerhinos/phpmqtt=@dev`

Jika di dalam folder [`/phpmqtt2`](https://github.com/azzamwildan462/PHP_ESP32_MQTT/tree/main/phpmqtt2) sudah terdapat folder 'vendor'
maka instalasi Library telah berhasil

## Penggunaan

Jangan lupa untuk mengganti konfigurasi SSID, PW, IP, dan Port pada
ESP32 dan juga konfigurasi Server, Port, dan ID pada PHP. Jangan lupa juga untuk mengahapus library 'Arduino.h' pada ESP32 (Jika anda menggunakan Arduino IDE)

# Terimakasih telah berkunjung :)
