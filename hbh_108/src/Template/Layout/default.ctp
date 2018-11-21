<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<?php echo $this->Html->script('jquery-2.2.3.min'); ?>
<?php echo $this->Html->css('jquery.timepicker');?>


<?php echo $this->Html->script('jquery.datetimepicker'); ?>
<?php echo $this->Html->css('jquery.datetimepicker.min');?>



<!DOCTYPE html>
<html>
<?php $cakeDescription = 'Holistic Business Hub'; ?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
<body>
    
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
               <!--  <h1><a href=""><?= $this->fetch('title') ?></a></h1> -->
            </li>
        </ul>
        <div class="top-bar-section">
            <div class="user-action">
                <?php if($loggedIn) : ?>
                <div class="topbar-username"><?= $this->request->getSession()->read('Auth.User.username'); ?></div><div class="logout-btn"><?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></div>
                <?php else : ?>
                    <div><?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register']); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div id="loading"></div>
    <?= $this->Flash->render() ?>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>


<script>
    setTimeout(function() {
        $('#loading').fadeOut('fast');
    }, 1000);
</script>
</body>
</html>
