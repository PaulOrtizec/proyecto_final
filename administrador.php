<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_roles.css">
    <link rel="stylesheet" href="./css_administrador.css">
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
            background-color: #007BFF; /* Azul claro */
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

        /* Estilos de celdas azul claro */
        .cedula, .nombres, .ciudad, .pais, .telefono, .correo, .contrasena {
            background-color: #007BFF; /* Azul claro */
        }
    </style>
    <title>Página de Administrador</title>
</head>
<body>
<?php
// Obtener el cargo del usuario de la sesión (puedes implementar la lógica según tu necesidad)
$cargo = "administrador"; // Ejemplo, deberías obtenerlo de la sesión

// Verificar si el cargo es administrador
if ($cargo == "administrador") {
    echo "<h1>Bienvenido " . ucfirst($cargo) . "</h1>";
    // Aquí puedes agregar el contenido específico para administrador
?>

<section class="section__container">
    <h2>Registro de Administrador</h2>

    <!-- Buscador por número de cédula, nombres, ciudad, país, teléfono, correo y contraseña -->
    <input type="text" id="buscadorInput" onkeyup="buscarEnTabla()" placeholder="Buscar">

    <!-- Tabla de Administradores -->
    <table id="tablaAdministradores">
        <thead>
            <tr>
                <th class="cedula">Cédula</th>
                <th class="nombres">Nombres</th>
                <th class="ciudad">Ciudad</th>
                <th class="pais">País</th>
                <th class="telefono">Teléfono</th>
                <th class="correo">Correo</th>
                <th class="contrasena">Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345678</td>
                <td>Ronald</td>
                <td>San José</td>
                <td>Costa Rica</td>
                <td>123456789</td>
                <td>ronald@example.com</td>
                <td>*******</td>
                <td>
                    <button onclick="editarEstudiante(1)">Editar</button>
                    <button onclick="eliminarEstudiante(1)">Eliminar</button>
                </td>
				
				</tr>
                <td>12345678</td>
                <td>Jose</td>
                <td>San José</td>
                <td>Costa Rica</td>
                <td>123456789</td>
                <td>ronald@example.com</td>
                <td>*******</td>
                <td>
                    <button onclick="editarEstudiante(1)">Editar</button>
                    <button onclick="eliminarEstudiante(1)">Eliminar</button>
                </td>
				</tr>
                <td>12345678</td>
                <td>Pepe</td>
                <td>San José</td>
                <td>Costa Rica</td>
                <td>123456789</td>
                <td>ronald@example.com</td>
                <td>*******</td>
                <td>
                    <button onclick="editarEstudiante(1)">Editar</button>
                    <button onclick="eliminarEstudiante(1)">Eliminar</button>
                </td>				
				
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>

    <!-- Botones de Acciones -->
    <div>
        <button onclick="crearAdministrador()">Crear Administrador</button>
        <button onclick="modificarAdministrador()">Modificar Administrador</button>
    </div>

    <script>
        function buscarEnTabla() {
            var input = document.getElementById("buscadorInput").value.toLowerCase();
            var tabla = document.getElementById("tablaAdministradores");
            var filas = tabla.getElementsByTagName("tr");

            for (var i = 1; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName("td");
                var mostrar = false;

                for (var j = 0; j < celdas.length - 1; j++) {
                    var contenido = celdas[j].textContent.toLowerCase() || celdas[j].innerText.toLowerCase();

                    if (contenido.indexOf(input) > -1) {
                        mostrar = true;
                        break;
                    }
                }

                filas[i].style.display = mostrar ? "" : "none";
            }
        }

        function editarAdministrador(id) {
            // Lógica para editar el administrador con el id proporcionado
        }

        function eliminarAdministrador(id) {
            // Lógica para eliminar el administrador con el id proporcionado
        }

        function crearAdministrador() {
            // Lógica para crear un nuevo administrador
        }

        function modificarAdministrador() {
            // Lógica para modificar un administrador
        }
    </script>
</section>

<?php
} else {
    // Manejar el caso en que el cargo no sea administrador
    echo "<p>No tienes permiso para acceder a esta página.</p>";
}
?>
</body>
</html>
