<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoomsUser $roomsUser
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $roomsUser->leasing_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $roomsUser->leasing_id)]
            )
        ?></li>
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
        <legend><?= __('Edit Rooms User') ?></legend>
        <?php
            echo $this->Form->control('room_id', ['options' => $rooms]);
            echo $this->Form->control('user_id', ['options' => $users]);
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
        <legend><?= __('Edit Sessions1') ?></legend>
        <?php
        echo $this->Form->control('sessions.0.session_name');
        echo $this->Form->control('sessions.0.session_date');
        echo $this->Form->control('sessions.0.start_time');
        echo $this->Form->input('sessions.0.end_time' );
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
