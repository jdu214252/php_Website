<?php
  include ("../../path.php");
  include ("../../app/controls/topics.php");
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>
  <?php include("../../app/include/header-admin.php"); ?>
  
  
  <div class="container">
    
  <?php include("../../app/include/sidebar-admin.php"); ?>



      <div class="posts col-9">
        
        <div class="button row">
          <a href="<?php echo BASE_URL . "admin/topics/create.php" ?>" class="col-3 btn btn-success">Создать</a>
          <span class="col-1"></span>
          <a href="<?php echo BASE_URL . "admin/topics/index.php" ?>" class="col-3 btn btn-warning">Редактировать</a>
        </div>

        <div class="row title-table">
          <h3>Создать Категорию</h3>
        </div>

        <div class="row add-post">
        <div class="mb-12 col-12 col-md-12 err">
          <!-- Вывод массива с ошибками -->
            <?php include("../../app/helps/errorInfo.php"); ?>
          </div>
            <form action="create.php" method="post">

              <div class="col">
                  <input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Имя категории" aria-label="Имя категории">
              </div>
                
              <div class="col">
                <label for="content" class="form-label">Описание категории</label>
                <textarea name="description" class="form-control" id="content" rows="6"><?=$description;?></textarea>
              </div> 


             <div class="col">
                 <button name="topic-create" class="btn btn-primary" type="submit">SAVE</button>
             </div>

            </form>
        </div>
      </div>

    </div>
  </div>


    <!-- footer -->
  <?php include("../../app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>