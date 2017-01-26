<?php
include ('db_connect.php');

if (isset($_POST['building'])) {
    $building = $_POST['building'];
} else {
    $building = '';
}

if (isset($_POST['doorNum'])) {
    $doorNum = $_POST['doorNum'];
} else {
    $doorNum = '';
}

if (isset($_POST['hasCore'])) {
    $hasCore = $_POST['hasCore'];
} else {
    $hasCore = '';
}


if (isset($_POST['core'])) {
    $core = $_POST['core'];
} else {
    $core = '';
}

if (isset($_POST['serialNum'])) {
    $serialNum = $_POST['serialNum'];
} else {
    $serialNum = '';
}

if (isset($_POST['roomType'])) {
    $roomType = $_POST['roomType'];
} else {
    $roomType = '';
}



$id = intval($_GET['id']);

if(isset($_POST['building'])){
    $sql="UPDATE door SET building=?, doorNum=?, "
        . "hasCore=?, core=?, "
        . "serialNum=?, roomType=? WHERE id=?";
    if($hasCore=='no'){
        $hasCore=0;
    }else{
        $hasCore=1;
    }
    $params = array($building, $doorNum, 
        $hasCore, $core, 
        $serialNum, $roomType, $id);
    $query = $pdo->prepare($sql);
    $query->execute($params);
}

$sql = "SELECT building, doorNum, hasCore, core, serialNum, roomType"
        . " FROM door WHERE id=".$id;

$result = $pdo->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC)
?> 
<a href="index.php">Back</a>
<br>


<form method="post" border="1">
    <legend>Enter Door Details Below:</legend>
    <label>Enter Building</label></br>
    <input type="text" name="building" value='<?=$row['building']?>'/></br>
    <label>Enter Door Number</label></br>
    <input type="text" name="doorNum" value='<?=$row['doorNum']?>'/></br>
    <label>Does the Door have a Core</label></br>
    <select name="hasCore">
        <?php
            if ($row['hasCore'] == 0) {$s = "selected";} else {$s = "";}
                echo "<option value='no' $s>No</option>"; 
            if ($row['hasCore'] == 1) {$s = "selected";} else {$s = "";}
                echo "<option value='yes' $s>Yes</option>";               
        ?>
    </select>
    </br>
    <label>Enter Core Number</label></br>
    <input type="text" name="core" value='<?=$row['core']?>'/></br>
    <label>Enter Serial Number</label></br>
    <input type="text" name="serialNum" value='<?=$row['serialNum']?>'/></br>
    <label>Enter Room Type Description</label></br>
    <input type="text" name="roomType" value='<?=$row['roomType']?>'/></br>  
    <input type='submit' name='Save' value='Save Door' action="index.php"/>
</form>
