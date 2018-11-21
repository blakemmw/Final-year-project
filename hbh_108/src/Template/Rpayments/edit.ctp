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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rpayment->payment_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rpayment->payment_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rpayments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['controller' => 'RoomsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rooms User'), ['controller' => 'RoomsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rpayments form large-9 medium-8 columns content">
    <?= $this->Form->create($rpayment) ?>
    <fieldset>
        <legend><?= __('Edit Rpayment') ?></legend>
        <?php
            echo $this->Form->control('user_type');
            echo $this->Form->control('payment_amount');
            echo $this->Form->control('payment_date');
            echo $this->Form->control('leasing_id', ['options' => $roomsUsers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
