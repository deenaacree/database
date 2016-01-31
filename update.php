<?php include 'database.php'; ?>

<?php
// this scripts updates an exisiting record based on the id

if ( isset($_POST['id']) && isset($_POST['name']) ) {

    // sanitizeMySQL() is a custom function, written below
    // these values came from the form
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




    // create a new PHP timestamp
    date_default_timezone_set('America/New_York');
    $date = date('m-d-Y', time());

    // the prepared statement - note: question marks represent
    // variables we will send to database separately
    // we don't check which fields the user changed - we just update all
    $query = "UPDATE weather SET date = ?,
        location = ?,
        temperature_high = ?,
        temperature_low = ?,
        conditions = ?,
        clouds = ?
        humidity = ?
        rainfall = ?
        sunrise = ?
        sunset = ?
        wind = ?
        pressure = ?
        visibility = ?
        dew_point = ?
    WHERE id = ?";

    // prepare the statement in db
    if ( $stmt = mysqli_prepare($conn, $query) ) {

        // bind the values to replace the question marks
        // the order matters! so id is at end!
        // note that 7 letters in 'sssidsi' MUST MATCH data types in table
        // Type specification chars:
        // i - integer, s - string , d - double (decimal), b - blob
        mysqli_stmt_bind_param($stmt, 'siisssssssssssssi',
        $month,
        $day,
        $year,
        $location,
        $temperature_high,
        $temperature_low,
        $conditions,
        $clouds,
        $humidity,
        $rainfall,
        $sunrise,
        $sunset,
        $wind,
        $pressure,
        $visibility,
        $dew_point,
        $id
        );

        // executes the prepared statement with the values already set, above
        mysqli_stmt_execute($stmt);
        // close the prepared statement
        mysqli_stmt_close($stmt);
        // close db connection
        mysqli_close($conn);
    }
} else {
    echo "Failed to update the listing!";
}

// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

?>
