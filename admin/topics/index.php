<?php 
// session_start();
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
              <h3>Управления категориями</h3>
              <div class="col-1">ID</div>
              <div class="col-5">Название</div>
              <div class="col-4">Управления</div>
            </div>

            <?php foreach ($topics as $key => $topic): ?>
            <div class="row post">
              <div class="id col-1"><?=$key + 1; ?></div>
              <div class="title col-5"><?=$topic['name']; ?></div>
              <div class="red col-2"><a href="edit.php?id=<?=$topic['id'];?>">Edit</a></div>
              <div class="del col-2"><a href="index.php?del_id=<?=$topic['id'];?>">Delete</a></div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>


    <!-- footer -->
  <?php include("../../app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>