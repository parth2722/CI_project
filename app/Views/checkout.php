<?= $this->extend('menus') ?>

<?= $this->section('content') ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div style="color: green;
                                    border: 2px green solid;
                                    text-align: center;
                                    padding: 5px;margin-bottom: 10px;">
                                Payment Successful!
                            </div>
                        <?php endif ?>

                        <div class="col text-right">
                            <form method="post" action="<?= base_url('/stripe/generate_invoice') ?>">
                                <button type="submit" class="btn btn-primary mt-3">Generate Invoice</button>
                            </form>
                        </div>

                        <a href="<?= site_url('stripe/refund/ch_3P3dhqJ7YilluosL0f9oGnbK') ?>" class="btn btn-danger">Refund</a>

                        <form id='checkout-form' method='post' action="<?= base_url('/stripe/create-charge') ?>">
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>
                            <label for="card-element" class="mb-5">Checkout Forms</label>
                            <br>
                            <div id="card-element" class="form-control"></div>
                            <button id='pay-btn' class="btn btn-success mt-3" type="button" style="margin-top: 20px; width: 25%;padding: 7px;" onclick="createToken()">PAY</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var stripe = Stripe("<?php echo getenv('stripe.key') ?>");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
</body>

<?= $this->endSection() ?>