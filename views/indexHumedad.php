<?php
$conexionBD = null;
//Conexion con BD
try {
    $conexionBD = new PDO('mysql:host=localhost;dbname=estmetereologica', 'root', '');
} catch (PDOException $e) {
    echo "Conexion fallida </br>";
}
$intervalo = 0;
$dia = '05';
$mes = '03';
static $impresion = '';
static $max=0;static $min=0;static $act=0;
static $fmax='';static $fmin='';static $fact='';

$ano = '2021';
//Query para sacar datos del dia de la base de datos
$datos = $conexionBD->query("SELECT UNIX_TIMESTAMP(fecha), humedad FROM datosh WHERE year(fecha) = '$ano' AND month(fecha) = '$mes' AND day(fecha) = '$dia'");
//Query para sacar el dato mas alto
$resultado = $conexionBD->query("SELECT * FROM datosh WHERE humedad = (SELECT MAX(humedad) from datosh)");
if($row = $resultado->fetch()){$max = trim($row[2]);$fmax = trim($row[1]);}
//Query para sacar el dato mas bajo
$resultado = $conexionBD->query("SELECT * FROM datosh WHERE humedad = (SELECT MIN(humedad) from datosh)");
if($row = $resultado->fetch()){$min = trim($row[2]);$fmin = trim($row[1]);}
//Query para sacar el dato actual registrado
$resultado =    $conexionBD->query("SELECT * FROM datosh WHERE id = (SELECT MAX(id) from datosh)");
if($row = $resultado->fetch()){$act = trim($row[2]);$fact = trim($row[1]);}
while ($fila = $datos->fetch()) {
    $impresion = $impresion . "[";
    $impresion = $impresion . $fila[0]*1000;
    $impresion = $impresion . ",";
    $impresion = $impresion . $fila[1];
    $impresion = $impresion . "],";
    for ($i = 0; $i < $intervalo; $i++) {
        $fila = $datos->fetch();
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>ESP Servidor Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="data:,">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
    <div class="topnav">
        <h1> ESTACI&OacuteN METEREOL&OacuteGICA </h1>
        <button type="button" class="boton1"><a href="/EstMetereologica/views/indexTemperatura.php">Datos Temperatura</a></button>
    </div>
    <div class="content">
        <div class="cards">
            <div class="card-big">
                <div class="card">
                    <p class="card-title">HUMEDAD</p>
                    <p style="text-align: left;"><span class="reading"><span id="temp">Humedad reciente: 
                    <?php echo $act; ?> % <?php for($i=0;$i<45;$i++){echo "&nbsp";}?>
                    Humedad mas alta registrada:
                    <?php echo $max; ?> % <?php for($i=0;$i<25;$i++){echo "&nbsp";}?>
                    Humedad mas baja registrada:
                    <?php echo $min; ?></span>%
                    </span>
                    </p>
                    <p style="text-align: left;"><span class="reading"><span id="temp"> 
                    <?php echo $fact; ?>  <?php for($i=0;$i<70;$i++){echo "&nbsp";}?>
                    
                    <?php echo $fmax; ?>  <?php for($i=0;$i<55;$i++){echo "&nbsp";}?>
                    
                    <?php echo $fmin; ?></span>  
                    </span>
                    </p>
                    <div id="chart-humedad"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Grafico humedad
        Highcharts.chart('chart-humedad', {

            title: {
                text: 'Grafico humedad'
            },

            subtitle: {
                text: null
            },

            yAxis: {
                title: {
                    text: 'Humedad (%)'
                }
            },

            xAxis: {
                type: 'datetime',
                accessibility: {
                    rangeDescription: 'Tiempo'
                }
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },

            series: [{
                name: 'humedad %',
                data: [ <?php print_r($impresion); ?> ]
            }, ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

        function actualizar() {
            location.reload(true);
        }
        setInterval(actualizar, 5000);
    </script>
</body>

</html>