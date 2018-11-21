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
        <a href="../dashboard" ><img class="logo" src="<?php echo '../../img/logo.png' ?>"></a>
        <ul>
            <li id="nav-item">
                <a href="../dashboard" ><i id="nav-icon" class="fas fa-clipboard-list"></i>events</a></li>
            <li id="nav-item"><a href="/../users/profile"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="header">
            <a href="../dashboard"><i id="back-button" class="fas fa-chevron-left"></i></a>
            <div class="heading"><?= h($event->event_name) ?> by <?= h($users->user->user_business_name) ?></div><div class="event-date"><?= h($event->event_date) ?> </div>
        </div>

        <div class="listing-page">
            <div class="event-meta" style="padding-left: 0% !Important">

                <iframe width="100%" height="100%" frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?q=hollistic%20business%20hub&key=AIzaSyBDzNupvm_8mjBhNiydo_C5NF6jCm6cw3A" allowfullscreen></iframe>

            </div>



            <div class="listing-image">
                <?php echo $this->Html->image($event->photo); ?>
            </div>
            <div class="desc-area">

                <div class="event-desc-main">
                    <h2 class="desc-title">Description</h2>
                    <p class="event-desc"><?= h($event->event_description) ?></p>

                     <h2 class="desc-title">Tags</h2>
                    <?php foreach ($event->tags as $tags): ?>

                        <p class="desc-tags"><?= h($tags->tag_name) ?></p>

                    <?php endforeach; ?>
                </div>



            </div> <!-- desc-area -->

            <div class="event-desc-meta">
                <div class="event-meta-time">
                    <h2 class="desc-title">Date and Time</h2>
                    <p class="desc-component"><?= h($event->event_start_time) ?> - <?= h($event->event_end_time) ?></p>
                </div>
                <div class="event-location">
                    <h2 class="desc-title"> Location</h2>

                    <?php foreach ($event->rooms as $rooms): ?>

                        <p class="desc-component"><?= h($rooms->room_name) ?></p>
                        <p><?= h($rooms->venue->venue_street) ?>, <?= h($rooms->venue->venue_suburb) ?>, <?= h($rooms->venue->venue_postcode) ?></p>

                    <?php endforeach; ?>

                </div>
                <div class="event-meta-brochure">

                    <h2 class="desc-title">event files</h2>

                    <p class="desc-component"><?= $this->Html->link(h($event->file),['action'=>'download',$event->event_id]) ?></p>
                </div>
            </div>

        </div> <!-- listing-page -->




    </div> <!-- main -->

</div> <!-- content -->

</body>
</html>