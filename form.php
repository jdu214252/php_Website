<?php
    include 'C:\OSPanel\domains\MyBlog\app\database\connect.php';
    include 'C:\OSPanel\domains\MyBlog\app\database\db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключение стилей Bootstrap для оформления страницы -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Результат</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Результат</h1>
        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        require 'vendor\phpmailer\phpmailer\src\Exception.php';
        require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
        require 'vendor\phpmailer\phpmailer\src\SMTP.php';
      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = trim($_POST["content"]);
            $email = trim($_POST["email"]);
    

            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true; 
                $mail->Username = 'htursunxujaev@gmail.com'; 
                $mail->Password = 'qoef lpsp wcau vtcm'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
                $mail->Port = 465; 
                $mail->CharSet = 'UTF-8'; 
                $mail->Subject = 'Новое сообщение от ' . $email;

               
                $mail->setFrom($email ,$content);
                $mail->addAddress('htursunxujaev@gmail.com'); 
                $mail->addReplyTo($email, $content);

                $mail->isHTML(true);
                $mail->Subject = 'Новое сообщение от ' . $email;
                $mail->Body = "Email: $email <br> Сообщение: $content";

                $mail->send();

                echo '<div>';
                echo 'Ваши данные успешно отправлены!';
                echo '</div>';
            } catch (Exception $e) {
                
                echo '<div';
                echo 'Произошла ошибка при отправке данных. Пожалуйста, попробуйте еще раз.';
                echo '</div>';
            }

            if (!empty($email) && !empty($content)) {
                $info = [
                    'email' => $email,
                    'content' => $content,
                    
                   ];
           
                insert('contact', $info);
            } else {
                echo '<div>';
                    echo 'Произошла ошибка при отправке данных. Пожалуйста, попробуйте еще раз.';
                echo '</div>';
              
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>