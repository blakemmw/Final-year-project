<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<title></title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<?= $this->Html->css('hbh_style.css') ?>

</head>
<body>

<div class="content">
    <div class="navagation">
        <a href="./../events/mydashboard" ><img class="logo" src="<?php echo './../img/logo.png' ?>"></a>
        <ul>
            <li id="nav-item">
                <a href="./../events/mydashboard"" ><i id="nav-icon" class="fas fa-clipboard-list"></i>listings</a></li>
            <li id="nav-item"><a href="../users/host"><i id="nav-icon" class="fas fa-user-alt"></i>profile</a></li>
            <li id="nav-item"><a href="#"><i id="nav-icon" class="fas fa-cog"></i>settings</a></li>
        </ul>
    </div>
<div class="create-form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
         <?php echo $this->Form->control('email',['class' => 'text-box']);?>
         <?php   echo $this->Form->control('username',['class' => 'text-box']); ?>
         <?php  echo $this->Form->control('password',['class' => 'text-box']);?>
        <?php echo $this->Form->control('user_tags',['class' => 'text-box']);?>
        <?php echo $this->Form->control('tags._ids', ['id' =>'tags-selects'],['options' => $tags]); ?>
		<br>
		<br>
		<br>
		<br>
		<br>

         <?php echo $this->Form->control('user_first_name',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_last_name',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_street',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_suburb',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_postcode',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_phone',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_description',['class' => 'text-box']);?>
            <?php echo $this->Form->control('user_abn',['class' => 'text-box']);?>
         <?php echo $this->Form->control('user_business_name',['class' => 'text-box']);?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn-next']) ?>
    <?= $this->Form->end() ?>
</div>
