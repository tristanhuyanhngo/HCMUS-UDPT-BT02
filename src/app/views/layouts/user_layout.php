<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management - Layout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="/public/assets/users/css/style.css">
</head>

<body>
    <title><?php echo (!empty($page_title))?$page_title:'Trang chủ website';?></title>
    <?php
        $this->render('blocks/header');
        $this->render($content, $sub_content);
        $this->render('blocks/footer');
    ?>
<!--    <div class="image-fluid">-->
<!--        <img src="/public/assets/users/images/home.jpg" style="width: 1000px; height: auto;" alt="home.jpg">-->
<!--    </div>-->
    <script text="text/javascript" src="/public/assets/users/js/script.js"></script>
</body>

</html>