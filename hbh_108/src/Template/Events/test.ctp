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

        <a href="./test" ><img class="logo" src="<?php echo '../img/logo.png' ?>"></a>

        <ul>
            <li id="nav-item">
                <a href="./test" ><i id="nav-icon" class="fas fa-clipboard-list"></i>listings</a></li>
            <li id="nav-item"><a href="../users/profile"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>

    </div>
    <div class="main">

        <div class="listing-header">Your upcoming events</div>

        <div class="all-listing">
            <?php foreach ($events as $e): ?>
                <div class="listing">
                    <div class ="listing-image"><?php echo $this->Html->image($e->photo);?></div>
                    <div class="day-counter"><?= h($e->event_date) ?></div>
                    <div class="listing-meta">
                        <h3 class="listing-title"><?= $this->Html->link(__(h($e->event_name) ), ['action' => 'testView', $e->event_id]) ?></h3>
                        <h3 class="listing-price">$<?= $this->Number->format($e->event_ticket_price) ?></h3>
                        <h3 class="listing-bookings"><?= $this->Number->format($e->event_tickets_sold) ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="create-listing" id="create-listing" onclick="on()"><i class="fas fa-calendar-plus"></i></div>
            <!--<a href="./add" ><div class="create-listing-snub"><i class="fas fa-calendar-plus"></i></div></a>-->

        </div>


        <div class="create-form-container" id="create-form-container">

        <h1 class="create-form-title">Create New Event</h1>

        <?= $this->Form->create($event, ['enctype'=>'multipart/form-data'],['class' => 'create-form']) ?>
        <?php
        echo $this->Form->control('user_id', ['id' =>'user_id','class' => 'hide-me', 'type' => 'get']);
        echo $this->Form->control('event_name' , ['class' => 'text-box'], ['id' => 'event-name'],  ['label' => false]);
        echo $this->Form->control('event_tags', ['class' => 'text-box'], ['id' => 'event-tags']);
        echo $this->Form->control('event_description', ['rows' => "10"], ['id' => 'event-desc']);

        //next form section

        echo $this->Form->control('event_date',  ['id' => 'event-date']);
        echo $this->Form->control('event_start_time', ['class' => 'text-box'], ['id' => 'start-time']);
        echo $this->Form->control('event_end_time', ['class' => 'text-box'], ['id' => 'end-time']);

        //next form selection

        echo $this->Form->control('event_total_tickets', ['class' => 'text-box'], ['id' => 'event_total_tickets']);
        echo $this->Form->control('event_ticket_price',  ['class' => 'text-box'], ['id' => 'event-price']);
        echo $this->Form->control('rooms._ids', ['id' => 'room-select'], array('multiple' => 'checkbox', 'label' => 'Room Details'));
        ?>
        <div class="event-file">
            <h4> Event file </h4>
            <?php echo $this->Form->file('file',['id'=>'file_upload']); ?>
        </div>
        <div class="event-image">
            <h4> Event image</h4>
            <?php echo $this->Form->file('photo',['id'=>'image_upload']);  ?>
        </div>


        <?= $this->Form->button(__('Submit'),['class' => 'btn-submit'], ['id' => 'btn-submit']) ?>

        <?= $this->Form->end() ?>

        <button class="btn-next" type="submit" id="next01">next</button>
        <button class="btn-next" type="submit" id="next02">next</button>
        <button class="btn-next" type="submit" id="next03">next</button>

    </div> <!-- create-form -->
    <div id="black-out" onclick="off()"/>

        </div>

    </div>

</div>
<script type="text/javascript">



    $('.hide-me').attr('value', '<?= $this->request->getSession()->read('Auth.User.user_id'); ?>');


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


        //show next button
        $("#next02").slideUp( 100 ).delay( 400 ).fadeIn( 500 );


    });
    //second hide / show
    $('#next02').click(function(){

        //show below
        $("#event-ticket-price").slideUp( 100 ).delay( 400 ).fadeIn( 500 );
        $("#event-total-tickets").slideUp( 100 ).delay( 400 ).fadeIn( 500 );
        $("#room-select").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

        $("#next03").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

        //hide below:
        $(".input.date.required").fadeOut(1);
        $(".input.time.required").fadeOut(1);
        $("#next02").fadeOut(1);


    });

    $('#next03').click(function(){
        //hide below:
        $("#next03").fadeOut(1);
        $("#event-ticket-price").fadeOut(1);
        $("#event-total-tickets").fadeOut(1);




        //show next
        $(".btn-submit").slideUp( 100 ).delay( 400 ).fadeIn( 500 );
        $(".event-file").slideUp( 100 ).delay( 400 ).fadeIn( 500 );
        $(".event-image").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

        $("#room-select").fadeOut(1);


    });


    $(".listing").click(function() {
        window.location = $(this).find("a").attr("href");
        return false;
    });



    //placeholder Text because cakephp sucks
    $('#event-name').attr('placeholder', 'Event name');
    $('#event-tags').attr('placeholder', 'tags');
    $('#event-desc').attr('placeholder', 'Event Description');

    $('#event-total-tickets').attr('placeholder', 'Tickets available');
    $('#event-ticket-price').attr('placeholder', 'Ticket price');







</script>
</body>
</html>