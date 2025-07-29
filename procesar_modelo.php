<?php
$conexion = new mysqli("localhost", "root", "", "rot");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$id_modelo = $_POST['id_modelo'];
$nombre = $_POST['nombre'];

// Insertar en la base de datos
$sql = "INSERT INTO Modelo (id_modelo, Nombre) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $id_modelo, $nombre);

$mensaje = "";

if ($stmt->execute()) {
    $mensaje = "✅ El modelo fue guardado exitosamente.";
} else {
    $mensaje = "❌ Ocurrió un error al guardar el modelo: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 40px auto;
            background-color: #e6ffe6;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        h1 {
            color: #110331;
        }
        .mensaje {
            margin: 20px 0;
            padding: 15px;
            background-color: #dff0d8;
            border-radius: 5px;
            color: #3c763d;
            font-weight: bold;
        }
        .botones {
            margin-top: 30px;
        }
        .botones a {
            padding: 10px 20px;
            background-color: #110331;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }
        .botones a:hover {
            background-color: #26bf59;
        }
    </style>
</head>
<body>
    <h1>Registro Completado</h1>
    <div class="mensaje"><?= $mensaje ?></div>
    <div class="botones">
        <a href="index.html">← Menú Principal</a>
        <a href="consultas.html">→ Ir a Consultas</a>
    </div>
</body>
</html>