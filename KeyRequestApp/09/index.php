<?php
/*
 * Homework  8
 * Jeff Pollack
 * Time logged on assignemt: hours 3
 * 
 * CREATE syntax:
CREATE TABLE door (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
building VARCHAR(20) NOT NULL, 
doorNum INT(4) NOT NULL, 
hasCore BOOLEAN NOT NULL DEFAULT 0, 
core VARCHAR(7), 
serialNum FLOAT,
roomType TEXT);
 */
include ('db_connect.php');


$sql = "SELECT id, building, doorNum, hasCore FROM door;";
$result = $pdo->query($sql);
?>



<table  border ='1'>
    <tr><th colspan="6">Building Door Database</th></tr>
    <tr>
        <th>Building</th>
        <th>Door Number</th>
        <th>Door has a Core?</th>   
        <th>More Info</th>
        <th>Edit Option</th>
        <th>Delete Option</th>
    </tr>

    <?php
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $building = $row['building'];
        $doorNum = $row['doorNum'];
        if($row['hasCore']==0){
            $hasCore="No";
        }else{
            $hasCore="Yes";
        }
        $id = $row['id'];

        echo "<tr>";
        echo "<td>" . $building . "</td>" .
        "<td>" . $doorNum . "</td>" .
        "<td>" . $hasCore . "</td>" .
        "<td> <a href=\"details.php?id=" . $id . "\">Door Details</a> </td>" . 
        "<td> <a href=\"edit.php?id=" . $id . "\">Edit Door</a> </td>" .
        "<td> <a href=\"delete.php?id=" . $id . "\">Delete Door</a> </td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="add.php">Add New Door</a>