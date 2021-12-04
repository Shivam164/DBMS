<?php

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT TrainName, TrainNumber , DepartingStation , FinalStation FROM trains ORDER BY TrainId';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$trains = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">TRAIN DETAILS</h4>

	<!-- form to look for a train with a starting station and last station -->

	<div class="container">
		<div class="row">
				<table>
					<tr>
						<th>Train Number</th>
						<th>Train Name</th>
						<th>Departing Station</th>
						<th>Final Station</th>
					</tr>
			<?php foreach($trains as $train): ?>

				
					<tr>
						<td><?php echo htmlspecialchars($train['TrainNumber']); ?></td>
						<td><?php echo htmlspecialchars($train['TrainName']); ?></td>
						<td><?php echo htmlspecialchars($train['DepartingStation']); ?></td>
						<td><?php echo htmlspecialchars($train['FinalStation']); ?></td>
					</tr>


				

			<?php endforeach; ?>
</table>
		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>