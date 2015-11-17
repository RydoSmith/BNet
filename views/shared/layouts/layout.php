<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('views/shared/header.php'); ?>
</head>

<body class="animated-content">
    <?php require('views/shared/nav.php'); ?>


<div id="wrapper">
    <div id="layout-static">
        <?php require('views/shared/sidebar.php'); ?>
        <div class="static-content-wrapper">
            <?php require($location);  ?>
            <?php require('views/shared/footer.php'); ?>
        </div>
    </div>
</div>