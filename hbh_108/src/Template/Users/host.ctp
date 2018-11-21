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

        <a href="../events/mydashboard" ><img class="logo" src="<?php echo './../img/logo.png' ?>"></a>

        <ul>
            <li id="nav-item">
                <a href="../events/mydashboard" ><i id="nav-icon" class="fas fa-clipboard-list"></i>events</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>

    </div>



    <div class="main">

        <div class="listing-header">Profile / <?= $this->request->getSession()->read('Auth.User.username'); ?></div>

        <div class="profile">
            <div class="profile-meta">
                <img class="profile-image"src="<?php echo 'https://imgix.bustle.com/rehost/2016/9/13/f1debc8e-02c6-4ba3-814e-e573734e9e4b.png?w=970&h=582&fit=crop&crop=faces&auto=format&q=70'?>">
                <a href="edit"><i id="setting-icon"class="fas fa-cog"></i></a>
                <div class="fullname">
                    <h2 class="profile-name"><?= $this->request->getSession()->read('Auth.User.user_first_name'); ?></h2>
                    <h2 class="profile-name"><?= $this->request->getSession()->read('Auth.User.user_last_name'); ?></h2>
                </div>
                <h3 class="profile-username">@<?= $this->request->getSession()->read('Auth.User.username'); ?></h3>
                <p><?= $this->request->getSession()->read('Auth.User.user_description'); ?></p>

                <h3 class="events-tags"><?= $this->request->getSession()->read('Auth.User.user_tags'); ?></h3>

            </div>
        </div>


    </div>



