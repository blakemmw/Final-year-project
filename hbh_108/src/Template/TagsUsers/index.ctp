<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TagsUser[]|\Cake\Collection\CollectionInterface $tagsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tags User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tagsUsers index large-9 medium-8 columns content">
    <h3><?= __('Tags Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tagsUsers as $tagsUser): ?>
            <tr>
                <td><?= $tagsUser->has('tag') ? $this->Html->link($tagsUser->tag->tag_id, ['controller' => 'Tags', 'action' => 'view', $tagsUser->tag->tag_id]) : '' ?></td>
                <td><?= $tagsUser->has('user') ? $this->Html->link($tagsUser->user->user_id, ['controller' => 'Users', 'action' => 'view', $tagsUser->user->user_id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tagsUser->tag_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tagsUser->tag_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tagsUser->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagsUser->tag_id)]) ?>
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
