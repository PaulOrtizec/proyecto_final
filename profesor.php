<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_roles.css">
    <link rel="stylesheet" href="./css_profesor.css">
    <title>Página de Profesor</title>
    <style>
        /* Agrega estilos según tus preferencias */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        input[type="text"] {
            padding: 8px;
            margin-top: 10px;
        }

        button {
            padding: 8px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<?php
// Obtener el cargo del usuario de la sesión (puedes implementar la lógica según tu necesidad)
$cargo = "profesor"; // Ejemplo, deberías obtenerlo de la sesión

// Verificar si el cargo es profesor
if ($cargo == "profesor") {
    echo "<h1>Bienvenido " . ucfirst($cargo) . "</h1>";
    // Aquí puedes agregar el contenido específico para profesor
?>

<section class="section__container">
    <h2>Registro de Estudiantes</h2>

    <!-- Buscador por número de cédula -->
    <input type="text" id="cedulaInput" onkeyup="buscarPorCedula()" placeholder="Buscar por Cédula">

    <!-- Tabla de Estudiantes -->
<table id="tablaEstudiantes">
    <thead>
        <tr>
			<th>Cédula</th>
            <th>Nombre</th>
            <th>Materia</th>
            <th>Nota</th>
            <th>Estado</th>
            <th>Asistencia</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>12345678</td>
			<td>Ronald</td>
            <td>Matematicas</td>
            <td>90</td>
            <td class="aprobado">Aprobado</td>
            <td>100%</td>
        </tr>
        <tr>
			<td>098765645</td>
            <td>Juan</td>
            <td>Matematicas</td>
            <td>70</td>
            <td class="reprobado">Reprobado</td>
            <td>50%</td>
        </tr>
        <tr>
			<td>88888787878</td>
            <td>Pepe</td>
            <td>Matematicas</td>
            <td>60</td>
            <td class="reprobado">Reprobado</td>
            <td>100%</td>
        </tr>
        <tr>
			<td>020202020202</td>
            <td>Cristiano Ronaldo</td>
            <td>Matematicas</td>
            <td>90</td>
            <td class="aprobado">Aprobado</td>
            <td>100%</td>
        </tr>
        <!-- Puedes agregar más filas según sea necesario -->
    </tbody>
</table>

    <!-- Botones de Acciones -->
    <div>
        <button onclick="crearEstudiante()">Crear Estudiante</button>
        <button onclick="editarEstudiante(1)">Editar Estudiante</button>
        <button onclick="eliminarEstudiante(1)">Eliminar Estudiante</button>
    </div>

    <script>
    function buscarPorCedula() {
        var cedulaInput = document.getElementById("cedulaInput").value.toUpperCase();
        var tabla = document.getElementById("tablaEstudiantes");
        var filas = tabla.getElementsByTagName("tr");

        for (var i = 1; i < filas.length; i++) {
            var cedula = filas[i].getElementsByTagName("td")[0].textContent || filas[i].getElementsByTagName("td")[0].innerText;

            if (cedula.toUpperCase().indexOf(cedulaInput) > -1) {
                filas[i].style.display = "";
            } else {
                filas[i].style.display = "none";
            }
        }
    }

        function editarEstudiante(id) {
            // Lógica para editar el estudiante con el id proporcionado
        }

        function eliminarEstudiante(id) {
            // Lógica para eliminar el estudiante con el id proporcionado
        }

        function crearEstudiante() {
            // Lógica para crear un nuevo estudiante
        }
    </script>
</section>

<?php
} else {
    // Manejar el caso en que el cargo no sea profesor
    echo "<p>No tienes permiso para acceder a esta página.</p>";
}
?>
</body>
</html>
