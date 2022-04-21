<?php


$VAR = $_POST['SID'];

$conn->multi_query("CALL SHOWRAWSCORES($VAR);"); //use if the procedure will return multiple tables (i.e. if your procedure may run > 1 query during 1 call)

$result = $conn->store_result(); //set result to the first table that is returned from the procedure


if (!$result) {
    echo "Query failed!\n";
    print mysqli_error($db);
} else {
        $myrow = $result->fetch_row();
        echo "<table border=1>\n";
        echo "<tr><td>First Result</td></tr>\n";
        do {
            printf("<tr><td>%s</td></tr>\n", $myrow["firstResult"]);
        } while ($myrow = $result->fetch_row());
        $result->free();

 //the next 2 lines set result equal to the second table that is returned from the procedure; if more than 2 tables are returned from the procedure, repeat these steps to get them
 //you can use $conn->more_results() to check if there are more results available as well
        $conn->next_result();
        $result = $conn->store_result();

        $myrow = $result->fetch_row();
        echo "<table border=1>\n";
        echo "<br /><tr><td>Second Result</td></tr>\n";
        printf("<tr><td>%s</td></tr>", $myrow["secondResult"]);]
        echo "</table>\n";
    }

?>



</body>
