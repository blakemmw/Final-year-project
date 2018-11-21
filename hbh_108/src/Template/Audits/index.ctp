<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Audit[]|\Cake\Collection\CollectionInterface $audits
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Audit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="audits index large-9 medium-8 columns content">
    <h3><?= __('Audits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('audit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_tickets_sold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('booking_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($audits as $audit): ?>
            <tr>
                <td><?= $this->Number->format($audit->audit_id) ?></td>
                <td><?= h($audit->event_name) ?></td>
                <td><?= $audit->has('event') ? $this->Html->link($audit->event->event_id, ['controller' => 'Events', 'action' => 'view', $audit->event->event_id]) : '' ?></td>
                <td><?= h($audit->event_date) ?></td>
                <td><?= $this->Number->format($audit->event_tickets_sold) ?></td>
                <td><?= $audit->has('user') ? $this->Html->link($audit->user->user_id, ['controller' => 'Users', 'action' => 'view', $audit->user->user_id]) : '' ?></td>
                <td><?= $audit->has('booking') ? $this->Html->link($audit->booking->booking_id, ['controller' => 'Bookings', 'action' => 'view', $audit->booking->booking_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $audit->audit_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $audit->audit_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $audit->audit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $audit->audit_id)]) ?>
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
