<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsTag[]|\Cake\Collection\CollectionInterface $eventsTags
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsTags index large-9 medium-8 columns content">
    <h3><?= __('Events Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsTags as $eventsTag): ?>
            <tr>
                <td><?= $eventsTag->has('tag') ? $this->Html->link($eventsTag->tag->tag_id, ['controller' => 'Tags', 'action' => 'view', $eventsTag->tag->tag_id]) : '' ?></td>
                <td><?= $eventsTag->has('event') ? $this->Html->link($eventsTag->event->event_id, ['controller' => 'Events', 'action' => 'view', $eventsTag->event->event_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsTag->tag_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsTag->tag_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsTag->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTag->tag_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
