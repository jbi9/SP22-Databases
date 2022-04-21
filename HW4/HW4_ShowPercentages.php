//Joanna Bi jbi9
<head><title>Showing Percentages</title></head>
<body>
<?php

     //open a connection to dbase server 
    include 'open.php';

    // collect the posted value in a variable called $item
    $id = $_POST['SID'];

    if (!empty($id)) {
        echo "<h2>Percentages</h2><br>";
        if ($result = $conn->query("CALL ShowPercentages('".$id."');")) {
            if ($result ->num_rows > 0) {
                echo "<table border=\"2px solid black\">";
                echo "<tr><td>sid</td><td>lname</td><td>fname</td><td>section</td>td>courseAvg</td></tr>";
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td>".$row["SID"]."</td>";
                    echo "<td>".$row["LName"]."</td>";
                    echo "<td>".$row["FName"]."</td>";
                    echo "<td>".$row["Sec"]."</td>";
                    echo "<td>".$row["CourseAvg"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "ERROR: SID $id not found";
            }
	} else {
            echo "Call to ShowPercentages failed<br>";
        }
	} else {
        echo "no SID given";
    }
     	$conn->close();

?>
</body>
