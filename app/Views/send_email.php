<?= $this->extend('menus') ?>

<?= $this->section('content') ?>


<head>
    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-right">
            <a href="/crud" class="btn btn-secondary btn-sm mt-2">Back</a>
        </div>
        <form method="post" action="<?php echo base_url('Crud/sendMail') ?>">
            <div class="form-group mt-2">
                <label>Receiver Email</label>
                <input type="text" name="mailTo" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Your Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Message</label>
                <textarea rows="6" type="text" name="message" class="form-control"></textarea>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
</body>
<?= $this->endSection() ?>