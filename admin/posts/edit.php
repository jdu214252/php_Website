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
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include("../../app/include/header-admin.php"); ?>
  
  
  <div class="container">

  <?php include("../../app/include/sidebar-admin.php"); ?>


      <div class="posts col-9">

        <div class="row title-table">
          <h3>Редактирование записи</h3>
        </div>

        <div class="row add-post">
          <div class="mb-12 col-12 col-md-12 err">
          <!-- Вывод массива с ошибками -->
            <?php include("../../app/helps/errorInfo.php"); ?>
          </div>
            <form action="edit.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?=$id; ?>">

              <div class="col mb-4">
                  <input value="<?=$post['title']; ?>" name="title" type="text" class="form-control" placeholder="Title" aria-label="Название стати">
              </div>
                
              <div class="col">
                  <label for="editor" class="form-label">Содержимое записи</label>
                  <textarea name="content" id="editor" class="form-control" rows="6"><?=$post['content']; ?></textarea>
              </div>

              <div class="input-group col mb-4 mt-4">
                  <input name="img" type="file" class="form-control" id="inputGroupFile02">
                  <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>

              <select name="topic" class="form-select mb-2" aria-label="Default select example">
                    <?php foreach ($topics as $key => $topic): ?>
                        
                      <option value="<?=$topic['id']; ?>"><?=$topic['name'];?></option>

                      <?php endforeach; ?>
              </select>

              <div class="form-check">
                <?php if(empty($publish) && $publish == 0): ?>
                        <input name="publish" class="form-check-input" type="checkbox"  id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">Publish</label>
                <?php else: ?>
                    <input name="publish" class="form-check-input" type="checkbox"  id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">Publish</label>
                <?php endif; ?>
              </div>

              <div class="col col-6">
                  <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
              </div>

            </form>
        </div>
      </div>

    </div>
  </div>


    <!-- footer -->
  <?php include("../../app/include/footer.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Добавления визуального редактора к текстовому полю админки -->
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

  <script src="../../assets/js/script.js"></script>

</body>
</html>