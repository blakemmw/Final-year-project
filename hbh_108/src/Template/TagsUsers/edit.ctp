<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TagsUser $tagsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tagsUser->tag_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tagsUser->tag_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tags Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tagsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($tagsUser) ?>
    <fieldset>
        <legend><?= __('Edit Tags User') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
