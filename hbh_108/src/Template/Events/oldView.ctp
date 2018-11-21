<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->event_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->event_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->event_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event Name') ?></th>
            <td><?= h($event->event_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Tags') ?></th>
            <td><?= h($event->event_tags) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Description') ?></th>
            <td><?= h($event->event_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Id') ?></th>
            <td><?= $this->Number->format($event->event_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Total Tickets') ?></th>
            <td><?= $this->Number->format($event->event_total_tickets) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Ticket Price') ?></th>
            <td><?= $this->Number->format($event->event_ticket_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Date') ?></th>
            <td><?= h($event->event_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Start Time') ?></th>
            <td><?= h($event->event_start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event End Time') ?></th>
            <td><?= h($event->event_end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Host ID') ?></th>
            <td><?= h($event->user_id)?></td>
        </tr>


    </table>
    <div class="related">
        <h4><?= __('Related Rooms') ?></h4>
        <?php if (!empty($event->rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Room Id') ?></th>
                <th scope="col"><?= __('Room Capacity') ?></th>
                <th scope="col"><?= __('Room Type') ?></th>
                <th scope="col"><?= __('Room Image') ?></th>
                <th scope="col"><?= __('Room Name') ?></th>
                <th scope="col"><?= __('Venue Id') ?></th>
                <th scope="col"><?= __('Room Requirements') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->rooms as $rooms): ?>
            <tr>
                <td><?= h($rooms->room_id) ?></td>
                <td><?= h($rooms->room_capacity) ?></td>
                <td><?= h($rooms->room_type) ?></td>
                <td><?= h($rooms->room_image) ?></td>
                <td><?= h($rooms->room_name) ?></td>
                <td><?= h($rooms->venue_id) ?></td>
                <td><?= h($rooms->room_requirements) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $rooms->room_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $rooms->room_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $rooms->room_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rooms->room_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($event->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('Tag Name') ?></th>
                <th scope="col"><?= __('Tag Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->tags as $tags): ?>
            <tr>
                <td><?= h($tags->tag_id) ?></td>
                <td><?= h($tags->tag_name) ?></td>
                <td><?= h($tags->tag_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->tag_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->tag_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->tag_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
