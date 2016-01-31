<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Weather - Enter </title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="scripts/enter.js"></script>
</head>

<body>
<div id="container">

<h1>Weather Data: Enter New Data</h1>

<p class="middle"><a href="weather_update.php">View full Weatherbase data listings</a></p>

<div id="weather">

<form id="weather_form" method="post" autocomplete="off">
<!-- autocomplete="off" ensures form will be empty if user clicks
     the browser's Back button -->
     <label for="month">Month</label>
     <select name="month" id="month" required>
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
     <input type="number" name="day" id="day" max="31" required>

     <label for="year">Year</label>
     <input type="number" name="year" id="year" max="2020" required>

     <label for="location">Location</label>
     <select name="location" id="location" required>
          <option value=""></option>
          <option value="gainesville">Gainesville</option>
          <option value="melrose">Melrose</option>
          <option value="hawthorne">Hawthorne</option>
          <option value="other">Other</option>
      </select>

      <label for="temperature_high">High Temperature</label>
      <input type="number" name="temperature_high" id="temperature_high" max="999" required>

      <label for="temperature_low">Low Temperature</label>
      <input type="number" name="temperature_low" id="temperature_low" max="999" required>

      <label for="conditions">Conditions</label>
      <select name="conditions" id="conditions" required>
           <option value=""></option>
           <option value="sunny">sunny</option>
           <option value="cloudy">cloudy</option>
           <option value="raining">raining</option>
           <option value="snowing">snowing</option>
           <option value="storming">storming</option>
           <option value="clear">clear</option>
           <option value="other">other</option>
       </select>

       <label for="clouds">Clouds</label>
       <select name="clouds" id="clouds" required>
            <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
      </select>

      <label for="humidity">Humidity</label>
      <input type="number" name="humidity" id="humidity" max="999" required>

      <label for="rainfall">Rainfall</label>
      <input type="number" name="rainfall" id="rainfall" max="999.99" step="0.01" required>

      <label for="sunrise">Sunrise</label>
      <input type="text" name="sunrise" id="sunrise" maxlength="20" required>

      <label for="sunset">Sunset</label>
      <input type="text" name="sunset" id="sunset" maxlength="20" required>

      <label for="wind">Wind Gusts</label>
      <input type="text" name="wind" id="wind" maxlength="20" required>

      <label for="pressure">Pressure</label>
      <input type="number" name="pressure" id="pressure" max="999.99" step="0.01" required>

      <label for="wind">Visbility</label>
      <input type="text" name="visibility" id="visibility" maxlength="20" required>

      <label for="dew_point">Dew point</label>
      <input type="number" name="dew_point" id="dew_point" max="999.99" step="0.01" required>


     <input type="submit" id="submit" value="Create New Listing">
</form>

</div>

<div id="response">
    <p class="announce">Thanks for adding new weather data for the Weatherbase Project!</p>


    <p class="middle"><a href="new_record.php">Return to the form</a></p>
</div>

</div> <!-- close container -->
</body>
</html>
