<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit $audit
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Audit'), ['action' => 'edit', $audit->audit_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Audit'), ['action' => 'delete', $audit->audit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $audit->audit_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Audits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Audit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="audits view large-9 medium-8 columns content">
    <h3><?= h($audit->audit_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event Name') ?></th>
            <td><?= h($audit->event_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $audit->has('event') ? $this->Html->link($audit->event->event_id, ['controller' => 'Events', 'action' => 'view', $audit->event->event_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $audit->has('user') ? $this->Html->link($audit->user->user_id, ['controller' => 'Users', 'action' => 'view', $audit->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking') ?></th>
            <td><?= $audit->has('booking') ? $this->Html->link($audit->booking->booking_id, ['controller' => 'Bookings', 'action' => 'view', $audit->booking->booking_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Audit Id') ?></th>
            <td><?= $this->Number->format($audit->audit_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Tickets Sold') ?></th>
            <td><?= $this->Number->format($audit->event_tickets_sold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event Date') ?></th>
            <td><?= h($audit->event_date) ?></td>
        </tr>
    </table>
</div>
