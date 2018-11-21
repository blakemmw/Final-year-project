<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $session->session_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $session->session_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['controller' => 'RoomsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rooms User'), ['controller' => 'RoomsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Edit Session') ?></legend>
        <?php
            echo $this->Form->control('leasing_id', ['options' => $roomsUsers, 'empty' => true]);
            echo $this->Form->control('session_name');
            echo $this->Form->control('session_date', ['empty' => true]);
            echo $this->Form->control('start_time');
            echo $this->Form->control('session_description');
            echo $this->Form->control('end_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
