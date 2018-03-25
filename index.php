<!DOCTYPE html>
<html>
<head>
	<title>Cuarta Tarea Programada</title>
</head>
<body>

<?php
	try{
		$file_db = new POD('sqlite:database.db');
		$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		echo"<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
				<label> Fecha: </label>
				<input type='date' name='date'></input>
				<label> Cliente: </label>
				<input type='text' name='client'></input>
				<label>Impuesto: </label>
				<input type='text' name='tax'></input>
				<label> Total: </label>
				<input type='text' name='Total'></input>
				<input type='button' type='submit' name='submit'></input>
			</form>";
		$resultProduct = $file_db->query('');
		echo "<table>"
			echo "<tr>";
				echo "<td>Id</td>";
				echo "<td>Cantidad</td>";
				echo "<td>Descripcion</td>";
				echo "<td>Valor Unitario</td>";
				echo "<td>Subtotal</td>";
			echo "</tr>";
			foreach ($resultProduct as $row) {
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['cantidad']."</td>";
					echo "<td>".$row['descripcion']."</td>";
					echo "<td>".$row['valor-unit']."</td>";
					echo "<td>".$row['subtotal']."</td>";
					echo "<td><input type='button' type='submit' name='delete'></input><input type='button' type='submit' name='edit'></input></td>";
				echo "</tr>";
			}
		echo "</table>"
		$file_db = null;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>
</body>
</html>