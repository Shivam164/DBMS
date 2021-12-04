<?php

	include('config/db_connect.php');

	// write query for all pizzas
	$sql = 'SELECT NameOfPassanger, TrainName , Email FROM bookedtickets ORDER BY TicketId';

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

	<h4 class="center grey-text">All Booked Tickets</h4>

	<div class="container">
		<div class="row">
				<table>
					<tr>
						<th>Train Name</th>
						<th>Name of Passanger</th>
						<th>Email of Passanger</th>
					</tr>
			<?php foreach($trains as $train): ?>

				
					<tr>
						<td><?php echo htmlspecialchars($train['TrainName']); ?></td>
						<td><?php echo htmlspecialchars($train['NameOfPassanger']); ?></td>
						<td><?php echo htmlspecialchars($train['Email']); ?></td>
					</tr>


				

			<?php endforeach; ?>
</table>
		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>