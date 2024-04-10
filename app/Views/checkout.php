<?= $this->extend('menus') ?>

<?= $this->section('content') ?>


<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="text-right">
                        <a href="/crud" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div style="color: green;
                                    border: 2px green solid;
                                    text-align: center;
                                    padding: 5px;margin-bottom: 10px;">
                                Payment Successful!
                            </div>
                        <?php endif ?>
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <form method="post" action="<?= base_url('/stripe/generate_invoice') ?>">
                                <button type="submit" class="btn btn-primary mt-3">Generate Invoice</button>
                            </form>
                            <div class="col text-right">
                                <a href="<?= site_url('stripe/refund/ch_3P3dhqJ7YilluosL0f9oGnbK') ?>" class="btn btn-danger">Refund</a>
                            </div>
                        </div>
                        <form id='checkout-form' method='post' action="<?= base_url('/stripe/create-charge') ?>">
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>
                            <label for="card-element" class="mb-2 mt-2">Checkout Forms</label>
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