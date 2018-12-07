<?php 
define("TITLE","Menu | Franklin's Dining");

include('includes/header.php');

function strip_bad_chars($input){
    $output = preg_replace("/[^a-zA-Z0-9]/","",$input);
    return $output;
}
if(isset($_GET["item"])) {

    $menuItem = strip_bad_chars( $_GET["item"]);

    $dish = $menuItems["$menuItem"];
}

//Calculate Suggested Tips 

function suggestedTip($price, $tip){

    $totalTip = $price * $tip;
    echo $totalTip;
}
?>

<div class="hr"><hr /></div>

<div class="dish">
<h1><?php echo $dish["title"];?><span class="price"><sup>$</sup><?php echo $dish["price"];?></span></h1>
<p><?php echo $dish["desc"];?></p>

<br>

<p><strong>Suggested Drinks: </strong><?php echo $dish["drinks"]; ?></p>
<p><em>Suggested Tips: <sup>$</sup><?php suggestedTip($dish["price"], 0.20) ?></em></p>
</div>

<div class="hr"><hr /></div>

<a href="menu.php" class="button previous">&laquo; Back to Menu </a>

<?php 
include('includes/footer.php');
?>