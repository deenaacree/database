$(document).ready(function() {

$("#sockform").on("submit", function(e) {

	$.ajax({
		url:  "simple.php",
		type: "POST",
		data: $(this).serialize(),
		success: function(response) {
			if (response) {
				alert(response);
			} else {
				console.log("Success!");
			}
        },
        error: function(jqXHR, status, err) {
            alert("Error!");
        }
        // --- data: $(this).serialize(), ---
        // takes the form data and puts all of it into a single string
        // that the PHP script can read - requires a unique
        // NAME attribute for every form element
    });

});

}); // close document ready
