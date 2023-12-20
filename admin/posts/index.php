<?php
include ("../../path.php");
include ("../../app/controls/posts.php");
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
          <a href="<?php echo BASE_URL . "admin/posts/create.php" ?>" class="col-3 btn btn-success">Создать</a>
          <span class="col-1"></span>
          <a href="<?php echo BASE_URL . "admin/posts/index.php" ?>" class="col-3 btn btn-warning">Редактировать</a>
        </div>

        <div class="row title-table">
          <h3>Управления записами</h3>
          <div class="col-1">ID</div>
          <div class="col-3">Название</div>
          <div class="col-2">Автор</div>
          <div class="col-6">Управления</div>
        </div>
        <?php foreach ($postsAdm as $key => $post): ?>
          <div class="row post">
            <div class="id col-1"><?=$key + 1; ?></div>
            <div class="title col-3"><?=mb_substr($post['title'], 0, 50, 'UTF-8') . '...' ?></div>
            <div class="author col-2"><?=$post['username']; ?></div>
            <div class="red col-2"><a href="edit.php?id=<?=$post['id'];?>">Edit</a></div>
            <div class="del col-2"><a href="edit.php?delete_id=<?=$post['id'];?>">Delete</a></div>
            <?php if($post['status']): ?>
              <div class="status col-2"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">Unpublish </a></div>
              <?php else:  ?>
                <div class="status col-2"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Publish </a></div>
              <?php endif;  ?>
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