<?php include 'database.php'; ?>

<?php
// WARNING! This version does not use prepared statements!

if (isset($_POST['name']) && isset($_POST['style'])) {

    // sanitizeMySQL() is a custom function, written below
    $name = sanitizeMySQL($conn, $_POST['name']);
    $style = sanitizeMySQL($conn, $_POST['style']);
    $color = sanitizeMySQL($conn, $_POST['color']);
    $quantity = sanitizeMySQL($conn, $_POST['quantity']);
    $price = sanitizeMySQL($conn, $_POST['price']);

    // create a PHP timestamp
    date_default_timezone_set('America/New_York');
    $date = date('m-d-Y', time());

    $query = "INSERT INTO socks (name, style, color, quantity, price, updated)
    VALUES ('$name', '$style', '$color', '$quantity', '$price', '$date')";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // will be returned to the .ajax success function
    if ($result) {
        echo "You entered: ";
        echo $name . ", ". $style . ", ". $color . ", ". $quantity . ", ". $price;
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
