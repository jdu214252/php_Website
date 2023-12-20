<?php 
    include 'path.php';
    include ("app/controls/topics.php");
    $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');
    $topTopic = selectTopTopicsFromPostsOnIndex('posts');
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

   <?php include 'app/include/header.php' ?>

    <!-- BLOK CARUSEL -->
    <div class="container">
        
        <div class="row">
            <h4 class="slider-title">Топ Публикации</h4>
        </div>
      
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

            <?php foreach($topTopic as $post): ?>
             <div class="carousel-item active" >
               <img src="assets/images/posts/<?= $post['img'] ?>" alt="<?=$post['title']?>" class="d-block w-100">
               <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                 <h5><a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"> <?=substr($post['title'], 0, 120) . '...' ?></a></h5>
                 <!-- <p>Some representative placeholder content for the first slide.</p> -->
               </div>
             </div>
            <?php endforeach; ?>
              
              
           
              
            
            </div>
    
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <!-- BLOK CARUSEL END-->




    <!-- BLOK MAIN -->
    <div class="container">
      <div class="content row">
       
        <!-- main content -->
        <div class="main-content col-md-9 col-12">
        
          <h4>Последние Публикации</h4>
          <?php foreach($posts as $post): ?>
            <div class="post row">  
              <div class="img col-12 col-md-4">
                <!-- <img src="<?='C:\OSPanel\domains\MyBlog\assets\images\posts'. $post['img']?>" alt="" class="img-thumbnail"> -->
                <img src="assets/images/posts/<?= $post['img'] ?>" alt="<?=$post['title']?>" class="img-thumbnail">
              </div>

              <div class="post_text col-12 col-md-8">
                <h5><a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"> <?=substr($post['title'], 0, 80) . '...' ?></a></h5>
                <i class="far fa-user"> <?=$post['username'];?></i>
                <i class="far fa-calendar"> <?=$post['created_date'];?></i>

                <p class="preview-text"> <?=substr($post['content'], 0, 150) . '...'?> </p>

              </div>

            </div>
          <?php endforeach; ?>
    

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
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>