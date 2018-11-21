<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TagsUser $tagsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tags User'), ['action' => 'edit', $tagsUser->tag_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tags User'), ['action' => 'delete', $tagsUser->tag_id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagsUser->tag_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tags User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tagsUsers view large-9 medium-8 columns content">
    <h3><?= h($tagsUser->tag_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $tagsUser->has('tag') ? $this->Html->link($tagsUser->tag->tag_id, ['controller' => 'Tags', 'action' => 'view', $tagsUser->tag->tag_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $tagsUser->has('user') ? $this->Html->link($tagsUser->user->user_id, ['controller' => 'Users', 'action' => 'view', $tagsUser->user->user_id]) : '' ?></td>
        </tr>
    </table>
</div>
