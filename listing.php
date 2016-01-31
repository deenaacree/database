<?php include 'database.php'; ?>
<?php
	$query = "SELECT * FROM weather ORDER BY date";
	$weather = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weather Data Listings </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/table.css">
</head>

<body>
<div id="container">

<h1>Weather Data Listings</h1>

<p class="middle">This page lists only the Weatherbase Project's data.</p>

<table>
    <tr>
        <th>Month</th>
				<th>Day</th>
				<th>Year</th>
        <th>Location</th>
        <th>High Temperature</th>
        <th>Low Temperature</th>
        <th>Conditions</th>
        <th>Clouds</th>
				<th>Humidity</th>
				<th>Rainfall</th>
				<th>Sunrise</th>
				<th>Sunset</th>
				<th>Wind</th>
				<th>Pressure</th>
				<th>Visibility</th>
				<th>Dew Point</th>
    </tr>
<!-- begin PHP while-loop to display database query results
     with each row enclosed in LI tags -->
<?php while($row = mysqli_fetch_assoc($weather)) :  ?>

<tr>
    <td><?php echo $row['month']; ?></td>
		<td><?php echo $row['day']; ?></td>
		<td><?php echo $row['year']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['temperature_high']; ?></td>
    <td><?php echo $row['temperature_low']; ?></td>
    <td><?php echo $row['conditions']; ?></td>
    <td><?php echo $row['clouds']; ?></td>
		<td><?php echo $row['humidity']; ?></td>
		<td><?php echo $row['rainfall']; ?></td>
		<td><?php echo $row['sunrise']; ?></td>
		<td><?php echo $row['sunset']; ?></td>
		<td><?php echo $row['wind']; ?></td>
		<td><?php echo $row['pressure']; ?></td>
		<td><?php echo $row['visibility']; ?></td>
		<td><?php echo $row['dew_point']; ?></td>
</tr>

<?php endwhile;  ?>
<!-- end the PHP while-loop
     everything else on this page is normal HTML -->

</table>

<p class="middle"><a href="new_record.php">Add weather data</a>: Open the weather data entry form.</p>

<p class="middle"><a href="https://github.com/deenaacree/database">View the Github Repo for this page</a></p>

</div> <!-- close container -->
</body>
</html>
