<!DOCTYPE html>
<html>
<head>
	<title>Cuarta Tarea Programada</title>
</head>
<body>

<?php
	try{
		$file_db = new PDO('sqlite:database.db');
		$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		echo"<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
				<table>
					<tr>
						<td><label> Fecha: </label></td>
						<td><input type='date' name='date'></input></td>
					</tr>

					<tr>
						<td><label> Cliente: </label></td>
						<td><input type='text' name='client'></input></td>
					</tr>

					<tr>
						<td><label>Impuesto: </label></td>
						<td><input type='text' name='tax'></input></td>
					</tr>

					<tr>
						<td><label> Total: </label></td>
						<td><input type='text' name='Total'></input></td>
					</tr>

					<tr>
						<td><input type='button' type='submit' name='submit' value = 'Registrar'></input></td>
					</tr>
				</table>	
			</form>";
		$resultProduct = $file_db->query('SELECT * FROM productos');
		echo "<br />";
		echo "<br />";
		echo "<br />";
		echo "<table>";
			echo "<tr>";
				echo "<td>Id</td>";
				echo "<td>Cantidad</td>";
				echo "<td>Descripcion</td>";
				echo "<td>Valor Unitario</td>";
				echo "<td>Subtotal</td>";
				echo "<td>Acciones</td>";
			echo "</tr>";
			foreach ($resultProduct as $row) {
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['cantidad']."</td>";
					echo "<td>".$row['descripcion']."</td>";
					echo "<td>".$row['valor-unit']."</td>";
					echo "<td>".$row['subtotal']."</td>";
					echo "<td><input type='button' type='submit' name='delete'  value = 'Eliminar'></input><input type='button' type='submit' name='edit'  value = 'Editar'></input></td>";
				echo "</tr>";
			}
		echo "</table>";
		$file_db = null;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>
</body>
</html>