<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "proyecto";


$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);


if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>

    <link rel="shortcut icon" href="https://press.parentesys.com/gratis/imagen/25500_20190812010840.png">

<style>
      body {
        background: url(https://nube.elolfato.com/wp-content/uploads/2024/05/agora-24-1024x576.jpg) no-repeat center center / cover;
        height: 138vh;
        margin: 0;
      }
</style>
</head>
<body>

<!-- Logo izquierdo -->
<img src="https://press.parentesys.com/gratis/imagen/25500_20190812010840.png" alt="Imagen izquierda" style="float:left; width:150px; height:150px;">

<!-- Logo derecho -->

<img src="https://www.comfenalcosantander.com.co/wp-content/uploads/2024/10/aliado-comfenalco-tolima-comfenalco-santander.png" alt="Imagen derecha" style="float:right; width:150px; height:150px;">


<!-- Título -->
<h1 style="text-align: center;"> <i>MINI FORMULARIO</i> </h1>
<hr style="color:black; size:5;" width="30%">

<!-- Icono centrado -->
<img src="https://images.freeimages.com/vhq/images/previews/842/magnifier-clip-art-51962.png?h=350" 
     alt="Imagen centrada" 
     style="display: block; margin: auto; width: 50px; height: 50px;"> 

     <!--Aquí va el formulario-->
    
<form action="index.php" method="post" style="text-align:center; margin-top:100px;">

    <fieldset style="width:400px; margin:0 auto; padding:20px; border-radius:8px; background-color:yellowgreen;">
        <legend>
            <div style="text-align:center;">
                <p style="font-size:100%; display:inline-block; background-color:#00CC00; color:white; padding:8px; border-radius:6px;">
                    Mini Formulario:
                </p>
            </div>
        </legend>
        
        <label for="nombre" style="color: black; font-size: x-large">Nombre Completo</label><br>
        <input type="text" style="font-size:x-large; background-color:honeydew;" id="nombre" name="nombre" required><br><br>

        <label for="correo" style="color: black; font-size: x-large">Correo Electrónico</label><br>
        <input type="email" style="font-size:x-large; background-color:honeydew;" id="correo" name="correo" required><br><br>
        
        <label for="edad" style="color: black; font-size: x-large">Edad</label><br>
        <input type="number" style="font-size:x-large; background-color:honeydew;" id="edad" name="edad" required><br><br>

        <label for="curso" style="color: black; font-size: x-large">Curso</label><br>
        <input type="number" style="font-size:x-large; background-color:honeydew;" id="curso" name="curso" required><br><br>
    </fieldset>

    <fieldset style="width:400px; margin:20px auto; padding:20px; border-radius:8px; background-color:yellowgreen;">
        <legend>
            <div style="text-align:center;">
                <p style="font-size:100%; display:inline-block; background-color:#00CC00; color:white; padding:8px; border-radius:6px;">
                    Botón de Envío:
                </p>
            </div>
        </legend>

        <input type="submit" name="registro" style="font-size:larger; background-color:#228B22; color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer;" value="Enviar Datos">
    </fieldset>

</form>

    

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])) {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $edad   = $_POST['edad'] ?? '';
    $curso  = $_POST['curso'] ?? '';

    
    $insertarDatos = "INSERT INTO datos (nombre, correo, edad, curso) 
                      VALUES ('$nombre', '$correo', '$edad', '$curso')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

   if ($ejecutarInsertar) {
        echo '<div style="text-align:center;">
                <p style="font-size:180%; display:inline-block; background-color:#159426; color:white; padding:8px; border-radius:6px;">
                    ✅ Datos guardados correctamente
                </p>
              </div>';
    } else {
        echo '<div style="text-align:center;">
                <p style="font-size:180%; display:inline-block; background-color:#c0392b; color:white; padding:8px; border-radius:6px;">
                    ❌ Error: ' . mysqli_error($enlace) . '
                </p>
              </div>';
               }
}
?>
