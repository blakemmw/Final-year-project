	<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoomsUser $roomsUser
 */
?>
<?= $this->Html->css('hbh_style.css') ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="../js/jquery-timepicker/jquery.timepicker.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <?= $this->Html->css('hbh_style.css') ?>
</head>
<body>
<div class="content">
    <div class="navagation">

        <a href="../events/mydashboard" ><img class="logo" src="<?php echo '../img/logo.png' ?>"></a>

        <ul>
            <li id="nav-item">
                <a href="../events/mydashboard" ><i id="nav-icon" class="fas fa-clipboard-list"></i>events</a></li>
            <li id="nav-item"><a href="../users/host"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>

    </div>
    <div class="main">

        <div class="create-form">

            <div class="listing-header">Create booking</div>
            <?= $this->Form->create($roomsUser) ?>
            <?php
            echo $this->Form->control('room_id', ['options' => $rooms]);
            echo $this->Form->control('user_id', ['id' =>'user_id','class' => 'hide-me', 'type' => 'get']);
            ?>
            <div class="requirements"><br><br>
                <?php
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
            </div>


            <h3><?= __('Add  Sessions 1') ?></h3>
            <?php
            echo $this->Form->control('sessions.0.session_name', ['class' => 'text-box']);
            echo $this->Form->control('sessions.0.session_date', ['class' => 'text-box']);
            echo $this->Form->control('sessions.0.start_time',['id' =>'starttime', 'type' => 'get'], ['class' => 'text-box']);
            echo $this->Form->control('sessions.0.end_time',['id' =>'endtime', 'type' => 'get'], ['class' => 'text-box'] );
            ?>

            <?= $this->Form->button(__('Submit'),['class' => 'btn-next']) ?>
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




    </div>

</div>

</div>

</body>
</html>