<?php require "include/header.php"; ?>
<?php  global $conn;?>
<?php require "config.php";?>
<?php


if (isset($_POST['submit'])) {
    if ($_POST['email'] == ' ' or $_POST['username'] == ' ' or $_POST['password'] == ' ') {
        echo "Some inputs are empty";
    } else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $who = $_POST['who'];
        if ($_POST['who'] == "admin") {
            $insert = $conn->prepare("INSERT INTO admin( username ,password) VALUES (:username ,:password)");

            $insert->execute([
                ':username' => $username,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
            ]);

        } else {


            $insert = $conn->prepare("INSERT INTO users(email, username ,password,who) VALUES (:email,:username ,:password,:who)");

            $insert->execute([
                ':email' => $email,
                ':username' => $username,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':who' => $who,
            ]);

        }
    }
}

?>

<main class="form-signin w-50 m-auto">
    <form method="POST" action="register.php">

        <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

        <div class="form-floating">
            <label for="floatingInput">Email address</label>
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">

        </div>
        <br>
        <div class="form-floating">
            <label for="floatingInput">Username</label>
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">

        </div>
        <br>
        <div class="form-floating">
            <label for="floatingPassword">Password</label>
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">

        </div>
        <br>
        <div class="form-floating">
            <label for="floatingPassword">who</label>
            <input name="who" type="text" class="form-control" id="floatingPassword" placeholder="who">
        </div>
        <br>
        <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">sign in</button>
        <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>



    </form>
</main>
<?php require "include/footer.php"; ?>
