<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <?= $this->Html->css('hbh_style.css') ?>


</head>
<body>
<div class="content">
    <div class="navagation">

        <a href="../" ><img class="logo" src="<?php echo '../../img/logo.png' ?>"></a>

        <ul>
            <li id="nav-item">
                <a href="/../events/test" ><i id="nav-icon" class="fas fa-clipboard-list"></i>listings</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>

    </div>
    <div class="main">

        <div class="listing-header">Profile / <?= h($user->username) ?></div>

        <div class="profile">
            <div class="profile-meta">
                <img class="profile-image"src="<?php echo 'https://imgix.bustle.com/rehost/2016/9/13/f1debc8e-02c6-4ba3-814e-e573734e9e4b.png?w=970&h=582&fit=crop&crop=faces&auto=format&q=70'?>">
                <div class="user-FLname">
                    <h2 class="profile-name"><?= h($user->user_first_name) ?></h2>
                    <h2 class="profile-name"> <?= h($user->user_last_name) ?></h2>
                </div>
                <h3 class="profile-username">@<?= h($user->username) ?></h3>
                <h3 class="events-tags"><?= h($user->user_tags) ?></h3>

            </div>
        </div


    </div>



