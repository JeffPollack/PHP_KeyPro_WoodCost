<?php

include ('db_connect.php');

$id = intval($_GET['id']);

if(isset($_POST['delete']))
{    
    $sql="DELETE FROM door WHERE id=?";
    
    $params = array($id);
    $query = $pdo->prepare($sql);
    $query->execute($params);
    
    header("Location: index.php");
    exit();
}

$sql = "SELECT building, doorNum, hasCore, core, serialNum, roomType"
        . " FROM door WHERE id=".$id;

$result = $pdo->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);

?>

<form method='post'>
    <input type="hidden" name="id" value="<?=$id?>"/>
    Are you sure you want to delete this record?</br>
    <input type='submit' name='delete' value='Yes'/></br>
    <a href="index.php">No</a></br>
</form>

