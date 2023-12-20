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
    <link rel="stylesheet" href="style.css">
</head>
  <body>

    <?php 
      include("app/include/header.php");
    ?>

<!-- FORM -->
<div class="container reg_form">
    <form class="row justify-content-center" method="POST" action="log.php">
        <h2>Авторизация</h2>
        <div class="mb-3 col-12 col-md-4 err">
           <!-- <p><?=$errMsg ?></p> -->
           <p><?php print_r($errMsg); ?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Your EMAIL</label>
            <input name="mail" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <button type="submit" name="button-log" class="btn btn-secondary">Войти</button>
            <a href="reg.php">Зарегистрация</a>
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