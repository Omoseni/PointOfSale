<?php
	include('server/connection.php');

	if (isset($_POST['products'])){

		$name = mysqli_real_escape_string($db,$_POST['products']);
		$show 	= "SELECT * FROM products WHERE product_name LIKE '$name%' ";
		$query 	= mysqli_query($db,$show);
		if(mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query)){
				echo "<tr class='js-add' data-barcode=".$row['id']." data-product=".$row['product_name']." data-price=".$row['sell_price']." data-unt=".$row['unit']."><td>".$row['id']."</td><td>".$row['product_name']."</td>";
				echo "<td>₱".$row['sell_price']."</td>";
				echo "<td>".$row['unit']."</td>";
				echo "<td>".$row['quantity']."</td>";
			}
		}
		else{
			echo "<td></td><td>No Products found!</td><td></td>";
		}
	}?>