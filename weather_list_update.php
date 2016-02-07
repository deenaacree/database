<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weatherbase - Update </title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="scripts/update.js"></script>
</head>

<body>
<div id="container">

<h1>Weatherbase Listing: Update Existing Entry</h1>
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

        <form id="weather_delete" class="smallform" method="post"  action="listing_update.php" autocomplete="off">
            <p>Are you sure you want to DELETE this weather listing?</p>

            <p><label>
            <input type="radio" name="destroy" id="yes" value="yes"> Yes, delete this listing</label></p>

            <p><label>
            <input type="radio" name="destroy" id="no" value="no"> No, do not delete this listing</label></p>

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
        $rainfall = $_POST['rainfall']);
?>
        <!-- switch from PHP to HTML
             show entire form with the PHP values filled in ...
             note: the select options employ abbreviated PHP if-statements
             which are nec. to insert "selected" in the option tag
             -->

        <p class="middle">Make changes in one or more fields. Then click the Update Listing button.</p>

        <div id="weather">

        <form id="weather_update" method="post" action="listing_update.php" autocomplete="off">
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
            <select name="day" id="day" required value="<?php echo stripslashes($day) ?>">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>

            <label for="year">Year</label>
            <select name="year" id="year" required value="<?php echo stripslashes($year) ?>">
              <option value=""></option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
            </select>

             <label for="location">Location</label>
             <select name="location" id="location" required value="<?php echo stripslashes($year) ?>">
               <!-- each option requires this test to see if value matches:
                    if value of $style == (some value), then write "selected"
                    into the option tag - only one will be selected -->
                    <option value="" <?php echo $location == "" ? " selected" : ""; ?>></option>
                    <option value="alachua" <?php echo $location == "alachua" ? " selected" : ""; ?>>Alachua</option>
                    <option value="belleview" <?php echo $location == "belleview" ? " selected" : ""; ?>>Belleview</option>
                    <option value="bell" <?php echo $location == "bell" ? " selected" : ""; ?>>Bell</option>
                    <option value="brooker" <?php echo $location == "brooker" ? " selected" : ""; ?>>Brooker</option>
                    <option value="fort_white" <?php echo $location == "fort_white" ? " selected" : ""; ?>>Fort White</option>
                    <option value="gainesville" <?php echo $location == "gainesville" ? " selected" : ""; ?>>Gainesville</option>
                    <option value="greenville" <?php echo $location == "greenville" ? " selected" : ""; ?>>Greenville</option>
                    <option value="hampton" <?php echo $location == "hampton" ? " selected" : ""; ?>>Hampton</option>
                    <option value="hawthorne" <?php echo $location == "hawthorne" ? " selected" : ""; ?>>Hawthorne</option>
                    <option value="high_springs" <?php echo $location == "high_springs" ? " selected" : ""; ?>>High Springs</option>
                    <option value="interlachen" <?php echo $location == "interlachen" ? " selected" : ""; ?>>Interlachen</option>
                    <option value="jasper" <?php echo $location == "jasper" ? " selected" : ""; ?>>Jasper</option>
                    <option value="keystone_heights" <?php echo $location == "keystone_heights" ? " selected" : ""; ?>>Keystone Heights</option>
                    <option value="lacrosse" <?php echo $location == "lacrosse" ? " selected" : ""; ?>>LaCrosse</option>
                    <option value="lake_city" <?php echo $location == "lake_city" ? " selected" : ""; ?>>Lake City</option>
                    <option value="lawtey" <?php echo $location == "lawtey" ? " selected" : ""; ?>>Lawtey</option>
                    <option value="lee" <?php echo $location == "legend" ? " selected" : ""; ?>>Lee</option>
                    <option value="live_oak" <?php echo $location == "live_oak" ? " selected" : ""; ?>>Live Oak</option>
                    <option value="madison" <?php echo $location == "madison" ? " selected" : ""; ?>>Madison</option>
                    <option value="melrose" <?php echo $location == "melrose" ? " selected" : ""; ?>>Melrose</option>
                    <option value="micanopy" <?php echo $location == "micanopy" ? " selected" : ""; ?>>Micanopy</option>
                    <option value="newberry" <?php echo $location == "newberry" ? " selected" : ""; ?>>Newberry</option>
                    <option value="ocala" <?php echo $location == "ocala" ? " selected" : ""; ?>>Ocala</option>
                    <option value="palatka" <?php echo $location == "palatka" ? " selected" : ""; ?>>Palatka</option>
                    <option value="pomona_park" <?php echo $location == "pomona_park" ? " selected" : ""; ?>>Pomona Park</option>
                    <option value="reddick" <?php echo $location == "reddick" ? " selected" : ""; ?>>Reddick</option>
                    <option value="starke" <?php echo $location == "starke" ? " selected" : ""; ?>>Starke</option>
                    <option value="trenton" <?php echo $location == "trenton" ? " selected" : ""; ?>>Trenton</option>
                    <option value="waldo" <?php echo $location == "waldo" ? " selected" : ""; ?>>Waldo</option>
                    <option value="other" <?php echo $location == "other" ? " selected" : ""; ?>>Other</option>
              </select>

             <label for="temperature_high">High Temperature </label>
             <input type="number" name="temperature_high" id="temperature_high" max="199.99" required value="<?php echo stripslashes ($temperature_high) ?>">

             <label for="temperature_low">Low Temperature </label>
             <input type="number" name="temperature_low" id="temperature_low" max="199.99" required value="<?php echo stripslashes ($temperature_low) ?>">

             <label for="conditions">Conditions (select all that apply)</label>
             <select multiple name="conditions" id="conditions" required>
                <!-- each option requires this test to see if value matches:
                     if value of $style == (some value), then write "selected"
                     into the option tag - only one will be selected
                     -->
                   <option value="" <?php echo $conditions == "" ? " selected" : ""; ?>></option>
                   <option value="blizzard"<?php echo $conditions == "blizzard" ? " selected" : ""; ?>>blizzard</option>
                   <option value="clear" <?php echo $conditions == "clear" ? " selected" : ""; ?>>clear</option>
                   <option value="cloudy" <?php echo $conditions == "cloudy" ? " selected" : ""; ?>>cloudy</option>
                   <option value="cold" <?php echo $conditions == "cold" ? " selected" : ""; ?>>cold</option>
                   <option value="drought" <?php echo $conditions == "drought" ? " selected" : ""; ?>>drought</option>
                   <option value="dry" <?php echo $conditions == "dry" ? " selected" : ""; ?>>dry</option>
                   <option value="foggy" <?php echo $conditions == "foggy" ? " selected" : ""; ?>>foggy</option>
                   <option value="hail" <?php echo $conditions == "hail" ? " selected" : ""; ?>>hail</option>
                   <option value="hot" <?php echo $conditions == "hot" ? " selected" : ""; ?>>hot</option>
                   <option value="humid" <?php echo $conditions == "humid" ? " selected" : ""; ?>>humid</option>
                   <option value="hurricane" <?php echo $conditions == "hurricane" ? " selected" : ""; ?>>hurricane</option>
                   <option value="mist" <?php echo $conditions == "mist" ? " selected" : ""; ?>>mist</option>
                   <option value="raining" <?php echo $conditions == "raining" ? " selected" : ""; ?>>raining</option>
                   <option value="sleet" <?php echo $conditions == "sleet" ? " selected" : ""; ?>>sleet</option>
                   <option value="snowing" <?php echo $conditions == "snowing" ? " selected" : ""; ?>>snowing</option>
                   <option value="storming" <?php echo $conditions == "storming" ? " selected" : ""; ?>>storms</option>
                   <option value="sunny" <?php echo $conditions == "sunny" ? " selected" : ""; ?>>sunny</option>
                   <option value="tornadoes" <?php echo $conditions == "tornadoes" ? " selected" : ""; ?>>clear</option>
                   <option value="wet" <?php echo $conditions == "wet" ? " selected" : ""; ?>>wet</option>
                   <option value="wildfire" <?php echo $conditions == "wildifre" ? " selected" : ""; ?>>wildfire</option>
                   <option value="windy"<?php echo $conditions == "windy" ? " selected" : ""; ?>>windy</option>
                   <option value="other" <?php echo $conditions == "other" ? " selected" : ""; ?>>other</option>
               </select>

             <label for="rainfall">Rainfall</label>
             <input type="number" name="rainfall" id="rainfall" min="0.00" max="199.99" step="0.01" required value="<?php echo stripslashes($rainfall) ?>">

         	<input type="submit" id="submit" value="Update Listing">
         </form>
     </div> <!-- close the weather div -->

<?php
    } // end of if ($choice = "update")
} else {
    // if _choice_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>

    <p class='announce'>No record was selected!</p>


<?php
// return to PHP just to close the if-statement
} // end of if-else isset($_POST['choice'])
?>
</div> <!-- close inner_content -->

<!-- below will print no matter what -->

<p class="middle"><a href="listing_update.php">View all weather data from the Weatherbase project</a></p>

<p class="middle"><a href="new_record.php">Add more weather information for the Weatherbase project</a></p>

<p class="middle"><a href="">View the Github Repo for this page</a></p>

</div> <!-- close container -->
</body>
</html>
