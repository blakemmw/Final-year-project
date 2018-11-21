<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->control('username');
        echo $this->Form->control('password');
        echo $this->Form->control('user_first_name');
        echo $this->Form->control('user_last_name');
        echo $this->Form->control('user_street');
        echo $this->Form->control('user_suburb');
        echo $this->Form->control('user_postcode');
        echo $this->Form->control('user_phone');
        echo $this->Form->control('user_tags');
        echo $this->Form->control('user_type');
        echo $this->Form->control('user_description');
        echo $this->Form->control('user_abn');
        echo $this->Form->control('email');
        echo $this->Form->control('user_business_name');
        echo $this->Form->control('rooms._ids', ['options' => $rooms]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
