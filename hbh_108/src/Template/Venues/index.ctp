
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="venues index large-9 medium-8 columns content">
    <h3><?= __('Venues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('venue_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_suburb') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_postcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('venue_room_count') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venues as $venue): ?>
            <tr>
                <td><?= $this->Number->format($venue->venue_id) ?></td>
                <td><?= h($venue->venue_street) ?></td>
                <td><?= h($venue->venue_suburb) ?></td>
                <td><?= h($venue->venue_postcode) ?></td>
                <td><?= $this->Number->format($venue->venue_room_count) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $venue->venue_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venue->venue_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venue->venue_id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->venue_id)]) ?>
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
