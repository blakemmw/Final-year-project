<!-- File: src/Template/Users/login.ctp -->

<?= $this->Html->css('hbh_login.css') ?>


<div class="signup_main">
    <div class="signup_content">

        <img class="logo" src="<?php echo './../img/logo.png' ?>">

        <h2 class="subtitle"> Welcome to</h2>
        <h1 class="title">Holistic Business Hub</h1>
         <h2 class="subtitle">Find local events near you.</h2>

        <div class="sign_in" id="sign_in">
            <?= $this->Form->create(); ?>
            <h4 class="label">Email</h4>
            <?= $this->Form->input('email'); ?>
            <h4 class="label">Password</h4>
            <?= $this->Form->input('password', array('type' => 'password')); ?>
            <a href="/"><h4 class="forgot">Forgotten password?</h4></a>
            <?= $this->Form->submit('Login', array('class' => 'submit_btn')); ?>
            <?= $this->Form->end(); ?>
        </div>

        <div class="swap_dont" id="swap_dont"><h4>Dont have an account? </h4><a href="./register"> <h4 class="swap_dont_btn" id="swap_dont_btn"> Sign
                    up</h4></a></div>

    </div>
    <div class="signup_quote">
        <div class="quote"></div>
    </div>

</div>


<script src="https://unpkg.com/popmotion/dist/popmotion.global.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>


    $('#next_btn01').click(function(){
        //hide
        $("#sign_up01").fadeOut(1);
        $("#next_btn01").fadeOut(1);

        //show

        $("#next_btn02").slideUp( 100 ).delay( 500 ).fadeIn( 500 );
        $("#sign_up02").slideUp( 100 ).delay( 400 ).fadeIn( 500 );

    });

    $('#next_btn02').on("click", function(){
        $.ajax({
            method: "POST",
            url: "/createAccount",
            data: $('#sign_up').serialize(),
            success: function(){
                console.log("success in creating user from ajax")
            }
        })
    });

    $('#submit_btn').on("click", function(){
        $.ajax({
            method: "POST",
            url: "/login",
            data: $('#sign_in').serialize(),
            success: function(){
                console.log("User successfully logged in.")
            },
            error: function(err){

            }
        })
    });


</script>