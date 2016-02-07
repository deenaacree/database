<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> The Weatherbase Project - Enter Data </title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="scripts/enter.js"></script>
</head>

<body>
<div id="container">

<h1>The Weatherbase Project: Enter New Data</h1>

<p class="middle"><a href="listing.php">View full Weatherbase data listings</a></p>

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
     <select name="day" id="day" required>
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
     <select name="year" id="year" required>
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
     <select name="location" id="location" required>
          <option value=""></option>
          <option value="alachua">Alachua</option>
          <option value="belleview">Belleview</option>
          <option value="bell">Bell</option>
          <option value="brooker">Brooker</option>
          <option value="fort_white">Fort White</option>
          <option value="gainesville">Gainesville</option>
          <option value="greenville">Greenville</option>
          <option value="hampton">Hampton</option>
          <option value="hawthorne">Hawthorne</option>
          <option value="high_springs">High Springs</option>
          <option value="interlachen">Interlachen</option>
          <option value="jasper">Jasper</option>
          <option value="keystone_heights">Keystone Heights</option>
          <option value="lacrosse">LaCrosse</option>
          <option value="lake_city">Lake City</option>
          <option value="lawtey">Lawtey</option>
          <option value="lee">Lee</option>
          <option value="live_oak">Live Oak</option>
          <option value="madison">Madison</option>
          <option value="melrose">Melrose</option>
          <option value="micanopy">Micanopy</option>
          <option value="newberry">Newberry</option>
          <option value="ocala">Ocala</option>
          <option value="palatka">Palatka</option>
          <option value="pomona_park">Pomona Park</option>
          <option value="reddick">Reddick</option>
          <option value="starke">Starke</option>
          <option value="trenton">Trenton</option>
          <option value="waldo">Waldo</option>
          <option value="other">Other</option>
      </select>

      <label for="temperature_high">High Temperature</label>
      <input type="number" name="temperature_high" id="temperature_high" max="199.99" step="0.01" required>

      <label for="temperature_low">Low Temperature</label>
      <input type="number" name="temperature_low" id="temperature_low" max="199.99" step="0.01" required>

      <label for="conditions">Conditions (select all that apply)</label>
      <select multiple name="conditions" id="conditions" required>
           <option value=""></option>
           <option value="blizzard">blizzard</option>
           <option value="clear">clear</option>
           <option value="cloudy">cloudy</option>
           <option value="cold">cold</option>
           <option value="drought">drought</option>
           <option value="dry">dry</option>
           <option value="foggy">foggy</option>
           <option value="hail">hail</option>
           <option value="hot">hot</option>
           <option value="humid">humid</option>
           <option value="hurricane">hurricane</option>
           <option value="mist">mist</option>
           <option value="raining">raining</option>
           <option value="sleet">sleet</option>
           <option value="snowing">snowing</option>
           <option value="storming">storms</option>
           <option value="sunny">sunny</option>
           <option value="tornadoes">clear</option>
           <option value="wet">wet</option>
           <option value="wildfire">wildfire</option>
           <option value="windy">windy</option>
           <option value="other">other</option>
       </select>

      <label for="rainfall">Rainfall</label>
      <input type="number" name="rainfall" id="rainfall" min="0.00" max="199.99" step="0.01" required>

     <input type="submit" id="submit" value="Create New Listing">
</form>

</div>

<div id="response">
    <p class="announce">Thanks for adding new weather data for The Weatherbase Project!</p>
    <p class="middle"><a href="new_record.php">Enter more data</a></p>
    <p class="middle"><a href="listing_update.php">View all weather data from the Weatherbase project</a></p>
</div>

</div> <!-- close container -->
</body>
</html>
