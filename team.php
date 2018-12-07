<?php
define("TITLE", "Team | Frankie's Dining ");
include('includes/header.php');
?>

<div id="team-members" class="cf">

    <h1>Our Team at Frankie's</h1>
    <p>We're small yet rising food franchise which serves food style from Malaysia. We believe we do serve
    the <strong>best food ever!</strong></p>

    <div class="hr"><hr /></div>

    <?php 
        foreach($teamMembers as $team){
    ?>
        <div class="member">
            <img src="img/<?php echo $team["img"]?>.png" alt="<?php echo $team["name"];?>">
            <h3><?php echo $team["name"]; ?></h3>
            <h2><?php echo $team["position"];?></h2>
            <p><?php echo $team["bio"];?></p>
        </div><!-- Member ends here -->

<?php
}
?>

</div><!-- Team Members ends here -->

<?php
include('includes/footer.php');
?>