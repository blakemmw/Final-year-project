<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoomsUser[]|\Cake\Collection\CollectionInterface $roomsUsers
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rooms User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="roomsUsers index large-9 medium-8 columns content">
    <h3><?= __('Rooms Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('leasing_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tv') ?></th>
                <th scope="col"><?= $this->Paginator->sort('theatre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_room') ?></th>
                <th scope="col"><?= $this->Paginator->sort('board_room') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yoga') ?></th>
                <th scope="col"><?= $this->Paginator->sort('standing') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projector') ?></th>
                <th scope="col"><?= $this->Paginator->sort('white_board') ?></th>
                <th scope="col"><?= $this->Paginator->sort('video_camera') ?></th>
                <th scope="col"><?= $this->Paginator->sort('micro_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('music_player') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roomsUsers as $roomsUser): ?>
            <tr>
                <td><?= $this->Number->format($roomsUser->leasing_id) ?></td>
                <td><?= $roomsUser->has('room') ? $this->Html->link($roomsUser->room->room_id, ['controller' => 'Rooms', 'action' => 'view', $roomsUser->room->room_id]) : '' ?></td>
                <td><?= $roomsUser->has('user') ? $this->Html->link($roomsUser->user->user_id, ['controller' => 'Users', 'action' => 'view', $roomsUser->user->user_id]) : '' ?></td>
                <td><?= h($roomsUser->tv) ?></td>
                <td><?= h($roomsUser->theatre) ?></td>
                <td><?= h($roomsUser->class_room) ?></td>
                <td><?= h($roomsUser->board_room) ?></td>
                <td><?= h($roomsUser->yoga) ?></td>
                <td><?= h($roomsUser->standing) ?></td>
                <td><?= h($roomsUser->projector) ?></td>
                <td><?= h($roomsUser->white_board) ?></td>
                <td><?= h($roomsUser->video_camera) ?></td>
                <td><?= h($roomsUser->micro_phone) ?></td>
                <td><?= h($roomsUser->music_player) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $roomsUser->leasing_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $roomsUser->leasing_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $roomsUser->leasing_id], ['confirm' => __('Are you sure you want to delete # {0}?', $roomsUser->leasing_id)]) ?>
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
