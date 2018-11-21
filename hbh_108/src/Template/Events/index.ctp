<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>

<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events index large-9 medium-8 columns content">
    <h3><?= __('Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_tags') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_total_tickets') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_ticket_price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $this->Number->format($event->event_id) ?></td>
                <td><?= h($event->event_name) ?></td>
                <td><?= h($event->event_tags) ?></td>
                <td><?= h($event->event_date) ?></td>
                <td><?= h($event->event_start_time) ?></td>
                <td><?= h($event->event_end_time) ?></td>
                <td><?= $this->Number->format($event->event_total_tickets) ?></td>
                <td><?= $this->Number->format($event->event_ticket_price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $event->event_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->event_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->event_id)]) ?>
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
