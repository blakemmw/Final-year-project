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
        <a href="../test" ><img class="logo" src="<?php echo '../../img/logo.png' ?>"></a>
        <ul>
            <li id="nav-item">
                <a href="../test" ><i id="nav-icon" class="fas fa-clipboard-list"></i>listings</a></li>
            <li id="nav-item"><a href="/../users/profile"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="header">
            <a href="../test"><i id="back-button" class="fas fa-chevron-left"></i></a>
            <div class="heading"><?= h($event->event_name) ?></div>
            <div class="edit-button" onclick="on()"><a href="#">edit...</a></div>
            <div class="delete-button"><a href="#"><?= $this->Form->postLink(__('delete'),
                        ['action' => 'delete', $event->event_id],
                        ['confirm' => __('Are you sure you want to delete event: ' .' '. h($event->event_name)."?")])
                        ?></a></div>
        </div>

        <div class="listing-page">
            <div class="event-meta">
                <div class="top-details">
                    <div class="event-title"><?= h($event->event_name) ?></div>
                    <div class="event-date"><?= h($event->event_date) ?></div>
                </div>
                </br>
                <div class="meta-rows">
                    <div class="meta-row">
                        <h3 id="tickets-purchased-title" class="meta-title">Purchased Tickets</h3>
                        <h2 id="tickets-purchased" class="meta-number"><?= $this->Number->format($event->event_tickets_sold) ?></h2>
                    </div>
                    <div class="meta-row">
                        <h3 id="tickets-available-title" class="meta-title">Total Tickets</h3>
                        <h2 id="tickets-available" class="meta-number"><?= $this->Number->format($event->event_total_tickets) ?></h2>
                    </div>
                    <div class="meta-row">
                        <h3 id="tickets-revenue-title" class="meta-title">Ticket Price</h3>
                        <h2 id="tickets-revenue" class="meta-number">$<?= $this->Number->format($event->event_ticket_price) ?>.00</h2>
                    </div>
                </div>
            </div>



            <div class="listing-image">
                <?php echo $this->Html->image($event->photo); ?>
            </div>
            <div class="desc-area">

                <div class="event-desc-main">
                    <h2 class="desc-title">Description</h2>
                    <p class="event-desc"><?= h($event->event_description) ?></p>

                    <h2 class="desc-title">Tags</h2>
                    <h3 class="events-tags"><?= h($event->event_tags) ?></h3>
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

                    <p class="desc-component"><?= $this->Html->link(h($event->file_name),['action'=>'download',$event->event_id]) ?></p>
                </div>
            </div>

        </div> <!-- listing-page -->


        <div class="create-form-container" id="create-form-container">

            <h1 class="create-form-title">Edit: <?= h($event->event_name) ?></h1>

            <?= $this->Form->create($event, ['class' => 'create-form']) ?>
                <?php
                echo $this->Form->control('event_name' , ['class' => 'text-box'], ['id' => 'event-name'], ['placeholder' => 'Event Name']);
                echo $this->Form->control('event_tags', ['class' => 'text-box'], ['id' => 'event-tags'], ['placeholder' => 'Event Tags']);
                echo $this->Form->control('event_description', ['rows' => "10"], ['id' => 'event-description']);
                echo $this->Form->file('file',['id'=>'file']);

                //next form section

                echo $this->Form->control('event_date',  ['id' => 'event-date']);
                echo $this->Form->control('event_start_time', ['class' => 'text-box'], ['id' => 'start-time']);
                echo $this->Form->control('event_end_time', ['class' => 'text-box'], ['id' => 'end-time']);

                echo $this->Form->control('event_total_tickets', ['class' => 'text-box'], ['id' => 'event-ticket-no']);
                echo $this->Form->control('event_ticket_price',  ['class' => 'text-box'], ['id' => 'event-price']);

                echo $this->Form->control('event_image', ['type' => 'file'],['class' => 'event-image'],['id' => 'event-image']);

                ?>

            <?= $this->Form->button(__('Submit'),['class' => 'btn-submit'], ['id' => 'btn-submit']) ?>

            <?= $this->Form->end() ?>

            <button class="btn-next" type="submit" id="next01">next</button>
            <button class="btn-next" type="submit" id="next02">next</button>
            <button class="btn-next" type="submit" id="next03">next</button>

        </div> <!-- create-form -->
        <div id="black-out" onclick="off()"/>


    </div> <!-- main -->

</div> <!-- content -->


<script type="text/javascript">

    function on() {
        document.getElementById("black-out").style.display = "block";
    }

    function off() {
        document.getElementById("black-out").style.display = "none";
        $("#create-form-container").slideToggle({
            direction: "up"
        }, 300);
    }


    $("#create-listing").click(function(){
        $("#create-form-container").slideToggle({
            direction: "up"
        }, 300);
    });

    //first hide / show
    $('#next01').click(function(){

        //show
        $(".input.date.required").slideUp( 100 ).delay( 400 ).fadeIn( 500 );
        $(".input.time.required").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

        //$("#event-location").toggle({"bottom": "-100"},1);
        //$("#room-name").toggle({"bottom": "-100"},1);


        //hide below:
        $("#event-name").fadeOut(1);
        $("#event-tags").fadeOut(1);
        $("#event-description").fadeOut(1);
        $("#next01").fadeOut(1);
        $("#file").fadeOut(1);

        //show next button
        $("#next02").slideUp( 100 ).delay( 400 ).fadeIn( 500 );


    });
    //second hide / show
    $('#next02').click(function(){

        //show below
        $("#event-ticket-price").slideUp( 100 ).delay( 400 ).fadeIn( 500 );
        $("#event-total-tickets").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

        //hide below:
        $(".input.date.required").fadeOut(1);
        $(".input.time.required").fadeOut(1);
        $("#next02").fadeOut(1);
        $("#file").fadeOut(1);

        //show next
        $("#next03").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

    });

    $('#next03').click(function(){
        //hide below:
        $("#next03").toggle(1);
        $("#event-ticket-price").fadeOut(1);
        $("#event-total-tickets").fadeOut(1);;
        $("#event-image").fadeOut(1);
        $("#file").fadeOut(1);



        //show next
        $(".btn-submit").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

    });




    $(".edit-button").click(function(){
        $("#create-form-container").slideToggle({
            direction: "up"
        }, 300);
    });







</script>

</body>
</html>