<!-- header start-->
<header class="container-fluid">
    <div class="container">
        <div class="row">
                
            <div class="col-4 "> <!--logo -->
                <h4> <a href="<?php echo BASE_URL ?>">Xusan</a> </h4>
            </div>

            <nav class="col-8" id="navigation-bar">
                <ul>
                    <li><a href="<?php echo BASE_URL ?>">Main</a></li>
                    <li><a href="<?php echo BASE_URL ?>">About us</a></li>
                    <li><a href="#">Uslugi</a></li>
                    
                    <li>
                        <?php if(isset($_SESSION['id'])):  ?>
                            <a href="#">
                                <?php echo $_SESSION['login']; ?>
                            </a>
                        <ul>
                            <?php if($_SESSION['admin']): ?>
                                <li><a href="#">Admin panel</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Exit</a></li> 
                        </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . "log.php"; ?>">Войти</a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a></li> 
                            </ul>
                        <?php endif; ?>
                    </li>
                    
                </ul>
            </nav>

        </div>
    </div>
</header>
<div class="b-example-divider"></div>
<!-- header end-->