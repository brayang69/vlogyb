<?php
    require "config/app.php";
    require "config/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head>
<body>
    <main>
        <header>
            <img src="<?php echo URLIMGS . "/culebra.png" ?>" alt="Logo">
        </header>
        <section class="create">
            <menu>
                <a href="index.php">Login</a>
                <a href="javascript:;">Register</a>
            </menu>
            <form action="" method="post" enctype="multipart/form-data">
                <img src="<?php echo URLIMGS . "/computacion-en-la-nube.png" ?>" id="upload" width="240px" alt="Upload">
                <input type="file" name="photo" id="photo" accept="image/*" required>
                <input type="number" name="document" placeholder="Document" required>
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
            <?php
                if ($_POST) {
                    $photo = time() . "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $data = [
                        'document' => $_POST['document'],
                        'fullname' => $_POST['fullname'],
                        'photo'    => $photo,
                        'phone'    => $_POST['phone'],
                        'email'    => $_POST['email'],
                        'password' => $password,
                    ];
                    //echo var_dump($data);

                    if (addUser($conx, $data)) {
                            move_uploaded_file($_FILES['photo']['tmp_name'], "../01-ui/images/" . $photo);
                            header("Location: index.php");
                    }
                }
            ?>
        </section>
    </main>
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
    <script>
        $(document).ready(function () {
            $('#upload').click(function (e) { 
                e.preventDefault()
                $('#photo').click()
            })

            $('#photo').change(function (e) { 
                e.preventDefault();
                let reader = new FileReader()
                reader.onload = function(event) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })
        })
    </script>
</body>
</html>