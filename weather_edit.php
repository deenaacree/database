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
if ( isset($_POST(['id'])) ) {
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
          <th>Rainfall</th>
        </tr>
        <tr>

<?php
    // this calls the function above to make sure id is clean
    $id = sanitizeMySQL($conn, $_POST(['id']));

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
        mysqli_stmt_bind_result($stmt, $id, $month, $day, $year, $location, $temperature_high, $temperature_low, $conditions, $rainfall);

        // handle the data we fetched with the SELECT statement ...
        while (mysqli_stmt_fetch($stmt)) {

            // another way to write variables into the HTML!
            // shorter than echo in this case
            // %s for string, %d for integer,
            // %f for decimal (floating point); %.02f limits 2 decimal places
            printf ("<td>%s</td>", stripslashes($month));
            printf ("<td>%s</td>", stripslashes($day));
            printf ("<td>%s</td>", stripslashes($year));
            printf ("<td>%s</td>", stripslashes($location));
            printf ("<td>%s</td>", stripslashes($temperature_high));
            printf ("<td>%s</td>", stripslashes($temperature_low));
            printf ("<td>%s</td>", stripslashes($conditions));
            printf ("<td>%s</td>", stripslashes($rainfall));

        } // end while-loop

        // writing into the HTML to close the table and add a small form
        // note: single quotes are needed because double quotes surround
        // the entire set of echoed lines
?>

        <!-- write into the HTML - end of table, then form -->

        </tr>
        </table>

        <form id="weather_edit" class="smallform" method="post" action="weather_update.php" autocomplete="off">
            <p>Do you want to:
            <label>
            <input type="radio" name="choice" id="delete" value="delete" required> Delete this listing</label>

            <label>
            <input type="radio" name="choice" id="update" value="update" required> Update this listing</label>
            </p>

            <!-- pass all values to the next script -->
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="month" value="<?php echo $month ?>">
            <input type="hidden" name="day" value="<?php echo $day ?>">
            <input type="hidden" name="year" value="<?php echo $year ?>">
            <input type="hidden" name="location" value="<?php echo $location ?>">
            <input type="hidden" name="temperature_high" value="<?php echo stripslashes($temperature_high) ?>">
            <input type="hidden" name="temperature_low" value="<?php echo stripslashes($temperature_low) ?>">
            <input type="hidden" name="conditions" value="<?php echo $conditions ?>">
            <input type="hidden" name="rainfall" value="<?php echo stripslashes($rainfall) ?>">

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
