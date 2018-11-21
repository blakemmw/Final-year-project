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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventsRoom->event_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventsRoom->event_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Events Rooms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsRooms form large-9 medium-8 columns content">
    <?= $this->Form->create($eventsRoom) ?>
    <fieldset>
        <legend><?= __('Edit Events Room') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
