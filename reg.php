<?php 
  include("path.php");  
  include("app/controls/users.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
  <body>

    <?php 
      include("app/include/header.php");
    ?>

<!-- FORM -->
<div class="container reg_form">
    <form action="reg.php" method="POST" class="row justify-content-center">
        <h2>Registration Form</h2>
        <div class="mb-3 col-12 col-md-4 err">
        <p><?php print_r($errMsg); ?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Your Login</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
        </div>

        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name="mail" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Repeat Password</label>
            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2">
        </div>

        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-secondary" name="button-reg" >Регистрация</button>
            <a href="log.php">Войти</a>
        </div>
        
    </form>
</div>
<!-- FORM end-->

<!-- footer -->
    <?php 
      include("app/include/footer.php");
    ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>