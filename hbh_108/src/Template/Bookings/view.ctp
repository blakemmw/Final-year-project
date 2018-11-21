<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->booking_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->booking_id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->booking_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookings view large-9 medium-8 columns content">
    <h3><?= h($booking->booking_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $booking->has('user') ? $this->Html->link($booking->user->user_id, ['controller' => 'Users', 'action' => 'view', $booking->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $booking->has('event') ? $this->Html->link($booking->event->event_id, ['controller' => 'Events', 'action' => 'view', $booking->event->event_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Id') ?></th>
            <td><?= $this->Number->format($booking->booking_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Cost') ?></th>
            <td><?= $this->Number->format($booking->booking_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Id') ?></th>
            <td><?= $this->Number->format($booking->payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Tickets') ?></th>
            <td><?= $this->Number->format($booking->number_of_tickets) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Date') ?></th>
            <td><?= h($booking->booking_date) ?></td>
        </tr>
    </table>
</div>
