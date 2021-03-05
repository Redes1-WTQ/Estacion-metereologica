<?php
$conexionBD = null;
//Conexion con BD
try {
    $conexionBD = new PDO('mysql:host=localhost;dbname=estmetereologica', 'root', '');
    echo "Conexion establecida con la base de datos </br>";
} catch (PDOException $e) {
    echo "Conexion fallida </br>";
}
$intervalo = 0;
$dia = '05';
$mes = '03';
static $impresion = '';

$ano = '2021';
$datos = $conexionBD->query("SELECT UNIX_TIMESTAMP(fecha), humedad FROM datosh WHERE year(fecha) = '$ano' AND month(fecha) = '$mes' AND day(fecha) = '$dia'");

while ($fila = $datos->fetch()) {
    $impresion = $impresion . "[";
    $impresion = $impresion . $fila[0];
    $impresion = $impresion . ",";
    $impresion = $impresion . $fila[1];
    $impresion = $impresion . "],";
    for ($i = 0; $i < $intervalo; $i++) {
        $fila = $datos->fetch();
    }
}
echo $impresion;
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
                    <p style="text-align: left;"><span class="reading"><span id="hum">Humedad actual: </span>%</span></p>
                    <div id="chart-humedad"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        graficar();
        function graficar() {
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
                    data: [<?php print_r($impresion); ?>]
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
        }

        setInterval(graficar, 5000);
    </script>
</body>

</html>