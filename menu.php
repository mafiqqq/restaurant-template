<?php 
define("TITLE", "Menu | Franklin's Dining");

include('includes/header.php');
?>

<div id="menu-items">
<h1>Our Menu</h1>
<p>Our menu are the best in town and served with love</p>
<p><em>Click any items to find out more</em></p>

<div class="hr"><hr /></div>

<?php 
foreach ($menuItems as $dish => $item) { ?>

<ul>
    <li><a href="dish.php?item=<?php echo $dish;?>"><?php echo $item["title"];?></a><sup>$</sup><?php 
    echo $item["price"];?></li>
</ul>
<?php
}
?>

</div><!-- Menu Items ends here -->

<?php 
include('includes/footer.php');
?>