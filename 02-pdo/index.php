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
    <title>Module Pets</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head> <style>
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

<body>
    <main>
        <header class="nav level-0">
            <a href="">
                <img src="<?php echo URLIMGS . "/volver.png" ?>" alt="Back">
            </a>
            <img src="<?php echo URLIMGS . "/culebra.png" ?>" alt="Logo">
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/menu.png" ?>" alt="Menu Burger">
            </a>
        </header>
        <section class="module">
            <h1>Module pets</h1>
            <a class="add" href="add.php">
                <img src="<?php echo URLIMGS . "/mas.png" ?>" width="30px" alt="Add">
                Add Pet
            </a>
            <table>
                <tbody>
                <?php foreach($pets as $pet): ?>
                    <tr>
                        <td>
                            <img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" alt="Pet">
                        </td>
                        <td>
                            <span><?php echo $pet['name'] ?></span>
                            <span><?php echo $pet['kind'] ?></span>
                        </td>
                        <td>
                            <a href="show.php?id=<?=$pet['id']?>" class="show">
                                <img src="<?php echo URLIMGS . "/lupa.png" ?>" alt="Show">
                            </a>
                            <a href="edit.php?id=<?=$pet['id']?>" class="edit">
                                <img src="<?php echo URLIMGS . "/lapiz.png" ?>" alt="Edit">
                            </a>
                            <a href="javascript:;" class="delete" data-id="<?=$pet['id']?>">
                                <img src="<?php echo URLIMGS . "/eliminar.png" ?>" alt="Delete">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
    <script>
        $(document).ready(function () {

            <?php if(isset($_SESSION['msg'])): ?>
                Swal.fire({
                    position: "top-end",
                    title: "Congratulations!",
                    text: "<?php echo $_SESSION['msg'] ?>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                })
                <?php unset($_SESSION['msg']) ?>
            <?php endif ?>

            $('body').on('click', '.delete', function () {
                $id = $(this).attr('data-id')
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1f7a8c",
                    cancelButtonColor: "#1f7a8c",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace('delete.php?id=' + $id)
                    }
                })
            })
        })
    </script>
</body>
</html>
