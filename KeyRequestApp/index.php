<?php

if (isset($_POST['wood'])) {
    $wood = $_POST['wood'];
} else {
    $wood = 'RedOak';
}

if (isset($_POST['finish'])) {
    $finish = $_POST['finish'];
} else {
    $finish = 'unfinish';
}


$materials_cost = 0;		// cost of materials: glass, fish, water, etc
$labor_cost = 0;			// cost of putting it together
$total_cost = 0;			// the grand total
$time_required = 0;		// the total number of hours required



$width = intval(@$_REQUEST['width']);
$height = intval(@$_REQUEST['height']);
$depth = intval(@$_REQUEST['depth']);


$error='';



// Finding wood sqft
$wood_surface = (($width*$height)/144)*2 + (($width*$depth)/144)*2 + (($height*$depth)/144)*2;


// wood costs per sqft, thickness assumed at 1/4 inch
$redOakPrice = 1.50;
$blackWalnutPrice = 3.88;
$maplePrice = 1.38;
$hickoryPrice = 3.72;
$amCherryPrice = 1.60;
// switching the drop down menu for type of wood
switch ($wood){
    case 'RedOak': $wood_type=$redOakPrice;
        break;
    case 'BlackWalnut': $wood_type=$blackWalnutPrice;
        break;
    case 'Maple': $wood_type=$maplePrice;
        break;
    case 'Hickory': $wood_type=$hickoryPrice;
        break;
    case 'AmericanCherry': $wood_type=$amCherryPrice;
        break;
}
// add 15% waste onto sqft of wood
$wood_with_waste = $wood_surface+($wood_surface*.15);
// will give raw price per sqft of wood type
$raw_wood = $wood_type*$wood_with_waste;

// finish pricing
$paintPrice=60;
$fauxPrice=100;
$stainPrice=25;

// switching the finish options
switch ($finish){
    case 'unfinish': $finish_type=0;
        break;
    case 'faux': $finish_type=$fauxPrice;
        break;
    case 'stain': $finish_type=$stainPrice;
        break;
    case 'paint': $finish_type=$paintPrice;
        break;
}
$materials_cost = $raw_wood+$finish_type;



$build_time=0;

$x = $wood_with_waste+$finish_type;
// calculating the time it takes using method based on the sqft of item + type of finish
for ($i = 0; $i < 6; $i++){
	// {add code here}
$build_time += $x;
$x = $x- ($x*.1);
}    

$time_required = ceil((($build_time)/60)/24);

$labor_cost = ceil((($build_time)/60))*33.71;
$total_cost = $labor_cost+$materials_cost;

$total_cost = number_format($total_cost, 2);

echo $error;
if($width==0) $width='';
if($height==0) $height='';
if($depth==0) $depth='';
?>
<form method='post' action='index.php'>
	<table border='1'>
		<tr>
			<th colspan='2'>Wood Cost Estimator</th>
		</tr>
		<tr>
			<td>Width</td>
			<td><input type='text' name='width' value='<?=$width?>' size='5'/> in</td>
		</tr>
		<tr>
			<td>Height</td>
			<td><input type='text' name='height' value='<?=$height?>' size='5'/> in</td>
		</tr>
		<tr>
			<td>Depth</td>
			<td><input type='text' name='depth' value='<?=$depth?>' size='5'/> in</td>
		</tr>
                <tr>
                    <td>Select Type of Wood</td>
                    <td>
                        <select name="wood">
                            <?php
                            if ($wood === 'RedOak') {$s = "selected";} else {$s = "";}
                                echo "<option value='RedOak' $s>Red Oak</option>";
                            if ($wood === 'BlackWalnut') {$s = "selected";} else {$s = "";}
                                echo "<option value='BlackWalnut' $s>Black Walnut</option>";
                            if ($wood === 'Maple') {$s = "selected";} else {$s = "";}
                                echo "<option value='Maple' $s>Maple</option>";
                            if ($wood === 'Hickory') {$s = "selected";} else {$s = "";}
                                echo "<option value='Hickory' $s>Hickory</option>";
                            if ($wood === 'AmericanCherry') {$s = "selected";} else {$s = "";}
                                echo "<option value='AmericanCherry') $s>American Cherry</option>";
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Select Type of Finish</td>
                    <td>
                        <select name="finish">
                            <?php
                            if ($finish === 'unfinish') {$s = "selected";} else {$s = "";}
                                echo "<option value='unfinish' $s>No Finish</option>";
                            if ($finish === 'faux') {$s = "selected";} else {$s = "";}
                                echo "<option value='faux' $s>Faux Finish</option>";
                            if ($finish === 'stain') {$s = "selected";} else {$s = "";}
                                echo "<option value='stain' $s>Stain and Varnish</option>";
                            if ($finish === 'paint') {$s = "selected";} else {$s = "";}
                                echo "<option value='paint' $s>Paint and Seal</option>";    
                            ?>
                        </select>
                    </td>
                </tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' value='Calculate'/></td>
		</tr>
		<tr>
			<th colspan='2'>Results</th>
		</tr>
		<tr>
			<td>Materials Cost</td>
			<td>$<?=($materials_cost) ? $materials_cost: '&nbsp;'?></td>
		</tr>
		<tr>
			<td>Labor Cost</td>
			<td>$<?=($labor_cost) ? $labor_cost : '&nbsp;'?></td>
		</tr>
		<tr>
			<td>Total Cost</td>
			<td>$<?=($total_cost) ? $total_cost : '&nbsp;'?></td>
		</tr>
		<tr>
			<td>Time Required</td>
			<td><?=($time_required)?$time_required.' days':'&nbsp;'?></td>
		</tr>
	</table>
</form>