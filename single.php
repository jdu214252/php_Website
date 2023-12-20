<?php 
    include("path.php");
    // include 'app/database/db.php';
    include ("app/controls/topics.php");
    // $post = [];
    $post = selectAllFromPostsWithUsersOnSingle('posts', 'users',  $_GET['post']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="./assets/css/single.css" rel="stylesheet">
</head>
  <body>

    <?php 
      include("app/include/header.php");
    ?>


    <!-- BLOK MAIN -->
    <div class="container">
      <div class="content row">
       
        <!-- main content -->
        <div class="main-content col-md-9 col-12">
            <h4><?php echo $post['title']; ?></h4>
          
            <div class="single_post row">
          
                <div class="img col-12">
                  <img src="assets/images/posts/<?= $post['img']?>" alt="<?=$post['title']?>"  class="img-thumbnail">
                </div>

                <div class="info">
                     <i class="far fa-user"><?=$post['username'];?></i>
                    <i class="far fa-calendar"><?=$post['created_date'];?></i>
                </div>

                <div class="single_post_text col-12">
                  <?=$post['content'];?>
                </div>

            </div>
          
        </div>

        <!-- sidebar content -->
        <div class="sidebar col-md-3 col-12">
          
        <div class="section search">
            <h5>Search</h5>
            <form action="search.php" method="post">
              <input type="text" name="search-term" class="text-input" placeholder="Search...">
            </form>
          </div>
          

          <div class="section topics">
            <h5>Categories</h5>
            <ul>

              <?php foreach ($topics as $key => $topic): ?>
               
                <li><a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a></li>
             
              <?php endforeach; ?>

            </ul>
          </div>


        </div>
      </div>
    </div>

    <!-- BLOK MAIN END-->


    <!-- footer -->
    <?php 
      include("app/include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  

</body>
</html>