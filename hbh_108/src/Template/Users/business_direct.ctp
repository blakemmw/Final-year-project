<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <?= $this->Html->css('hbh_style.css') ?>

</head>
<body>
<div class="content">
    <div class="navagation">
        <a href="./business_direct" ><img class="logo" src="<?php echo '../img/logo.png' ?>"></a>
        <ul>
            <li id="nav-item">
                <a href="../events/test" ><i id="nav-icon" class="fas fa-clipboard-list"></i>listings</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>

    </div>
    <div class="main">
        <div class="header">
            <div class="heading">Businesses</div>

            <form id="keyword" method="get">
                <label for="searchbar"></label>
                <input size="30" name="keyword" value="" id="searchbar" autofocus="" type="text" placeholder="search">
            <button class="search-btn" type="submit" id="search-btn"><i  class="fas fa-search"></i></button>
            </form>



        </div>

        <div class="all-listing">
            <?php foreach ($users as $user): ?>
                <div class="business-tile">
                    <img class="listing-image" src="<?php echo 'https://timedotcom.files.wordpress.com/2015/07/the-lord-of-the-rings-the-return-of-the-king.jpg'?>">
                    <div class="day-counter"></div>
                    <div class="listing-meta">
                        <h3 class="listing-title"><?= h($user->user_first_name) ?></h3>
                        <h3 class="listing-price"><?= h($user->user_tags) ?></h3>
                        <h3 class="listing-bookings"><?= h($user->user_description) ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>



        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>