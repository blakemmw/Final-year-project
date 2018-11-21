<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->tag_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->tag_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->tag_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tag Name') ?></th>
            <td><?= h($tag->tag_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Description') ?></th>
            <td><?= h($tag->tag_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag Id') ?></th>
            <td><?= $this->Number->format($tag->tag_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($tag->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Event Id') ?></th>
                <th scope="col"><?= __('Event Name') ?></th>
                <th scope="col"><?= __('Event Tags') ?></th>
                <th scope="col"><?= __('Event Image') ?></th>
                <th scope="col"><?= __('Event Date') ?></th>
                <th scope="col"><?= __('Event Start Time') ?></th>
                <th scope="col"><?= __('Event End Time') ?></th>
                <th scope="col"><?= __('Event Total Tickets') ?></th>
                <th scope="col"><?= __('Event Ticket Price') ?></th>
                <th scope="col"><?= __('Event Description') ?></th>
                <th scope="col"><?= __('Event File') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->events as $events): ?>
            <tr>
                <td><?= h($events->event_id) ?></td>
                <td><?= h($events->event_name) ?></td>
                <td><?= h($events->event_tags) ?></td>
                <td><?= h($events->event_image) ?></td>
                <td><?= h($events->event_date) ?></td>
                <td><?= h($events->event_start_time) ?></td>
                <td><?= h($events->event_end_time) ?></td>
                <td><?= h($events->event_total_tickets) ?></td>
                <td><?= h($events->event_ticket_price) ?></td>
                <td><?= h($events->event_description) ?></td>
                <td><?= h($events->event_file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->event_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->event_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->event_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
