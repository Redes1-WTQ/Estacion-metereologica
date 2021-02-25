#include <WiFi.h> //Se incluye la libreria WiFi 

// ----------------------Servidor Web en puerto 80 ----------------------

WiFiServer server(80);

// ----------------------Constantes de credenciales WiFi ----------------

const char* ssid = "FRANK";      //nombre de red WiFi
const char* password = "nico0308";  //contraseña de red WiFi

// ----------------------Variables globales ------ ----------------------

int contconexion = 0;
String header;              //variable para guardar el HTTP request (lo que manda el browser al servidor)
String estadoSalida = "off";
const int salida = 2;

// ----------------------Codigo HTML-------------------------------------
String pagina = "<!DOCTYPE html>"
"<html>"
"<head>"
"<meta charset='UTF-8'/>"
"<tittle>Servidor Web, estacion metereologica</tittle>"
"</head>"
"<body>"
"<center>"
"<h1>Servidor Web: estacion metereologica</h1>"
"<h2>Temperatura: </h2>"

"<h2>Movimiento</h2>"

"</body>"
"</html>";

// ---------------------- Setup ----------------------------------------

void setup(){
  Serial.begin(115200);
  Serial.println("");

  pinMode(salida,OUTPUT);
  digitalWrite(salida,LOW);

  //Conexion WiFi
  WiFi.begin(ssid, password);
  
  //cuenta hasta 50, si no se cancela
  while (WiFi.status() != WL_CONNECTED and contconexion <50){
    ++contconexion;
    delay(500);
    Serial.print(",");
  }

  
  if(contconexion < 50){
    //Usar ip FIJA

    //Impresion para IP
    Serial.println("");
    Serial.println("WiFi conectado");
    Serial.println(WiFi.localIP());
    server.begin(); // se inivia el servidor
  }else {
    Serial.println("");
    Serial.println("Error de conexion");
  }
}

// ---------------------- Loop ----------------------------------------

void loop(){
  WiFiClient client = server.available();       //Escucha los clientes entrantes

  if(client){                                   // si se conecta un nuevo cliente
    Serial.println("Nuevo cliente");  
    String currentLine = "";
    while (client.connected()){                 //Ciclo que mientras el cliente este conectado
      if(client.available()){                   //Si hay bytes para leer desde el cliente
        char c = client.read();                 //lee un byte
        Serial.write(c);                        // imprime ese byte en el monitor serial
        header += c;
        
        if(c == "\n"){                          //Si el byte es un caracter de salto de linea
                                                //Si la nueva linea esta en blanco significa que es el fin del HTTP request del cliente, entonces responde:
          if (currentLine.length == 0){
            client.println("HTTP/1.1 200 OK");
            client.println("Content-Type:text/html");
            client.println("Conecction: close");
            client.println();
            
            //aca se trae los datos de los sensores

            
            //se muestra la pagina
            client.println(pagina);
            //la respuesta HTTP termina con una linea en blanco
            client.println();
            break;
          } else{                             //Si tenemos una nueva linea limpiamos currentLine
            currentLine= "";
          }
        } else if (c != '\r'){                //Si c es distinto al caracter de retorno de carro
          currentLine += c;                   //Lo agrega al final del currentLine
        }
      }  
    }
    
    header = "";                              //Se limpia la variable header
    client.stop();                            //se cierra la conexion
    Serial.println("Client Disconnected");
    Serial.println("");
  }
}
