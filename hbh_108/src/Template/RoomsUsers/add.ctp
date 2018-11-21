<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoomsUser $roomsUser
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


 <script src="/js/jquery-timepicker/jquery.timepicker.js"></script>
<script src="/js/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>
<script src="/js/jquery.datetimepicker.js"></script>
 <script src="/plugins/jQueryUI/jquery-ui.js"></script>


<nav class="large-3 medium-4 columns" id="actions-sidebar">

    <ul class="side-nav">



        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roomsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($roomsUser) ?>
    <fieldset>
        <legend><?= __('Add Rooms User') ?></legend>
        <?php
            echo $this->Form->control('room_id', ['options' => $rooms]);
            echo $this->Form->control('user_id', ['id' =>'user_id','class' => '', 'type' => 'get']);
            echo $this->Form->control('tv');
            echo $this->Form->control('theatre');
            echo $this->Form->control('class_room');
            echo $this->Form->control('board_room');
            echo $this->Form->control('yoga');
            echo $this->Form->control('standing');
            echo $this->Form->control('projector');
            echo $this->Form->control('white_board');
            echo $this->Form->control('video_camera');
            echo $this->Form->control('micro_phone');
            echo $this->Form->control('music_player');
        ?>
    </fieldset>

        <fieldset>



                <legend><?= __('Add  Sessions1') ?><button class="AddSession">add</button></legend>
                <?php
                    echo $this->Form->control('sessions.0.session_name');
                    echo $this->Form->control('sessions.0.session_date',['id' =>'datetimepicker', 'type' => 'text']);
                    echo $this->Form->control('sessions.0.start_time',['id' =>'datetimepicker2', 'type' => 'text']);
                    echo $this->Form->control('sessions.0.end_time',['id' =>'datetimepicker3', 'type' => 'text'] );
                ?>


        </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $('#starttime').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i'
    });
        $('#endtime').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i'
    });

    $('.hide-me').attr('value', '<?= $this->request->getSession()->read('Auth.User.user_id'); ?>');



</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datetimepicker').datetimepicker({
            format:'Y-m-d',
            timepicker: false,
            minDate: 0,
            allowTimes:[ '09:00', '10:00',
                '11:00', '12:00', '13:00',
                '14:00', '15:00', '16:00', '17:00','18:00', '19:00', '20:00',
                '21:00', '22:00'
            ]
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datetimepicker2').datetimepicker({
            format:'H:i',
            datepicker: false,
            minDate: 0,
            allowTimes:[ '09:00', '10:00',
                '11:00', '12:00', '13:00',
                '14:00', '15:00', '16:00', '17:00','18:00', '19:00', '20:00',
                '21:00', '22:00'
            ]

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datetimepicker3').datetimepicker({
            format:'H:i',
            datepicker: false,
            minDate : 0,
            allowTimes:[ '09:00', '10:00',
                '11:00', '12:00', '13:00',
                '14:00', '15:00', '16:00', '17:00','18:00', '19:00', '20:00',
                '21:00', '22:00'
            ]


            }
        );
    });
</script>