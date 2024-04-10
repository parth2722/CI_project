<head>
    <meta name="google-site-verification" content="jlByZLO42gqjZgfAEj29-VYfJC2hEwUj1KSeQpiGJcI" />
    <!-- <link rel="canonical" href="https://techarise.com/" /> -->
    <meta name="author" content="TechArise">
    <meta name="description" content="Learn Web Development Tutorials & Web Developer Resources, PHP, MySQL, jQuery, CSS, XHTML, jQuery UI, CSS3, HTML5, HTML, web design, webdesign, with TechArise tutorials. View live demo">
    <meta name="keywords" content="TechArise, tutorial TechArise, tutorials, freebies, resources, web development, webdev, demo, PHP, MySQL, jQuery, CSS, XHTML, jQuery UI, CSS3, HTML5, HTML, web design, webdesign, php script, dynamic web content" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CI-Project</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/crud">Home</a>
                        </li>

                    </ul>
                    <form class="d-flex">
                        <?php if (!empty(session())) { ?>
                            <a class="btn btn-outline-primary" href="<?php echo base_url(); ?>/logout">Logout</a>
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

    <br>
    <?= $this->renderSection('content') ?>
</body>