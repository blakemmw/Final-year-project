<?= $this->Html->css('hbh_login.css') ?>


<div class="signup_main">
    <div class="signup_content">

        <img class="logo" src="<?php echo './../img/logo.png' ?>">

        <h2 class="subtitle"> Welcome to</h2>
        <h1 class="title">Holistic Business Hub</h1>
        <h2 class="subtitle">Find local events near you.</h2>
        <div class="sign_up" id="sign_up">
            <?= $this->Form->create($user); ?>

           

            <div class="sign_up01" id="sign_up01">

                <h4 class="label">Username</h4>
                <?= $this->Form->input('username'); ?>

                <h4 class="label">Email</h4>
                <?= $this->Form->input('email'); ?>

                <h4 class="label">Password</h4>
                <?= $this->Form->input('password', array('type' => 'password')); ?>

            </div>

            <div class="sign_up02" id="sign_up02">
                <input type="button" value="Back" class="back_btn02" id="back_btn02">

                <div class="name-section">
                    <div class="name-section-name">
                        <h4 class="label">Name</h4>
                        <?= $this->Form->input('user_first_name'); ?>
                    </div>
                    <div class="name-section-surname">
                        <h4 class="label">Surname</h4>
                        <?= $this->Form->input('user_last_name'); ?>
                    </div>
                </div>
                <div class="name-section">
                    <div class="name-section-name">
                        <h4 class="label">Street</h4>
                        <?= $this->Form->input('user_street'); ?>
                    </div>
                    <div class="name-section-name">
                        <h4 class="label">Suburb</h4>
                        <?= $this->Form->input('user_suburb'); ?>
                    </div>
                </div>
            </div>
            <div class="sign_up03" id="sign_up03">
                <input type="button" value="Back" class="back_btn03" id="back_btn03">

                <h4 class="label">mobile</h4>
                <?= $this->Form->input('user_phone'); ?>
                <h4 class="label">business name</h4>
                <?= $this->Form->input('user_business_name'); ?>
                <h4 class="label">ABN</h4>
                <?= $this->Form->input('user_abn'); ?>
            </div>

            <div class="sign_up04" id="sign_up04">
                <input type="button" value="Back" class="back_btn04" id="back_btn04">

                <h4 class="label">What type of user are you?</h4>
                <p class="i-want">I want to: </p>

			 <div class="usertype" id="usertype">
                <?= $this->Form->input('user_type', array('type' => 'select', 'options' => ['Attend events', 'Host events'])); ?>
            </div>
			 <h4 class="label">What are you interested in?</h4>

                <?php echo $this->Form->control('tags._ids',['id' => 'tags-select'], ['options' => $tags]);?>
            </div>



        </div>

        <input type="button" value="Next" class="next_btn01" id="next_btn01">
        <input type="button" value="Next" class="next_btn02" id="next_btn02">
        <input type="button" value="Next" class="next_btn03" id="next_btn03">


        <?= $this->Form->submit('Register', array('class' => 'next_btn02', 'id' => 'submit-btn')); ?>
        <?= $this->Form->end(); ?>

        <div class="swap_dont" id="swap_dont"><h4>Have an account? </h4><a href="./login"> <h4 class="swap_dont_btn" id="swap_dont_btn"> Sign
                in</h4></a></div>

    </div>

    <div class="signup_quote">
        <div class="quote"></div>
    </div>
</div>
</div>


<script src="https://unpkg.com/popmotion/dist/popmotion.global.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>


<script>

    $('#swap_do_btn').click(function () {
        //hide
        $("#sign_up01").fadeOut(1);
        $("#sign_up").fadeOut(1);

        $("#swap_do").fadeOut(1);

        //show
        $("#sign_in").slideUp(100).delay(400).fadeIn(500);
        $("#swap_dont").slideUp(100).delay(400).fadeIn(500);
    });




    $('#next_btn01').click(function () {
        //hide
        $("#sign_up01").fadeOut(1);
        $("#next_btn01").fadeOut(1);

        //show

        $("#next_btn02").slideUp(100).delay(500).fadeIn(500);
        $("#sign_up02").slideUp(100).delay(400).fadeIn(500);
        $("#back_btn02").slideUp(100).delay(400).fadeIn(500);



    });

    $('#back_btn02').click(function () {

        //hide

        $("#next_btn02").fadeOut(1);
        $("#sign_up02").fadeOut(1);
        $("#back_btn02").fadeOut(1);

        //show

        $("#sign_up01").slideUp(100).delay(500).fadeIn(500);
        $("#next_btn01").slideUp(100).delay(500).fadeIn(500);

    });

    $('#next_btn02').on("click", function () {

        //hide
        $("#sign_up02").fadeOut(1);
        $("#next_btn02").fadeOut(1);

        //show

        $("#next_btn03").slideUp(100).delay(500).fadeIn(500);
        $("#sign_up03").slideUp(100).delay(400).fadeIn(500);
        $("#back_btn03").slideUp(100).delay(400).fadeIn(500);



    });

    $('#back_btn03').click(function () {

        //hide

        $("#next_btn03").fadeOut(1);
        $("#sign_up03").fadeOut(1);
        $("#back_btn03").fadeOut(1);

        //show

        $("#sign_up02").slideUp(100).delay(500).fadeIn(500);
        $("#next_btn02").slideUp(100).delay(500).fadeIn(500);
        $("#back_btn02").slideUp(100).delay(400).fadeIn(500);

    });





    $('#next_btn03').on("click", function () {

        //hide
        $("#sign_up03").fadeOut(1);
        $("#next_btn03").fadeOut(1);
        $("#back_btn03").fadeOut(1);


        //show

        $("#tags-select").slideUp(100).delay(500).fadeIn(500);
        $("#sign_up04").slideUp(100).delay(400).fadeIn(500);
		$("#usertype").slideUp(100).delay(400).fadeIn(500);
        $("#submit-btn").slideUp(100).delay(400).fadeIn(500);

        $("#back_btn04").slideUp(100).delay(400).fadeIn(500);


    });





</script>