<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->room_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->room_id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->room_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->room_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Room Type') ?></th>
            <td><?= h($room->room_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Name') ?></th>
            <td><?= h($room->room_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue') ?></th>
            <td><?= $room->has('venue') ? $this->Html->link($room->venue->venue_id, ['controller' => 'Venues', 'action' => 'view', $room->venue->venue_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Requirements') ?></th>
            <td><?= h($room->room_requirements) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Id') ?></th>
            <td><?= $this->Number->format($room->room_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Capacity') ?></th>
            <td><?= $this->Number->format($room->room_capacity) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($room->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Event Name') ?></th>
                <th scope="col"><?= __('Event Tags') ?></th>
                <th scope="col"><?= __('Event Image') ?></th>
                <th scope="col"><?= __('Event Date') ?></th>
                <th scope="col"><?= __('Event Start Time') ?></th>
                <th scope="col"><?= __('Event End Time') ?></th>
                <th scope="col"><?= __('Event Total Tickets') ?></th>
                <th scope="col"><?= __('Event Ticket Price') ?></th>
                <th scope="col"><?= __('Event Description') ?></th>
                <th scope="col"><?= __('Event File') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->events as $events): ?>
            <tr>
                <td><?= h($events->event_id) ?></td>
                <td><?= h($events->event_name) ?></td>
                <td><?= h($events->event_tags) ?></td>
                <td><?= h($events->event_image) ?></td>
                <td><?= h($events->event_date) ?></td>
                <td><?= h($events->event_start_time) ?></td>
                <td><?= h($events->event_end_time) ?></td>
                <td><?= h($events->event_total_tickets) ?></td>
                <td><?= h($events->event_ticket_price) ?></td>
                <td><?= h($events->event_description) ?></td>
                <td><?= h($events->event_file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->event_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->event_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->event_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($room->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('User Password') ?></th>
                <th scope="col"><?= __('User First Name') ?></th>
                <th scope="col"><?= __('User Last Name') ?></th>
                <th scope="col"><?= __('User Street') ?></th>
                <th scope="col"><?= __('User Suburb') ?></th>
                <th scope="col"><?= __('User Postcode') ?></th>
                <th scope="col"><?= __('User Phone') ?></th>
                <th scope="col"><?= __('User Tags') ?></th>
                <th scope="col"><?= __('User Image') ?></th>
                <th scope="col"><?= __('User Type') ?></th>
                <th scope="col"><?= __('User Description') ?></th>
                <th scope="col"><?= __('User Abn') ?></th>
                <th scope="col"><?= __('User Email') ?></th>
                <th scope="col"><?= __('User Business Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->users as $users): ?>
            <tr>
                <td><?= h($users->user_id) ?></td>
                <td><?= h($users->user_name) ?></td>
                <td><?= h($users->user_password) ?></td>
                <td><?= h($users->user_first_name) ?></td>
                <td><?= h($users->user_last_name) ?></td>
                <td><?= h($users->user_street) ?></td>
                <td><?= h($users->user_suburb) ?></td>
                <td><?= h($users->user_postcode) ?></td>
                <td><?= h($users->user_phone) ?></td>
                <td><?= h($users->user_tags) ?></td>
                <td><?= h($users->user_image) ?></td>
                <td><?= h($users->user_type) ?></td>
                <td><?= h($users->user_description) ?></td>
                <td><?= h($users->user_abn) ?></td>
                <td><?= h($users->user_email) ?></td>
                <td><?= h($users->user_business_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
