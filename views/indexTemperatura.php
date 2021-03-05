<?php
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
static $max = 0;
static $min = 0;
static $act = 0;
static $fmax = '';
static $fmin = '';
static $fact = '';

$ano = '2021';
//Query para sacar datos del dia de la base de datos
$datos = $conexionBD->query("SELECT UNIX_TIMESTAMP(fecha), temperatura FROM datost WHERE year(fecha) = '$ano' AND month(fecha) = '$mes' AND day(fecha) = '$dia'");
//Query para sacar el dato mas alto
$resultado = $conexionBD->query("SELECT * FROM datost WHERE temperatura = (SELECT MAX(temperatura) from datost)");
if ($row = $resultado->fetch()) {
    $max = trim($row[2]);
    $fmax = trim($row[1]);
}
//Query para sacar el dato mas bajo
$resultado = $conexionBD->query("SELECT * FROM datost WHERE temperatura = (SELECT MIN(temperatura) from datost)");
if ($row = $resultado->fetch()) {
    $min = trim($row[2]);
    $fmin = trim($row[1]);
}
//Query para sacar el dato actual registrado
$resultado =    $conexionBD->query("SELECT * FROM datost WHERE id = (SELECT MAX(id) from datost)");
if ($row = $resultado->fetch()) {
    $act = trim($row[2]);
    $fact = trim($row[1]);
}

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

<body>
    <div class="topnav">
        <h1> ESTACI&OacuteN METEREOL&OacuteGICA </h1>
        <button type="button" class="boton1"><a href="/EstMetereologica/views/indexHumedad.php">Datos humedad</a></button>
    </div>
    <div class="content">
        <div class="cards">
            <div class="card-big">
                <div class="card">
                    <p class="card-title">TEMPERATURA</p>
                    <p style="text-align: left;"><span class="reading"><span id="temp"> Temperatura actual:
                                <?php echo $act; ?> &deg;C <?php for ($i = 0; $i < 40; $i++) {
                                                                echo "&nbsp";
                                                            } ?>
                                Temperatura mas alta registrada:
                                <?php echo $max; ?> &deg;C <?php for ($i = 0; $i < 15; $i++) {
                                                                echo "&nbsp";
                                                            } ?>
                                Temperatura mas baja registrada:
                                <?php echo $min; ?></span> &deg;C
                        </span>
                    </p>
                    <p style="text-align: left;"><span class="reading"><span id="temp">
                                <?php echo $fact; ?> <?php for ($i = 0; $i < 75; $i++) {
                                                            echo "&nbsp";
                                                        } ?>

                                <?php echo $fmax; ?> <?php for ($i = 0; $i < 50; $i++) {
                                                            echo "&nbsp";
                                                        } ?>

                                <?php echo $fmin; ?></span>
                        </span>
                    </p>
                    <div id="chart-temperatura" class="container"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Grafico temperatura
        Highcharts.chart('chart-temperatura', {
            title: {
                text: 'Grafico temperatura'
            },

            subtitle: {
                text: null
            },

            yAxis: {
                title: {
                    text: 'Temperatura (C)'
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
                name: 'Temperatura (C)',
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

        function actualizar() {
            location.reload(true);
        }
        setInterval(actualizar, 5000);
    </script>
</body>

</html>