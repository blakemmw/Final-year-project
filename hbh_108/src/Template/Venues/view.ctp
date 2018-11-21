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
        <li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->venue_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->venue_id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->venue_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="venues view large-9 medium-8 columns content">
    <h3><?= h($venue->venue_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Venue Street') ?></th>
            <td><?= h($venue->venue_street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue Suburb') ?></th>
            <td><?= h($venue->venue_suburb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue Postcode') ?></th>
            <td><?= h($venue->venue_postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue Id') ?></th>
            <td><?= $this->Number->format($venue->venue_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Venue Room Count') ?></th>
            <td><?= $this->Number->format($venue->venue_room_count) ?></td>
        </tr>
    </table>
</div>
