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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $epayment->payment_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $epayment->payment_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Epayments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="epayments form large-9 medium-8 columns content">
    <?= $this->Form->create($epayment) ?>
    <fieldset>
        <legend><?= __('Edit Epayment') ?></legend>
        <?php
            echo $this->Form->control('edate', ['empty' => true]);
            echo $this->Form->control('user_type');
            echo $this->Form->control('amount');
            echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
