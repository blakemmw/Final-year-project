<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsTicket[]|\Cake\Collection\CollectionInterface $eventsTickets
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Events Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventsTickets index large-9 medium-8 columns content">
    <h3><?= __('Events Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventsTickets as $eventsTicket): ?>
            <tr>
                <td><?= $eventsTicket->has('event') ? $this->Html->link($eventsTicket->event->event_id, ['controller' => 'Events', 'action' => 'view', $eventsTicket->event->event_id]) : '' ?></td>
                <td><?= $this->Number->format($eventsTicket->ticket_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventsTicket->ticket_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventsTicket->ticket_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventsTicket->ticket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTicket->ticket_id)]) ?>
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
