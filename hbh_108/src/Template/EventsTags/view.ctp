<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsTag $eventsTag
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Tag'), ['action' => 'edit', $eventsTag->tag_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Tag'), ['action' => 'delete', $eventsTag->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTag->tag_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsTags view large-9 medium-8 columns content">
    <h3><?= h($eventsTag->tag_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $eventsTag->has('tag') ? $this->Html->link($eventsTag->tag->tag_id, ['controller' => 'Tags', 'action' => 'view', $eventsTag->tag->tag_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventsTag->has('event') ? $this->Html->link($eventsTag->event->event_id, ['controller' => 'Events', 'action' => 'view', $eventsTag->event->event_id]) : '' ?></td>
        </tr>
    </table>
</div>
