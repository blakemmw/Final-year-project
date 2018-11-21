<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rpayment $rpayment
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rpayment'), ['action' => 'edit', $rpayment->payment_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rpayment'), ['action' => 'delete', $rpayment->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rpayment->payment_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rpayments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rpayment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['controller' => 'RoomsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rooms User'), ['controller' => 'RoomsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rpayments view large-9 medium-8 columns content">
    <h3><?= h($rpayment->payment_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= h($rpayment->user_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rooms User') ?></th>
            <td><?= $rpayment->has('rooms_user') ? $this->Html->link($rpayment->rooms_user->leasing_id, ['controller' => 'RoomsUsers', 'action' => 'view', $rpayment->rooms_user->leasing_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Id') ?></th>
            <td><?= $this->Number->format($rpayment->payment_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Amount') ?></th>
            <td><?= $this->Number->format($rpayment->payment_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Date') ?></th>
            <td><?= h($rpayment->payment_date) ?></td>
        </tr>
    </table>
</div>
