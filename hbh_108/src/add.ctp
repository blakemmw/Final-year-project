<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>

<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<div class="events form large-9 medium-8 columns content">

    <?= $this->Form->create($event,['enctype'=>'multipart/form-data']); ?>
    <fieldset class="add-form">
        <div class="header">
            <a href="./test"><i id="back-button" class="fas fa-chevron-left"></i></a>
            <div class="heading">Create Event</div>
        </div>

        <?php
            echo $this->Form->control('user_id', ['id' =>'user_id','class' => 'hide-me', 'type' => 'get']);
            echo $this->Form->control('event_name', ['class' => 'text-box']);
            echo $this->Form->control('event_tags', ['class' => 'text-box']);
            echo $this->Form->control('event_date');
            echo $this->Form->control('event_start_time');
            echo $this->Form->control('event_end_time');
            echo $this->Form->control('event_total_tickets', ['class' => 'text-box']);
            echo $this->Form->control('event_ticket_price', ['class' => 'text-box']);
            echo $this->Form->control('event_description', ['class' => 'text-box']);
            echo $this->Form->control('leasing_id', ['options' => $roomsUsers, 'empty' => true]);
            //echo $this->Form->file('file',['id'=>'file']);
            //echo $this->Form->file('photo',['id'=>'photo']);

        ?>
        <img src="/img/accessory.png" id="cli" style="cursor:pointer"/>

        <div style="display:none">
            <?php echo $this->Form->file('file',['id'=>'hidden']);?>
        </div>
        <img src="/img/dynamic.png" id="cll" style="cursor:pointer"/>

        <div style="display:none">
            <?php echo $this->Form->file('photo',['id'=>'hidden1']);?>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-submit'], ['id' => 'btn-submit']) ?>
    <?= $this->Html->Link(__('Upload'), array('controller' =>'files','action' =>'index'), array('class' => 'btn-submit'))?>
    <?= $this->Form->end() ?>

</div>
<script type="text/javascript">
    $("#cli").click(function () {
        $("#hidden").trigger('click');
    });
    $("#cll").click(function () {
        $("#hidden1").trigger('click');
    });

    $('.hide-me').attr('value', '<?= $this->request->getSession()->read('Auth.User.user_id'); ?>');

</script>