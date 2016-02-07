<?php include 'database.php'; ?>
<?php
	$query = "SELECT * FROM weather ORDER BY name";
	$weather = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weatherbase Data </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/table.css">
</head>

<body>
<div id="container">

<h1>Weather Data Listings</h1>

<p class="middle"><a href="new_record.php">Add more weather information for the Weatherbase project</a></p>

<p class="middle">If there is a need to edit (update) or delete a row, select the listing below and then
	click the submit button at the bottom of the page.</p>

<form id="weather_form" class="smallform" method="post" action="weather_edit.php" autocomplete="off">
<table>
    <tr>
        <th>Select</th>
        <th>Month</th>
				<th>Day</th>
				<th>Year</th>
        <th>Location</th>
				<th>High Temperature</th>
        <th>Low Temperature</th>
        <th>Conditions</th>
				<th>Rainfall</th>
  	</tr>

<!-- begin PHP while-loop to display database query results
     with each row enclosed in LI tags -->
<?php while($row = mysqli_fetch_assoc($weather)) :  ?>

<tr>
    <td><input type="radio" name="id" id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"></td>
	<!-- notice how, above, the database record id becomes
		 the id and value of the radio button -->
		<td><?php echo $row['month']; ?></td>
		<td><?php echo $row['day']; ?></td>
		<td><?php echo $row['year']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['temperature_high']; ?></td>
    <td><?php echo $row['temperature_low']; ?></td>
    <td><?php echo $row['conditions']; ?></td>
		<td><?php echo $row['rainfall']; ?></td>
</tr>

<?php endwhile;  ?>
<!-- end the PHP while-loop
     everything else on this page is normal HTML -->

</table>

<input type="submit" id="submit" value="Submit Row for Editing">
</form>

<p class="middle"><a href="new_record.php">Add more weather information for the Weatherbase project</a></p>

<p class="middle"><a href="https://github.com/deenaacree/database">View the Github Repo for this page</a></p>

</div> <!-- close container -->
</body>
</html>
