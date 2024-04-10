<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <header>
        <nav class="navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto  mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/crud">Home</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <?php if (!empty(session())) { ?>
                            <a class="btn btn-outline-primary mt-1" href="<?php echo base_url(); ?>/logout">Logout</a>
                        <?php } else {
                        ?>
                            <a class="btn btn-outline-primary" href="<?php echo base_url(); ?>/signup">Login <?php print_r(session()->get('name')); ?> </a>
                        <?php
                        } ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <?= $this->renderSection('content') ?>
    <!-- <footer>
        <div>
            <h1>
                this is footer
            </h1>
        </div>
    </footer> -->
</body>