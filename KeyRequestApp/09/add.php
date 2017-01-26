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

?>
<form method="post" border="1">
    <legend>Enter Door Details Below:</legend>
    <label>Enter Building</label></br>
    <input type="text" name="building" value='<?=$building?>'/></br>
    <label>Enter Door Number</label></br>
    <input type="text" name="doorNum" value='<?=$doorNum?>'/></br>
    <label>Does the Door have a Core</label></br>
    <select name="hasCore">
        <?php
            if ($hasCore === 'no') {$s = "selected";} else {$s = "";}
                echo "<option value='no' $s>No</option>"; 
            if ($hasCore === 'yes') {$s = "selected";} else {$s = "";}
                echo "<option value='yes' $s>Yes</option>";               
        ?>
    </select>
    </br>
    <label>Enter Core Number</label></br>
    <input type="text" name="core" value='<?=$core?>'/></br>
    <label>Enter Serial Number</label></br>
    <input type="text" name="serialNum" value='<?=$serialNum?>'/></br>
    <label>Enter Room Type Description</label></br>
    <input type="text" name="roomType" value='<?=$roomType?>'/></br>  
    <input type='submit' name='Save' value='Save Door'/>
</form>

<?php
if(isset($_POST['building'])){
$sql="INSERT INTO door SET building=?, doorNum=?, "
    . "hasCore=?, core=?, "
    . "serialNum=?, roomType=?";
if($hasCore=='no'){
    $hasCore=0;
}else{
    $hasCore=1;
}
$params = array($building, $doorNum, 
    $hasCore, $core, 
    $serialNum, $roomType);
$query = $pdo->prepare($sql);
$query->execute($params);
$id = $pdo->lastInsertId();

echo "<a href=\"details.php?id=" . $id . "\">To Door Details</a>";
}


?>