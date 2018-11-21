<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rpayment[]|\Cake\Collection\CollectionInterface $rpayments
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rpayment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['controller' => 'RoomsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rooms User'), ['controller' => 'RoomsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rpayments index large-9 medium-8 columns content">
    <h3><?= __('Rpayments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('payment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leasing_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rpayments as $rpayment): ?>
            <tr>
                <td><?= $this->Number->format($rpayment->payment_id) ?></td>
                <td><?= h($rpayment->user_type) ?></td>
                <td><?= $this->Number->format($rpayment->payment_amount) ?></td>
                <td><?= h($rpayment->payment_date) ?></td>
                <td><?= $rpayment->has('rooms_user') ? $this->Html->link($rpayment->rooms_user->leasing_id, ['controller' => 'RoomsUsers', 'action' => 'view', $rpayment->rooms_user->leasing_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rpayment->payment_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rpayment->payment_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rpayment->payment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rpayment->payment_id)]) ?>
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
