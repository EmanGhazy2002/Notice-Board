<?php require "include/header.php"; ?>
<?php  global $conn;?>
<?php require "config.php";?>


<?php

if (isset($_POST['submit'])){
    if ($_POST['who']=="admin"){
        header("Location: home.php");
    }
    else{
        header("Location: home.php");
    }

    if ($_POST['username']==' ' or $_POST['subject']==' ' or $_POST['description']==' ' ){
        echo "Some inputs are empty";
    }else{
        $username =$_POST['username'];
        $subject =$_POST['subject'];
        $description =$_POST['description'];




        $insert = $conn -> prepare("INSERT INTO massage(username, subject ,description) VALUES (:username,:subject ,:description)");

        $insert->execute([
            ':username'=>$username,
            ':subject'=>$subject,
            ':description'=>$description,

        ]);

    }
} ?>

<main class="form-signin w-50 m-auto">
    <form method="POST" action="send-massage.php">

        <h1 class="h3 mt-5 fw-normal text-center">Enter Massage</h1>
        <div class="form-floating">
            <label for="floatingInput">username</label>
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">

        </div>
        <br>
        <div class="form-floating">
            <label for="floatingInput">subject</label>
            <input name="subject" type="text" class="form-control" id="floatingInput" placeholder="subject">

        </div>
        <br>
        <div class="form-floating">
            <label for="floatingInput">description</label>
            <input name="description" type="text" class="form-control" id="floatingInput" placeholder="description">

        </div>
        <br>

        <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">send</button>




    </form>
</main>
<?php require "include/footer.php"; ?>
