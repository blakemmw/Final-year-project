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

        <a href="./dashboard" ><img class="logo" src="<?php echo '../img/logo.png' ?>"></a>

        <ul>
            <li id="nav-item">
                <a href="./dashboard" ><i id="nav-icon" class="fas fa-clipboard-list"></i>events</a></li>
            <li id="nav-item"><a href="../users/profile"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>

    </div>
    <div class="main">

        <div class="listing-header">Upcoming events</div>

        <div class="all-listing">


            <?php foreach ($events as $e): ?>
                <div class="listing">
                    <div class ="listing-image"><?php echo $this->Html->image($e->photo);?></div>
                    <div class="day-counter"><?= h($e->event_date) ?></div>
                    <div class="listing-meta">
                        <h3 class="listing-title"><?= $this->Html->link(__(h($e->event_name) ), ['action' => 'view', $e->event_id]) ?></h3>
                        <h3 class="listing-price">$<?= $this->Number->format($e->event_ticket_price) ?></h3>
                        <h3 class="listing-bookings"><?= $this->Number->format($e->event_tickets_sold) ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

</div>

<script>

    $(".listing").click(function() {
        window.location = $(this).find("a").attr("href");
        return false;
    });

</script>
</body>
</html>