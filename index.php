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
<body style="text-align:center; margin-top:100px;">

    <form action="index.php" method="post">
        <label for="nombre" style="color: black; font-size: x-large">Nombre Completo</label><br>
        <input type="text" style="font-size:x-large; background-color: rgba(14, 255, 95, 0.856);" 
               id="nombre" name="nombre" required><br><br>

        <label for="correo" style="color: black; font-size: x-large">Correo Electrónico</label><br>
        <input type="email" style="font-size:x-large; background-color: rgba(14, 255, 95, 0.856);" 
               id="correo" name="correo" required><br><br>
        
        <label for="edad" style="color: black; font-size: x-large">Edad</label><br>
        <input type="number" style="font-size:x-large; background-color: rgba(14, 255, 95, 0.856);" 
               id="edad" name="edad" required><br><br>

        <label for="curso" style="color: black; font-size: x-large">Curso</label><br>
        <input type="number" style="font-size:x-large; background-color: rgba(14, 255, 95, 0.856);" 
               id="curso" name="curso" required><br><br>

        <input type="submit" name="registro" style="font-size:larger;" value="Enviar Datos">
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
        echo "<p style='color:green; font-size:20px;'>✅ Datos guardados correctamente</p>";
    } else {
        echo "<p style='color:red; font-size:20px;'>❌ Error: " . mysqli_error($enlace) . "</p>";
    }
}
?>
