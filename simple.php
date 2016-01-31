<?php include 'database.php'; ?>

<?php
// WARNING! This version does not use prepared statements!

if (isset($_POST['name']) && isset($_POST['style'])) {

    // sanitizeMySQL() is a custom function, written below
    $id = sanitizeMySQL($conn, $_POST['id']);
    $month = sanitizeMySQL($conn, $_POST['month']);
    $day = sanitizeMySQL($conn, $_POST['day']);
    $year = sanitizeMySQL($conn, $_POST['year']);
    $location = sanitizeMySQL($conn, $_POST['location']);
    $temperature_high = sanitizeMySQL($conn, $_POST['temperature_high']);
    $temperature_low = sanitizeMySQL($conn, $_POST['temperature_low']);
    $conditions = sanitizeMySQL($conn, $_POST['conditions']);
    $clouds = sanitizeMySQL($conn, $_POST['clouds']);
    $humidity = sanitizeMySQL($conn, $_POST['humidity']);
    $rainfall = sanitizeMySQL($conn, $_POST['rainfall']);
    $sunrise = sanitizeMySQL($conn, $_POST['sunrise']);
    $sunset = sanitizeMySQL($conn, $_POST['sunset']);
    $wind = sanitizeMySQL($conn, $_POST['wind']);
    $pressure = sanitizeMySQL($conn, $_POST['pressure']);
    $visibility = sanitizeMySQL($conn, $_POST['visibility']);
    $dew_point = sanitizeMySQL($conn, $_POST['dew_point']);

    // create a PHP timestamp
    date_default_timezone_set('America/New_York');
    $date = date('m-d-Y', time());

    $query = "INSERT INTO weather (month, day, year, location, temperature_high, temperature_low, conditions, clouds, humidity, rainfall, sunrise, sunset, wind, pressure, visibility, dew_point)
    VALUES ('$month', '$day', '$year', '$location', '$temperature_high', '$temperature_low', '$conditions', '$clouds', '$humidity', '$rainfall', '$sunrise', '$sunset', '$wind', '$pressure',' '$visibility', $dew_point')";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // will be returned to the .ajax success function
    if ($result) {
        echo "You entered: ";
        echo $month . ", ". $day . ", ". $year . ", ". $location . ", ". $temperature_high . ", ". $temperature_low . ", ". $conditions . ", ". $clouds . ", ". $humidity . ", ". $rainfall . ", ". $sunrise . ", ".  $sunset . ", ". $wind . ", ". $pressure . ", ". $visibility . ", ". $dew_point;
    } else {
        echo "Something went wrong.";
    }
}

// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

?>
