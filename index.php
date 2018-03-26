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
		$date;
		$client;
		$tax;
		if (isset($_POST['submit'])){
			$date = $_POST['date'];
			$client = $_POST['client'];
			$tax = $_POST['tax'];
			$insert = "INSERT INTO Facturas (fecha, cliente, impuestos, total) VALUES (:dateinfo, :client, :tax, :total)";

		}

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
						<td><input type='button' type='submit' name='submit' value = 'Registrar'></input></td>
					</tr>
				</table>";	

		$resultProduct = $file_db->query('SELECT * FROM productos');
		$sumTotal;
		echo "<br />";
		echo "<hr />";
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
					echo "<td><input type='button' type='submit' name='deleteProd' value = 'Eliminar'></input><input type='button' type='submit' name='editProd' value = 'Editar'></input></td>";
				echo "</tr>";
			}
		echo "</table>";
		echo "<label> Total: </label>";
		echo "<input type='text' disabled></input>";
		echo "</form>";
		echo "<hr />";
		echo "<br />";
		echo "<h1> Historial de Facturas </h1>";
		$resultFacturas = $file_db->query('SELECT * FROM Facturas');
		echo "<br />";
		echo "<table>";
			echo "<tr>";
				echo "<td>Numero</td>";
				echo "<td>Fecha</td>";
				echo "<td>Cliente</td>";
				echo "<td>Impuestos</td>";
				echo "<td>Total</td>";
				echo "<td>Acciones</td>";
			echo "</tr>";
			foreach ($resultFacturas as $row) {
				echo "<tr>";
					echo "<td>".$row['numero']."</td>";
					echo "<td>".$row['fecha']."</td>";
					echo "<td>".$row['cliente']."</td>";
					echo "<td>".$row['impuestos']."</td>";
					echo "<td>".$row['total']."</td>";
					echo "<td><input type='button' type='submit' name='deleteFact' value = 'Eliminar'></input><input type='button' type='submit' name='editFact' value = 'Editar'></input></td>";
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