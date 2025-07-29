<?php
$conexion = new mysqli("localhost", "root", "", "rot");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM Modelo";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Modelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 30px auto;
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            color: #003366;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #003366;
            color: white;
        }

        .volver {
            padding: 10px 20px;
            background-color: #110331;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .volver:hover {
            background-color: #26bf59;
        }
    </style>
</head>
<body>
    <h1>Modelos Registrados</h1>

    <?php if ($resultado->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID Modelo</th>
                <th>Nombre</th>
            </tr>
            <?php while($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['id_modelo']) ?></td>
                    <td><?= htmlspecialchars($fila['Nombre']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No hay modelos registrados aún.</p>
    <?php endif; ?>

    <a class="volver" href="consultas.html">← Volver al Menú de Consultas</a>
</body>
</html>

<?php $conexion->close(); ?>