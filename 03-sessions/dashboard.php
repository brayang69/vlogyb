<?php
    require "config/app.php";
    require "config/database.php";

    if(!isset($_SESSION['uid'])){
        $_SESSION['error'] = "Please login first to access dashboard.";
        header("location: index.php");
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Pets</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
    <style>
        div.menu{
            background-color: var(--color-pri);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: absolute;
            gap: 2rem;
            top: -1000px;
            left: 0;
            opacity: 0;
            z-index: 999;
            justify-content: center;
            min-height: 100vh;
            width: 100%;

            a:is(:link, :visited){
                border: 1px solid #fff;
                border-radius: 50px;
                color: #fff;
                font-size: 2rem;
                padding: 10px 20px;
                text-decoration: none;
            }
        }

        div.menu.open {
    animation: openMenu 0.5s ease-in 1 forwards;
}

div.menu.close {
    animation: closeMenu 0.5s ease-in 1 forwards;
}

        @keyframes closeMenu {
            0%{
                top: 0;
                opacity: 1;
            }
            100%{
                top: -1000px;
                opacity: 0;
            }
        }

        @keyframes openMenu {
            0%{
                top: -1000px;
                opacity: 0;
            }
            100%{
                top: 0;
                opacity: 1;
            }
        }

    </style>
</head>
<body>
<div class="menu">
    <a href="javascript:;" class="closem" >X</a>
    <nav>
        <a href="close.php">Close Sesion</a>

    </nav>

</div>
<main>
<header class="nav level-0">
            <a href="">
                <img src="<?php echo URLIMGS . "/volver.png" ?>" alt="Back">
            </a>
            <img src="<?php echo URLIMGS . "/culebra.png" ?>" alt="Logo">
            <a href="javascript:;" class="mburger">
                <img src="<?php echo URLIMGS . "/menu.png" ?>" alt="Menu Burger">
            </a>
        </header>
        <section class="dashboard">
            <h1>Dashboard</h1>
            <menu>
                <ul>
                    <li>
                        <a href="users/index.html">
                            <img src="<?php echo URLIMGS . "/husuario.png"?>" alt="Users">
                            <span>Module User</span>    
                        </a>
                    </li>
                    <li>
                        <a href="pets/index.html">
                            <img src="<?php echo URLIMGS ."/perrito.png" ?> "alt="Pets">
                            <span>Module Pets</span>
                        </a>
                    </li>
                    <li>
                        <a href="adoptions/index.html">
                            <img src="<?php echo URLIMGS . "/house.png" ?>" alt="Adoptions">
                            <span>Module Adoptions</span>
                        </a>
                    </li>
                </ul>
            </menu>
        </section>
    </main>
    
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
    <script>
        $(document).ready(function () {

            $('body').on('click', '.mburger', function () {
                $('.menu').addClass('open')
            });

            $('body').on('click', '.closem', function () {
                $('.menu').addClass('close')
                setTimeout(() => {

                    $('.menu').removeClass('open')
                    $('.menu').removeClass('close')
                }, 1000)
            })







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

           
        })
    </script>
</body>
</html>