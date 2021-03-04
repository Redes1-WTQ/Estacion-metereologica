#include "DHT.h"
#include "ThingSpeak.h"
#include "WiFi.h"


#define pin1 13


const char* ssid="TELLEZ";
const char* pass="******";
const char* ip ="192.168.5.111"

float temp = 0;
float hum = 0;
unsigned long channel=1314238;
const char* Apikey ="BWQKI5150YUOY32M";

WiFiClient cliente;

DHT dht11(pin1, DHT11);    




void setup() {
  Serial.begin(115200);
  Serial.println("Prueba de sensor:");
  WiFi.begin(ssid,pass);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Wifi conectado");
  ThingSpeak.begin(cliente);
  dht11.begin();
}

void loop() {

  delay(2000);
  //lectura de datos sensores
  leerdht11();
  //conexion con servidor local
  serial.print("conectando a: ");
  const int httpPort = 80;
  if(!cliente.connect(host,httpPort)){
    Serial.println("conexion fallida")
    return;
  }


  //Se crea la direccion para luego usarla en el POST que se tiene que enviar
  String  url ="http://192.168.5.111/EstMetereologica/logica/entrada_datos.php";
  //Se crea la string con datos a enviar por metodo POST
  String data="humedad=35&temperatura=28.3"

  Serial.println("Requesting URL: ");
  Serial.println(url);

  //Solicitud tipo POST al servidor
  cliente.print(String("POST ") + url + " HTTP/1.0\r\n" +
                "Host: " + host + "\r\n" +
                "Accept: *" + "/" + "*\r\n" +
                "Content-Length: " + data.length() + "\r\n" + 
                "Content-Type: application/x-www-form-urlencoded\r\n" +
                "\r\n" + data);
  delay(11);
  //subir datos a thingSpeak
  ThingSpeak.writeFields(channel,Apikey);
  Serial.println("datos subidos");
  delay(12000);

}

void leerdht11() {
  
  temp = dht11.readTemperature();
  hum = dht11.readHumidity();

  while (isnan(temp) || isnan(hum)){
    Serial.println("Lectura fallida en el sensor DHT11, repitiendo lectura...");
    delay(2000);
    temp = dht11.readTemperature();
    hum = dht11.readHumidity();
  }

  Serial.print("Temperatura DHT11: ");
  Serial.print(temp);
  Serial.println(" ºC.");

  Serial.print("Humedad DHT11: ");
  Serial.print(hum);
  Serial.println(" %."); 

  Serial.println("...............");
  ThingSpeak.setField (1,temp);
  ThingSpeak.setField (2,hum);
}
