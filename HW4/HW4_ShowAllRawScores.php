//Joanna Bi jbi9
<head><title>Showing All Raw Scores</title></head>
<body>
<?php

     //open a connection to dbase server 
    include 'open.php';

    // collect the posted value in a variable called $item
    $pwd = $_POST['password'];

    if (!empty($pwd)) {
        echo "<h2>All Raw Scores</h2><br>";
        if ($result = $conn->query("CALL ShowAllRawScores('".$pwd."');")) {
            if ($result->num_rows > 0) {
                echo "Valid password (flag)"
            } else {
                echo "ERROR: Invalid password";
            }
	} else {
            echo "Call to ShowAllRawScores failed<br>";
        }
	} else {
        echo "no SID given";
    }
     	$conn->close();

?>
</body>
