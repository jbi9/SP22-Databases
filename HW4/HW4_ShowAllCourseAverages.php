//Joanna Bi jbi9
<head><title>Showing All Course Averages</title></head>
<body>
<?php

     //open a connection to dbase server 
    include 'open.php';

    // collect the posted value in a variable called $item
    $pwd = $_POST['password'];

    if (!empty($pwd)) {
        echo "<h2>All Course Averages</h2><br>";
        if ($result = $conn->query("CALL ShowAllCourseAverages('".$pwd."');")) {
            if ($result->num_rows > 0) {
                echo "Valid password (flag)"
            } else {
                echo "ERROR: Invalid password";
            }
	} else {
            echo "Call to ShowAllCourseAverages failed<br>";
        }
	} else {
        echo "no SID given";
    }
     	$conn->close();

?>
</body>
