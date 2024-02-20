<?php

require "config/app.php";
require "config/database.php";

$pets = getAllPets($conx);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Ink+Free&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2@11.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B23A48;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .back-button,
        .menu-icon {
            position: absolute;
            top: 20px;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .back-button {
            left: 20px;
        }

        .menu-icon {
            right: 20px;
        }

        .header-text {
            font-family: "Ink Free", sans-serif;
            font-size: 36px;
            color: black;
            text-transform: uppercase;
        }

        .module-users-text {
            margin-top: 20px;
            font-family: "Ink Free", sans-serif;
            font-size: 24px;
            color: black;
            font-weight: normal;
        }

        .boxes-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box-container {
            width: 100%;
            max-width: 400px;
            height: 80px;
            border-radius: 20px;
            background-color: rgba(254, 208, 187, 0.7);
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
            padding: 0 20px;
            cursor: pointer;
        }

        .box {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .box-icon {
            font-size: 24px;
            margin-right: 10px;
            color: black;
        }

        .box-text {
            flex: 1;
            font-size: 18px;
            color: black;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .box-icons {
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="back-button" onclick="window.history.back();">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div class="menu-icon" onclick="window.location.href = 'dashboard.html';">
            <i class="fas fa-bars"></i>
        </div>
        <h2 class="header-text">PetsApp</h2>
        <h3 class="module-users-text">Module Pets</h3>
        <div class="boxes-container">
            <?php foreach($pets as $pet): ?>
                <div class="box-container">
                    <div class="box">
                        <div class="box-icon">
                            <img src="<?php echo $pet['photo']; ?>" alt="Pet Photo" style="width: 40px; height: 40px; border-radius: 50%;">
                        </div>
                        <div class="box-text"><?php echo $pet['name']; ?></div>
                        <div class="box-icons">
                            <div class="box-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="box-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="box-icon" onclick="showDeleteAlert();">
                                <i class="fas fa-trash"></i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showDeleteAlert() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }
    </script>
</body>
</html>
