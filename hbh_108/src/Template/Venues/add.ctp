
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="venues form large-9 medium-8 columns content">
    <?= $this->Form->create($venue) ?>
    <fieldset>
        <legend><?= __('Add Venue') ?></legend>
        <?php
            echo $this->Form->control('venue_street');
            echo $this->Form->control('venue_suburb');
            echo $this->Form->control('venue_postcode');
            echo $this->Form->control('venue_room_count');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
