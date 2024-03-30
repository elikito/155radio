<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reproductor de audio</title>
</head>
<body>

<?php
// Definir una matriz de URLs de audio
$urls = array(
	"Cadena SER" => "https://playerservices.streamtheworld.com/api/livestream-redirect/CADENASER.mp3",
	"Cadena SER OP2" => "https://playerservices.streamtheworld.com/api/livestream-redirect/CADENASER_ALT1.mp3",
	"Cadena SER OP3" => "https://playerservices.streamtheworld.com/api/livestream-redirect/CADENASER_ALT2.mp3",
	"COPE" => "https://flucast24-h-cloud.flumotion.com/cope/net1.mp3",
	"COPE OP2" => "https://flucast-b04-04.flumotion.com/cope/net2.mp3",
	"Onda Cero" => "https://livefastly-webs.ondacero.es/ondacero/audio/master.m3u8",
	"Onda Cero OP2" => "https://atres-live.ondacero.es/live/ondaceroeventos1/master.m3u8",
    "Europa FM" => "https://atres-live.europafm.com/live/europafm/master.m3u8"
);

// Comprobar si se ha seleccionado una pista
if(isset($_POST['pista'])) {
    $pista_seleccionada = $_POST['pista'];
    $url_seleccionada = $urls[$pista_seleccionada];
} else {
    // Si no se ha seleccionado una pista, establecer una URL predeterminada
    $url_seleccionada = reset($urls);
}
?>

<h1>Reproductor de audio</h1>

<!-- Formulario para seleccionar la pista -->
<form method="post">
    <select name="pista">
        <?php
        // Mostrar opciones de selección de pistas
        foreach ($urls as $nombre => $url) {
            $selected = ($url == $url_seleccionada) ? 'selected' : '';
            echo "<option value='$nombre' $selected>$nombre</option>";
        }
        ?>
    </select>
    <input type="submit" value="Reproducir">
</form>

<!-- Reproductor de audio -->
<audio controls>
    <source src="<?php echo $url_seleccionada; ?>" type="audio/mpeg">
    Tu navegador no soporta la reproducción de audio.
</audio>

</body>
</html>
