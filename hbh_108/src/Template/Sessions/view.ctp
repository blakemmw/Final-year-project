<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->session_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->session_id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->session_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms Users'), ['controller' => 'RoomsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rooms User'), ['controller' => 'RoomsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->session_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rooms User') ?></th>
            <td><?= $session->has('rooms_user') ? $this->Html->link($session->rooms_user->leasing_id, ['controller' => 'RoomsUsers', 'action' => 'view', $session->rooms_user->leasing_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Name') ?></th>
            <td><?= h($session->session_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Description') ?></th>
            <td><?= h($session->session_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Id') ?></th>
            <td><?= $this->Number->format($session->session_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session Date') ?></th>
            <td><?= h($session->session_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($session->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($session->end_time) ?></td>
        </tr>
    </table>
</div>
