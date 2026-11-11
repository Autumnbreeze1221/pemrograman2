<?php
session_start();

if (isset($_POST['Login'])) {
    $User = $_POST['user'];
    $pass = $_POST['pass'];

    if ($User == "rahadian" && $pass == "123") {
        $_SESSION['login'] = $User;
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Login Berhasil</title>
        </head>
        <body>
            <h1>Anda berhasil LOGIN</h1>
            <h2>
                Klik <a href="session2.php">di sini (session2.php)</a>
                untuk menuju ke halaman pemeriksaan session.
            </h2>
        </body>
        </html>

        <?php
    } else {
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Login Here</title>
        </head>
        <body>
            <h2>Login Here...</h2>

            <form action="" method="post">
                Username:
                <input type="text" name="user" required>
                <br>

                Password:
                <input type="password" name="pass" required>
                <br>

                <input type="submit" name="Login" value="Log In">
            </form>

            <p>Username atau password salah!</p>
        </body>
        </html>

        <?php
    }
} else {
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Here</title>
    </head>
    <body>
        <h2>Login Here...</h2>

        <form action="" method="post">
            Username:
            <input type="text" name="user" required>
            <br>

            Password:
            <input type="password" name="pass" required>
            <br>

            <input type="submit" name="Login" value="Log In">
        </form>
    </body>
    </html>

    <?php
}
?>