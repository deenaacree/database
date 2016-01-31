<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weatherbase Project - Edit </title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/table.css">
</head>
<body>
<div id="container">

<h1>Weatherbase: Confirm Listing to Edit</h1>
<!-- this page opens if you selected a record
     from inventory_update.php
     and submitted the form - it lets you choose to delete or update
-->

<div id="inner_content">
<?php
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

// check if _id_ was sent here via POST ...
if ( isset($_POST['id']) ) {
?>

    <!-- write into the HTML - table headings -->
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
        <tr>

<?php
    // this calls the function above to make sure id is clean
    $id = sanitizeMySQL($conn, $_POST['id']);

    // get the row indicated by the id
    $query = "SELECT * FROM weather WHERE id = ?";

    // another if-statement inside the first one ensures that
    // code runs only if the statement was prepared
    if ($stmt = mysqli_prepare($conn, $query)) {
        // bind the id that came from inventory_update.php
        mysqli_stmt_bind_param($stmt, 'i', $id);
        // execute the prepared statement
        mysqli_stmt_execute($stmt);
        // next line handles the row that was selected - all fields
        // it is "_result" because it is the result of the query
        mysqli_stmt_bind_result($stmt, $id, $month, $day, $year, $location, $temperature_high, $temperature_low, $conditions, $clouds, $humidity, $rainfall, $sunrise, $sunset, $wind, $pressure, $visibility, $dew_point);

        // handle the data we fetched with the SELECT statement ...
        while (mysqli_stmt_fetch($stmt)) {

            // another way to write variables into the HTML!
            // shorter than echo in this case
            // %s for string, %d for integer,
            // %f for decimal (floating point); %.02f limits 2 decimal places
            printf ("<td>%s</td>", stripslashes($month));
            printf ("<td>%i</td>", stripslashes($day));
            printf ("<td>%i</td>", stripslashes($year));
            printf ("<td>%s</td>", $location);
            printf ("<td>%s</td>", $temperature_high);
            printf ("<td>%s</td>", $temperature_low);
            printf ("<td>%s</td>", $conditions);
            printf ("<td>%s</td>", $clouds);
            printf ("<td>%s</td>", $humidity);
            printf ("<td>%s</td>", $rainfall);
            printf ("<td>%s</td>", $sunrise);
            printf ("<td>%s</td>", $sunset);
            printf ("<td>%s</td>", $wind);
            printf ("<td>%s</td>", $pressure);
            printf ("<td>%s</td>", $visibility);
            printf ("<td>%s</td>", $dew_point);

        } // end while-loop

        // writing into the HTML to close the table and add a small form
        // note: single quotes are needed because double quotes surround
        // the entire set of echoed lines
?>

        <!-- write into the HTML - end of table, then form -->

        </tr>
        </table>

        <form id="weatheredit" class="smallform" method="post" action="weather_update.php" autocomplete="off">
            <p>Do you want to:
            <label>
            <input type="radio" name="choice" id="delete" value="delete" required> Delete this listing</label>

            <label>
            <input type="radio" name="choice" id="update" value="update" required> Update this listing</label>
            </p>

            <!-- pass all values to the next script -->
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="month" value="<?php echo $month ?>">
            <input type="hidden" name="day" value="<?php echo $date ?>">
            <input type="hidden" name="year" value="<?php echo $year ?>">
            <input type="hidden" name="location" value="<?php echo $location ?>">
            <input type="hidden" name="temperature_high" value="<?php echo $temperature_high ?>">
            <input type="hidden" name="temperature_low" value="<?php echo $temperature_low ?>">
            <input type="hidden" name="conditions" value="<?php echo $conditions ?>">
            <input type="hidden" name="clouds" value="<?php echo $clouds ?>">
            <input type="hidden" name="humidity" value="<?php echo $humidity ?>">
            <input type="hidden" name="rainfall" value="<?php echo $rainfall ?>">
            <input type="hidden" name="sunrise" value="<?php echo $sunrise ?>">
            <input type="hidden" name="sunset" value="<?php echo $sunset ?>">
            <input type="hidden" name="wind" value="<?php echo $wind ?>">
            <input type="hidden" name="pressure" value="<?php echo $pressure ?>">
            <input type="hidden" name="visibility" value="<?php echo $visibility ?>">
            <input type="hidden" name="dew_point" value="<?php echo $dew_point ?>">

            <input type="submit" id="submit" value="Submit">
        </form>


<?php
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);

} else {
    // if _id_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>


    <p class='announce'>No listing was selected!</p>


<?php
// return to PHP just to close the if-statement
}  // end of if-else isset($_POST['id'])
?>
</div> <!-- close inner_content -->

<!-- below will print no matter what -->

<p class="middle"><a href="listing_update.php">View all weather data from the Weatherbase project</a></p>

<p class="middle"><a href="new_record.php">Add more weather information for the Weatherbase project</a></p>

<p class="middle"><a href="https://github.com/deenaacree/database">View the Github Repo for this page</a></p>


</div> <!-- close container -->
</body>
</html>
