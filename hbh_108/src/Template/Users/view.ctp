
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User First Name') ?></th>
            <td><?= h($user->user_first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Last Name') ?></th>
            <td><?= h($user->user_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Street') ?></th>
            <td><?= h($user->user_street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Suburb') ?></th>
            <td><?= h($user->user_suburb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Postcode') ?></th>
            <td><?= h($user->user_postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Tags') ?></th>
            <td><?= h($user->user_tags) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= h($user->user_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Description') ?></th>
            <td><?= h($user->user_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Abn') ?></th>
            <td><?= h($user->user_abn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Business Name') ?></th>
            <td><?= h($user->user_business_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($user->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Phone') ?></th>
            <td><?= $this->Number->format($user->user_phone) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rooms') ?></h4>
        <?php if (!empty($user->rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Room Id') ?></th>
                <th scope="col"><?= __('Room Capacity') ?></th>
                <th scope="col"><?= __('Room Type') ?></th>
                <th scope="col"><?= __('Room Image') ?></th>
                <th scope="col"><?= __('Room Name') ?></th>
                <th scope="col"><?= __('Venue Id') ?></th>
                <th scope="col"><?= __('Room Requirements') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->rooms as $rooms): ?>
            <tr>
                <td><?= h($rooms->room_id) ?></td>
                <td><?= h($rooms->room_capacity) ?></td>
                <td><?= h($rooms->room_type) ?></td>
                <td><?= h($rooms->room_image) ?></td>
                <td><?= h($rooms->room_name) ?></td>
                <td><?= h($rooms->venue_id) ?></td>
                <td><?= h($rooms->room_requirements) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $rooms->room_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $rooms->room_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $rooms->room_id], ['confirm' => __('Are you sure you want to delete # {0}?', $rooms->room_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
