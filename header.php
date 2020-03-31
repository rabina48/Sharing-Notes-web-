<?php 
    if (isset($_POST['query'])) {
        # code...
        echo $_POST['search'];
        // header('location:index.php?keyword='.$_POST['search']);
    }
 ?>
<head>
    <title>Homepages </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
           <H1>SHARE NOTES</H1>
           <ul id="navb">
            <li><a class ="homeblack" href="index.php">HOME</a></li>
            <li><a class ="homeblack" href="contact.php">CONTACT</a></li>
            <li><a class ="homeblack" href="notice.php">NOTICE</a></li>
           
            <?php if(!isset($_SESSION['login'])){ ?>
            <li><a class ="homeblack" href="user_log.php">LOGIN</a></li>  
            <li><a class ="homeblack" href="register.php">SIGN UP</a></li>  
            <?php }else{
                ?>
                <li><a class ="homeblack" href="upload_notes.php">UPLOAD</a></li>  
                <li><a class ="homeblack" href="logout.php">LOG OUT</a></li>  
                <?php } ?>
            </ul> 
            <form action="index.php" method="GET">
                <input type="text" name="search" placeholder="Search . . .">
                <input type="submit" class="button" name="query" value="GO">
            </form>
        </nav>

    </header>  
    <div class = "divider"><marquee style="padding-top: 6px; color: white;"> <?php 

        $getNotices = $connectDatabase->query("select * from notice order by date desc");

        $latestNotice = $getNotices->fetch();

        // var_dump($latestNotice);
        echo '<a href="noticeDisplay.php?noticeId='.$latestNotice['notice_id'].'" style="color: white;">Breaking News:: '.$latestNotice['notice'].'..Details</a>';
     ?></marquee></div>