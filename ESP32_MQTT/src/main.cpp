#include <Arduino.h>
#include <WiFi.h>
#include <PubSubClient.h>

const char *ssid = "Wates Linux";        //Ganti pake nama WiFi kalian
const char *pw = "46221234e";            //Passwordnya juga :)
const char *mqtt_server = "192.168.1.5"; //Masukkan IP MQTT Broker kalian
int port = 1883;                         //port
const char *status_led = "mati";         //default dibuat mati

WiFiClient esp32client;                //instance WiFI Client (dari WiFi.h)
PubSubClient client_mqtt(esp32client); //instance PubSubClietn (dari PubSubClient.h)

void mqtt_callback(char *topik, byte *pesan, unsigned int panjang_pesan)
{
    String msgtemp; //untuk simpan pesan dari topik yang kita subscribe
    for (int i = 0; i < panjang_pesan; i++)
    {
        msgtemp += (char)pesan[i]; //merangkai pesan
    }

    if (msgtemp == "hidupkan led") //mengolah pesan
    {
        digitalWrite(2, HIGH);
        status_led = "hidup";
    }
    else if (msgtemp == "matikan led") //mengolah pesan
    {
        digitalWrite(2, LOW);
        status_led = "mati";
    }
}

void reconnect()
{
    while (!client_mqtt.connected()) //menghubungkan ke MQTT Broker sekaligus buat perulangan
    {
        Serial.println("Menguhubungkan ke MQTT Broker...");
        if (client_mqtt.connect("ESP8266Client")) //karena awal library untuk esp8266
        {
            Serial.println("Koneksi berhasil");
            client_mqtt.subscribe("perintah"); //subscribe ke topik "perintah"
        }
        else //tampil pesan errorrrr (Terserah mau dibuat gimana)
        {
            Serial.printf("Error\ntunggu 3 detik");
            delay(1000);
            Serial.print(".");
            delay(1000);
            Serial.print(".");
            delay(1000);
            Serial.println(".");
            Serial.println("Menghubungkan ulang...");
        }
    }
}

void setup()
{
    Serial.begin(115200); //esp32 punya default baud rate 115200 atau bisa diatur di platformio.ini
    pinMode(2, OUTPUT);   //Deklarasi Pin pada ESP32

    WiFi.begin(ssid, pw);              //memulai WiFi
    if (WiFi.status() != WL_CONNECTED) //jika WiFi belum bisa konek maka .....
    {
        delay(300);
        Serial.println("Meng-konek :v");
    }
    Serial.println("Konek WiFi berhasil...");
    Serial.print("IP: ");
    Serial.println(WiFi.localIP()); //Tampilkan IP Address ESP32 dari Router

    client_mqtt.setServer(mqtt_server, port); //menghubungkan ke Server
    client_mqtt.setCallback(mqtt_callback);   //Untuk mengolah Pesan dari Topik yang kita Subs
}

void loop()
{
    if (!client_mqtt.connected()) //Jika MQTT belum berhasil konek ke MQTT Broker maka ....
        reconnect();
    client_mqtt.loop(); //looping koneksi

    client_mqtt.publish("status_led", status_led); //Publish status led

    delay(7000); //Kasih delay 7 detik agar ESP32 gk capek :)
                 //kenapa 7?? karena saya absen 7 :)
}