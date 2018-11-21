<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsRoom $eventsRoom
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Room'), ['action' => 'edit', $eventsRoom->event_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Room'), ['action' => 'delete', $eventsRoom->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRoom->event_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsRooms view large-9 medium-8 columns content">
    <h3><?= h($eventsRoom->event_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventsRoom->has('event') ? $this->Html->link($eventsRoom->event->event_id, ['controller' => 'Events', 'action' => 'view', $eventsRoom->event->event_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room') ?></th>
            <td><?= $eventsRoom->has('room') ? $this->Html->link($eventsRoom->room->room_id, ['controller' => 'Rooms', 'action' => 'view', $eventsRoom->room->room_id]) : '' ?></td>
        </tr>
    </table>
</div>
