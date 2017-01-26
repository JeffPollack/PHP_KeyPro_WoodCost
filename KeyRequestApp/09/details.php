<?php
include ('db_connect.php');

$id = intval($_GET['id']);

$sql = "SELECT building, doorNum, hasCore, core, serialNum, roomType"
        . " FROM door WHERE id=".$id;

$result = $pdo->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC)
?> 
<a href="index.php">Back</a>
<br>
<table  border ='1'>
    <tr>
        <th>Building</th>
        <th>Door Number</th>
        <th>Does Door have a Core?</th>
        <th>Core Number</th>
        <th>Serial Number</th> 
    </tr>

    <?php


    if($row['hasCore']==0){
        $hasCore="No";
    }else{
        $hasCore="Yes";
    }
    echo "<tr>";
    echo "<td>" . $row['building'] . "</td>" .
    "<td>" . $row['doorNum'] . "</td>" .
    "<td>" . $hasCore . "</td>" .
    "<td>" . $row['core'] . "</td>" .
    "<td>" . $row['serialNum'] . "</td>";
    echo "</tr>";
    ?></table>

<table  border ='1'>
    <tr>
        <th>Room Details and Type</th>
    </tr><?php
    echo"<tr>";
    echo"<td>" . $row['roomType'] . "</td>";
    echo "</tr>";
    ?>
</table>
