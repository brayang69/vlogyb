<?php
    require "config/app.php";
    require "config/database.php";

    $pet = getPet($conx, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Pet</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head>
<body>
    <main>
        <header class="nav level-1">
            <a href="index.php">
                <img src="<?php echo URLIMGS . "/volver.png" ?>" alt="Back">
            </a>
            <img src="<?php echo URLIMGS . "/culebra.png" ?>" alt="Logo">
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/menu.png" ?>" alt="Menu Burger">
            </a>
        </header>
        <section class="show">
            <h1>Show Pet</h1>
            <img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" class="photo" alt="Photo">
            <div class="info">
                <p><?=$pet['name']?></p>
                <p><?=$pet['kind']?></p>
                <p><?=$pet['age']?> Years Old</p>
                <p><?=$pet['weight']?> Lbs</p>
                <p><?=$pet['breed']?></p>
                <p><?=$pet['location']?></p>
            </div>
        </section>
    </main>
    <script src="../../js/sweetalert2.js"></script>
    <script src="../../js/jquery-3.7.1.min.js"></script>
</body>
</html>