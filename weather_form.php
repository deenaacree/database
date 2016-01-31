<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weather Data Entry Form </title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="js/simple.js"></script>
</head>

<body>
<div id="container">

<h1>Weather Data</h1>

<div id="weather">

  <label for="date">Date </label>
  <input type="text" name="name" id="name" maxlength="20" required value="<?php echo stripslashes($date) ?>">
  <!-- previously any single quote was escaped with a backslash
       we use stripslashes() to get rid of the slashes -->

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
        <option value="sunny" <?php echo $conditions == "gainesville" ? " selected" : ""; ?>>sunny</option>
        <option value="cloudy" <?php echo $conditions == "melrose" ? " selected" : ""; ?>>cloudy</option>
        <option value="raining" <?php echo $conditions == "hawthorne" ? " selected" : ""; ?>>raining</option>
        <option value="snowing" <?php echo $conditions == "hawthorne" ? " selected" : ""; ?>>snowing</option>
        <option value="storming" <?php echo $conditions == "hawthorne" ? " selected" : ""; ?>>storming</option>
        <option value="clear" <?php echo $conditions == "hawthorne" ? " selected" : ""; ?>>clear</option>
        <option value="other" <?php echo $conditions == "other" ? " selected" : ""; ?>>other</option>
    </select>

    <label for="clouds">Conditions</label>
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


  <input type="submit" id="submit" value="Create Listing">
  </form>
  </div> <!-- close the div -->

</div>

</div> <!-- close container -->
</body>
</html>
