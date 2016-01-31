<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> Sock Market - Update </title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="js/update.js"></script>
</head>

<body>
<div id="container">

<h1>Weather Listing: Update Existing Entry</h1>
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

        <form id="weatherdelete" class="smallform" method="post"  action="listing_update.php" autocomplete="off">
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
        $name = $_POST['name'];
        $style = $_POST['style'];
        $color = $_POST['color'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
?>
        <!-- switch from PHP to HTML
             show entire form with the PHP values filled in ...
             note: the select options employ abbreviated PHP if-statements
             which are nec. to insert "selected" in the option tag
             -->

        <p class="middle">Make changes in one or more fields. Then
        click the Update Listing button.</p>

        <div id="weather">

        <form id="weatherupdate" method="post" action="listing_update.php" autocomplete="off">
            <!-- retain id to be passed to JS file -->
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="name">Name </label>
            <input type="text" name="name" id="name" maxlength="20" required value="<?php echo stripslashes($name) ?>">
            <!-- previously any single quote was escaped with a backslash
                 we use stripslashes() to get rid of the slashes -->

            <label for="style">Style </label>
            <select name="style" id="style" required>
            <!-- each option requires this test to see if value matches:
                 if value of $style == (some value), then write "selected"
                 into the option tag - only one will be selected
                 -->
                 <option value="" <?php echo $style == "" ? " selected" : ""; ?>></option>
                 <option value="ankle" <?php echo $style == "ankle" ? " selected" : ""; ?>>ankle</option>
                 <option value="knee-high" <?php echo $style == "knee-high" ? " selected" : ""; ?>>knee-high</option>
                 <option value="mini" <?php echo $style == "mini" ? " selected" : ""; ?>>mini</option>
                 <option value="other" <?php echo $style == "other" ? " selected" : ""; ?>>other</option>
             </select>

             <label for="color">Color </label>
             <input type="text" name="color" id="color" maxlength="20" required value="<?php echo $color ?>">

             <label for="quantity">Quantity </label>
             <input type="number" name="quantity" id="quantity" max="999" required value="<?php echo $quantity ?>">

             <label for="price">Unit Price </label>
             <input type="number" name="price" id="price" max="99.99" step="0.01" required value="<?php echo $price ?>">
             <!-- step="0.01" (above) allows decimal to be entered -->

         	<input type="submit" id="submit" value="Update Record">
         </form>
     </div> <!-- close the socks div -->

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

<p class="middle"><a href="inventory_update.php">View full inventory</a></p>

<p class="middle"><a href="enter_new_record.php">Add a new sock record</a></p>

</div> <!-- close container -->
</body>
</html>
