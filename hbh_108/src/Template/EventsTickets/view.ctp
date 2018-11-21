<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventsTicket $eventsTicket
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Events Ticket'), ['action' => 'edit', $eventsTicket->ticket_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Events Ticket'), ['action' => 'delete', $eventsTicket->ticket_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventsTicket->ticket_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Events Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventsTickets view large-9 medium-8 columns content">
    <h3><?= h($eventsTicket->ticket_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $eventsTicket->has('event') ? $this->Html->link($eventsTicket->event->event_id, ['controller' => 'Events', 'action' => 'view', $eventsTicket->event->event_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ticket Id') ?></th>
            <td><?= $this->Number->format($eventsTicket->ticket_id) ?></td>
        </tr>
    </table>
</div>
