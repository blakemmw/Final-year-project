<!DOCTYPE html>
<html>
<head>
    <!-- link to the SqPaymentForm library -->
    <script type="text/javascript" src="https://js.squareup.com/v2/paymentform">
    </script>

    <!-- link to the local SqPaymentForm initialization -->
    <script type="text/javascript" src="/js/sqpaymentform-basic.js"></script>
    <!-- link to the custom styles for SqPaymentForm -->

    <?= $this->Html->css('sqpaymentform-basic.css') ?>

</head>

<body>




<div id="orderSummary">

    <button id='show-paymentform' onclick='buildForm()'>Pay with card</button>

    <div id="form-container">
        <div id="sq-ccbox">
            <!--
              Be sure to replace the action attribute of the form with the path of
              the Transaction API charge endpoint URL you want to POST the nonce to
              (for example, "/process-card")
            -->
            <?= $this->Form->create(null, ['id' => 'nonce-form'], ['novalidate action' => '/epayments/processCard']) ?>
            <!--<form id="nonce-form" novalidate action="/epayments/processCard" method="post"> -->
                <fieldset>
                    <span class="label">Card Number</span>
                    <div id="sq-card-number"></div>

                    <div class="third">
                        <span class="label">Expiration</span>
                        <div id="sq-expiration-date"></div>
                    </div>

                    <div class="third">
                        <span class="label">CVV</span>
                        <div id="sq-cvv"></div>
                    </div>

                    <div class="third">
                        <span class="label">Postal</span>
                        <div id="sq-postal-code"></div>
                    </div>
                </fieldset>

                <button id="sq-creditcard" class="button-credit-card" onclick="requestCardNonce(event)">Pay $1.00</button>

                <div id="error"></div>

                <!--
                  After a nonce is generated it will be assigned to this hidden input field.
                -->
                <input type="hidden" id="card-nonce" name="nonce">
            <!--</form> -->
            <?= $this->Form->end() ?>

        </div> <!-- end #sq-ccbox -->

    </div> <!-- end #form-container -->

</div>
<script>

    document.addEventListener("DOMContentLoaded", function(event) {
        if (SqPaymentForm.isSupportedBrowser()) {
            paymentForm.build();
            paymentForm.recalculateSize();
        }
    });

    function buildForm() {
        if (SqPaymentForm.isSupportedBrowser()) {
            var paymentDiv = document.getElementById("form-container");
            if (paymentDiv.style.display === "none") {
                paymentDiv.style.display = "block";
            }
            paymentform.build();
            paymentform.recalculateSize();
        } else {
            // Show a "Browser is not supported" message to your buyer
        }
    }


</script>
</body>
</html>