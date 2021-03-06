<?php include 'database.php'; ?>

<?php
// This is the "prepared statement" version of this file

if (isset($_POST(['name'])) && isset($_POST(['style']))) {

    // sanitizeMySQL() is a custom function, written below
    $id = sanitizeMySQL($conn, $_POST(['id']));
    $month = sanitizeMySQL($conn, $_POST(['month']));
    $day = sanitizeMySQL($conn, $_POST(['day']));
    $year = sanitizeMySQL($conn, $_POST(['year']));
    $location = sanitizeMySQL($conn, $_POST(['location']));
    $temperature_high = sanitizeMySQL($conn, $_POST(['temperature_high']));
    $temperature_low = sanitizeMySQL($conn, $_POST(['temperature_low']));
    $conditions = sanitizeMySQL($conn, $_POST(['conditions']));
    $rainfall = sanitizeMySQL($conn, $_POST(['rainfall']));

    // create a PHP timestamp
    date_default_timezone_set('America/New_York');
    $date = date('m-d-Y', time());

    // the prepared statement - note: 6 question marks represent
    // 6 variables we will send to database separately
    $query = "INSERT INTO weather (id, month, day, year, location, temperature_high, temperature_low, conditions, rainfall)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // prepare the statement in db
    if ( $stmt = mysqli_prepare($conn, $query) ) {

        // bind the values to replace the 6 question marks
        // note that 6 letters in 'sssids' MUST MATCH data types in table
        // Type specification chars:
        // i - integer, s - string , d - double (decimal), b - blob
        mysqli_stmt_bind_param($stmt, 'ssssssssi',
        $month,
        $day,
        $year,
        $location,
        $temperature_high,
        $temperature_low,
        $conditions,
        $rainfall,
        $id
        );

        // executes the prepared statement with the values already set, above
        mysqli_stmt_execute($stmt);
        // close the prepared statement
        mysqli_stmt_close($stmt);
        // close db connection
        mysqli_close($conn);
    } // end if prepare
} else {
    echo "Failed to enter!";
} // end if isset

// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

?>
