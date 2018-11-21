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
        <li><?= $this->Html->link(__('Edit Rooms User'), ['action' => 'edit', $roomsUser->leasing_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rooms User'), ['action' => 'delete', $roomsUser->leasing_id], ['confirm' => __('Are you sure you want to delete # {0}?', $roomsUser->leasing_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rooms User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roomsUsers view large-9 medium-8 columns content">
    <h3><?= h($roomsUser->leasing_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Room') ?></th>
            <td><?= $roomsUser->has('room') ? $this->Html->link($roomsUser->room->room_id, ['controller' => 'Rooms', 'action' => 'view', $roomsUser->room->room_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $roomsUser->has('user') ? $this->Html->link($roomsUser->user->user_id, ['controller' => 'Users', 'action' => 'view', $roomsUser->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leasing Id') ?></th>
            <td><?= $this->Number->format($roomsUser->leasing_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tv') ?></th>
            <td><?= $roomsUser->tv ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Theatre') ?></th>
            <td><?= $roomsUser->theatre ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Room') ?></th>
            <td><?= $roomsUser->class_room ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Board Room') ?></th>
            <td><?= $roomsUser->board_room ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yoga') ?></th>
            <td><?= $roomsUser->yoga ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Standing') ?></th>
            <td><?= $roomsUser->standing ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projector') ?></th>
            <td><?= $roomsUser->projector ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('White Board') ?></th>
            <td><?= $roomsUser->white_board ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Video Camera') ?></th>
            <td><?= $roomsUser->video_camera ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Micro Phone') ?></th>
            <td><?= $roomsUser->micro_phone ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Music Player') ?></th>
            <td><?= $roomsUser->music_player ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
