<?php
include "index.php"
?>
<html>
	<body>
		<form method="GET" action="insertar.php">
			<table>
				<tr><td>Nickname:</td> <td><input type="text" name="nickname"></td></tr>
				<tr><td>Password:</td> <td><input type="password" name="password"></td></tr>
				<tr><td>Nombre:</td> <td><input type="text" name="nombre"></td></tr>
				<tr><td>Apellido:</td> <td><input type="text" name="apellido"></td></tr>
				<tr><td>Telefono:</td> <td><input type="text" name="telefono"></td></tr>
				<tr><td>Direccion:</td> <td><input type="text" name="direccion"></td></tr>
			</table>
			<a class="btn btn-success">
			                Registrarse
            </a>
		</form>
	</body>
</html>

<?php
	if(isset($_GET["insertar"]))
	{
		$conexion = mysql_connect("127.0.0.1", "root", "")or die(mysql_error());
		$db=mysql_select_db("prueba", $conexion)or die(mysql_error());
		$queEmp = "INSERT INTO usuario (nickname, password, nombre, apellido, telefono, direccion,sexo) VALUES ('".trim($_GET["nickname"])."','".MD5(trim($_GET["password"]),'666')."','".trim($_GET["nombre"])."','".trim($_GET["apellido"])."','".trim($_GET["telefono"])."','".trim($_GET["direccion"])."','".trim($_GET["sexo"])."');";
		$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
		echo "USUARIO INSERTADO EN LA BASE DE DATOS";
	}
?>