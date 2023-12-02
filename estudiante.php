<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./css_roles.css">
		<link rel="stylesheet" href="./css_estudiante.css">
		<title>Página de Estudiante</title>
	</head>
	<body>
	<?php
	// Obtener el cargo del usuario de la sesión (puedes implementar la lógica según tu necesidad)
	$cargo = "estudiante"; // Ejemplo, deberías obtenerlo de la sesión

	// Verificar si el cargo es estudiante
	if ($cargo == "estudiante") {
		echo "<h1>Bienvenido " . ucfirst($cargo) . "</h1>";
		// Aquí puedes agregar el contenido específico para estudiantes
	  ?>
	        <section class="section__container">
            <h2>Materias y Notas del Estudiante</h2>

            <!-- Buscador -->
            <input type="text" id="myInput" onkeyup="buscarMateria()" placeholder="Buscar por materia">

            <!-- Tabla de Notas -->
            <table id="tablaNotas">
                <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Matemáticas</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>Historia</td>
                        <td>75</td>
                    </tr>
                    <tr>
                        <td>Biología</td>
                        <td>85</td>
                    </tr>
					<tr>
                        <td>Programación</td>
                        <td>85</td>
                    </tr>
					
					 <tr>
                        <td>Lenguaje</td>
                        <td>85</td>
                    </tr>
					 <tr>
                        <td>Arte</td>
                        <td>85</td>
                    </tr>
					
                    <!-- Puedes agregar más filas según sea necesario -->
                </tbody>
            </table>

            <script>
                function buscarMateria() {
                    // Obtiene el valor del input de búsqueda
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myInput");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("tablaNotas");
                    tr = table.getElementsByTagName("tr");

                    // Recorre todas las filas y oculta las que no coincidan con la búsqueda
                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>

        </section>  
	 
		
  <?php		
	} else {
		// Manejar el caso en que el cargo no sea estudiante
		echo "<p>No tienes permiso para acceder a esta página.</p>";
	}
	?>


	</body>
	</html>
