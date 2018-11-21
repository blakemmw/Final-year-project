<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Epayment $epayment
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Epayment'), ['action' => 'edit', $epayment->payment_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Epayment'), ['action' => 'delete', $epayment->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $epayment->payment_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Epayments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Epayment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="epayments view large-9 medium-8 columns content">
    <h3><?= h($epayment->payment_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= h($epayment->user_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking') ?></th>
            <td><?= $epayment->has('booking') ? $this->Html->link($epayment->booking->booking_id, ['controller' => 'Bookings', 'action' => 'view', $epayment->booking->booking_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Id') ?></th>
            <td><?= $this->Number->format($epayment->payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($epayment->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edate') ?></th>
            <td><?= h($epayment->edate) ?></td>
        </tr>
    </table>
</div>
