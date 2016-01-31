<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weatherbase Project - Update </title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="scripts/update.js"></script>
</head>

<body>
<div id="container">

<h1>Weatherbase Project: Update Existing Listing</h1>
<!-- this page opens if you selected edit or delete
     in weather_edit.php and submitted the form
     and this page chooses which form to show you
-->

<div id="inner_content">

<?php
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

// check if _choice_ was sent here via POST ...
if ( isset($_POST['choice']) ) {
    $choice = $_POST['choice'];

    // OPTION 1 - delete
    // check if delete record was selected ...
    if ($choice == "delete") {
        // sanitize the id
        $id = sanitizeMySQL($conn, $_POST['id']);
?>
<!-- start plain HTML -->

        <form id="weatherdelete" class="smallform" method="post"  action="listing.php" autocomplete="off">
            <p>Are you sure you want to DELETE this listing?</p>

            <p><label>
            <input type="radio" name="destroy" id="yes" value="yes"> Yes, delete this listing</label></p>

            <p><label>
            <input type="radio" name="destroy" id="no" value="no"> No, do NOT delete the listing</label></p>

            <!-- pass _id_ value to the next script -->
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

            <input type="submit" id="submit" value="Submit">
        </form>

<?php
    // end of the ($choice == "delete") code

    // OPTION 2 - update
    // check if update record was selected ...
    } else if ($choice == "update") {
        // create PHP variables from the hidden form values
        $id = sanitizeMySQL($conn, $_POST['id']);
        // these are simply written into the form on THIS page, below
        // and so I did not sanitize them
        $month = $_POST['month']);
        $day = $_POST['day']);
        $year = $_POST['year']);
        $location = $_POST['location']);
        $temperature_high = $_POST['temperature_high']);
        $temperature_low = $_POST['temperature_low']);
        $conditions = $_POST['conditions']);
        $clouds = $_POST['clouds']);
        $humidity = $_POST['humidity']);
        $rainfall = $_POST['rainfall']);
        $sunrise = $_POST['sunrise']);
        $sunset = $_POST['sunset']);
        $wind = $_POST['wind']);
        $pressure = $_POST['pressure']);
        $visibility = $_POST['visibility']);
        $dew_point = $_POST['dew_point']);
?>
        <!-- switch from PHP to HTML
             show entire form with the PHP values filled in ...
             note: the select options employ abbreviated PHP if-statements
             which are nec. to insert "selected" in the option tag
             -->

        <p class="middle">Make changes in one or more of the fields below. Then
        click the Update Listing button at the bottom.</p>

        <div id="weather">

        <form id="weatherupdate" method="post" action="listing_update.php" autocomplete="off">
            <!-- retain id to be passed to JS file -->
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="month">Month</label>
            <select name="month" id="month" required value="<?php echo stripslashes($month) ?>">
              <option value=""></option>
              <option value="january">January</option>
              <option value="february">February</option>
              <option value="march">March</option>
              <option value="april">April</option>
              <option value="may">May</option>
              <option value="june">June</option>
              <option value="july">July</option>
              <option value="august">August</option>
              <option value="september">September</option>
              <option value="october">October</option>
              <option value="november">November</option>
              <option value="december">December</option>
            </select>

            <label for="day">Day</label>
            <input type="number" name="day" id="day" max="31" required value="<?php echo stripslashes($day) ?>">

            <label for="year">Year</label>
            <input type="number" name="year" id="year" max="2020" requiredvalue="<?php echo stripslashes($year) ?>">

            <label for="location">Location </label>
            <select name="location" id="location" required>
            <!-- each option requires this test to see if value matches:
                 if value of $style == (some value), then write "selected"
                 into the option tag - only one will be selected
                 -->
                 <option value="" <?php echo $location == "" ? " selected" : ""; ?>></option>
                 <option value="gainesville" <?php echo $location == "gainesville" ? " selected" : ""; ?>>Gainesville</option>
                 <option value="melrose" <?php echo $location == "melrose" ? " selected" : ""; ?>>Melrose</option>
                 <option value="hawthorne" <?php echo $location == "hawthorne" ? " selected" : ""; ?>>Hawthorne</option>
                 <option value="other" <?php echo $location == "other" ? " selected" : ""; ?>>Other</option>
             </select>

             <label for="temperature_high">High Temperature </label>
             <input type="number" name="temperature_high" id="temperature_high" max="999" required value="<?php echo $temperature_high ?>">

             <label for="temperature_low">Low Temperature </label>
             <input type="number" name="temperature_low" id="temperature_low" max="999" required value="<?php echo $temperature_low ?>">

             <label for="conditions">Conditions</label>
             <select name="conditions" id="conditions" required>
             <!-- each option requires this test to see if value matches:
                  if value of $style == (some value), then write "selected"
                  into the option tag - only one will be selected
                  -->
                  <option value="" <?php echo $conditions == "" ? " selected" : ""; ?>></option>
                  <option value="sunny" <?php echo $conditions == "sunny" ? " selected" : ""; ?>>sunny</option>
                  <option value="cloudy" <?php echo $conditions == "cloudy" ? " selected" : ""; ?>>cloudy</option>
                  <option value="raining" <?php echo $conditions == "raining" ? " selected" : ""; ?>>raining</option>
                  <option value="snowing" <?php echo $conditions == "snowing" ? " selected" : ""; ?>>snowing</option>
                  <option value="storming" <?php echo $conditions == "storming" ? " selected" : ""; ?>>storming</option>
                  <option value="clear" <?php echo $conditions == "clear" ? " selected" : ""; ?>>clear</option>
                  <option value="other" <?php echo $conditions == "other" ? " selected" : ""; ?>>other</option>
              </select>

              <label for="clouds">Clouds</label>
              <select name="clouds" id="clouds" required>
              <!-- each option requires this test to see if value matches:
                   if value of $style == (some value), then write "selected"
                   into the option tag - only one will be selected
                   -->
                   <option value="" <?php echo $clouds == "" ? " selected" : ""; ?>></option>
                   <option value="yes" <?php echo $clouds == "yes" ? " selected" : ""; ?>>Yes</option>
                   <option value="no" <?php echo $clouds == "no" ? " selected" : ""; ?>>No</option>

             <label for="humidity">Humidity</label>
             <input type="number" name="humidity" id="humidity" max="999" required value="<?php echo $humidity ?>">

             <label for="rainfall">Rainfall</label>
             <input type="number" name="rainfall" id="rainfall" max="999.99" step="0.01" required value="<?php echo $rainfall ?>">

             <label for="sunrise">Sunrise</label>
             <input type="text" name="sunrise" id="sunrise" maxlength="20" required value="<?php echo $sunrise ?>">

             <label for="sunset">Sunset</label>
             <input type="text" name="sunset" id="sunset" maxlength="20" required value="<?php echo $sunset ?>">

             <label for="wind">Wind Gusts</label>
             <input type="text" name="wind" id="wind" maxlength="20" required value="<?php echo $wind ?>">

             <label for="pressure">Pressure</label>
             <input type="number" name="pressure" id="pressure" max="999.99" step="0.01" required value="<?php echo $pressure ?>">

             <label for="wind">Visbility</label>
             <input type="text" name="visibility" id="visibility" maxlength="20" required value="<?php echo $visibility ?>">

             <label for="dew_point">Dew point</label>
             <input type="number" name="dew_point" id="dew_point" max="999.99" step="0.01" required value="<?php echo $dew_point ?>">

         	<input type="submit" id="submit" value="Update Listing">
         </form>
     </div> <!-- close the div -->

<?php
    } // end of if ($choice = "update")
} else {
    // if _choice_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>

    <p class='announce'>No listing was selected!</p>


<?php
// return to PHP just to close the if-statement
} // end of if-else isset($_POST['choice'])
?>
</div> <!-- close inner_content -->

<p class="middle"><a href="listing_update.php">View all weather data from the Weatherbase project</a></p>

<p class="middle"><a href="new_record.php">Add more weather information for the Weatherbase project</a></p>

<p class="middle"><a href="">View the Github Repo for this page</a></p>

</div> <!-- close container -->
</body>
</html>
