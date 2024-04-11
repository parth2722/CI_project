<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        button#user-topnav-menu {
            background: #fff;
            border: 1px solid #b1b1b1;
            padding: 0.2em 2em;
            text-align: left !important;
            border-radius: 2em;
        }




        body {
            background: #fbfbfd;
        }

        .new_footer_area {
            background: #fbfbfd;
        }


        .new_footer_top {
            padding: 120px 0px 270px;
            position: relative;
            overflow-x: hidden;
        }

        .new_footer_area .footer_bottom {
            padding-top: 5px;
            padding-bottom: 50px;
        }

        .footer_bottom {
            font-size: 14px;
            font-weight: 300;
            line-height: 20px;
            color: #7f88a6;
            padding: 27px 0px;
        }

        .new_footer_top .company_widget p {
            font-size: 16px;
            font-weight: 300;
            line-height: 28px;
            color: #6a7695;
            margin-bottom: 20px;
        }

        .new_footer_top .company_widget .f_subscribe_two .btn_get {
            border-width: 1px;
            margin-top: 20px;
        }

        .btn_get_two:hover {
            background: transparent;
            color: #5e2ced;
        }

        .btn_get:hover {
            color: #fff;
            background: #6754e2;
            border-color: #6754e2;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        a:hover,
        a:focus,
        .btn:hover,
        .btn:focus,
        button:hover,
        button:focus {
            text-decoration: none;
            outline: none;
        }



        .new_footer_top .f_widget.about-widget .f_list li a:hover {
            color: #5e2ced;
        }

        .new_footer_top .f_widget.about-widget .f_list li {
            margin-bottom: 11px;
        }

        .f_widget.about-widget .f_list li:last-child {
            margin-bottom: 0px;
        }

        .f_widget.about-widget .f_list li {
            margin-bottom: 15px;
        }

        .f_widget.about-widget .f_list {
            margin-bottom: 0px;
        }

        .new_footer_top .f_social_icon a {
            width: 44px;
            height: 44px;
            line-height: 43px;
            background: transparent;
            border: 1px solid #e2e2eb;
            font-size: 24px;
        }

        .f_social_icon a {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            font-size: 14px;
            line-height: 45px;
            color: #858da8;
            display: inline-block;
            background: #ebeef5;
            text-align: center;
            -webkit-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .ti-facebook:before {
            content: "\e741";
        }

        .ti-twitter-alt:before {
            content: "\e74b";
        }

        .ti-vimeo-alt:before {
            content: "\e74a";
        }

        .ti-pinterest:before {
            content: "\e731";
        }

        .btn_get_two {
            -webkit-box-shadow: none;
            box-shadow: none;
            background: #5e2ced;
            border-color: #5e2ced;
            color: #fff;
        }

        .btn_get_two:hover {
            background: transparent;
            color: #5e2ced;
        }

        .new_footer_top .f_social_icon a:hover {
            background: #5e2ced;
            border-color: #5e2ced;
            color: white;
        }

        .new_footer_top .f_social_icon a+a {
            margin-left: 4px;
        }

        .new_footer_top .f-title {
            margin-bottom: 30px;
            color: #263b5e;
        }

        .f_600 {
            font-weight: 600;
        }

        .f_size_18 {
            font-size: 18px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #4b505e;
        }

        .new_footer_top .f_widget.about-widget .f_list li a {
            color: #6a7695;
        }


        .new_footer_top .footer_bg {
            position: absolute;
            bottom: 0;
            background: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEigB8iI5tb8WSVBuVUGc9UjjB8O0708X7Fdic_4O1LT4CmLHoiwhanLXiRhe82yw0R7LgACQ2IhZaTY0hhmGi0gYp_Ynb49CVzfmXtYHUVKgXXpWvJ_oYT8cB4vzsnJLe3iCwuzj-w6PeYq_JaHmy_CoGoa6nw0FBo-2xLdOPvsLTh_fmYH2xhkaZ-OGQ/s16000/footer_bg.png") no-repeat scroll center 0;
            width: 100%;
            height: 266px;
        }

        .new_footer_top .footer_bg .footer_bg_one {
            background: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEia0PYPxwT5ifToyP3SNZeQWfJEWrUENYA5IXM6sN5vLwAKvaJS1pQVu8mOFFUa_ET4JuHNTFAxKURFerJYHDUWXLXl1vDofYXuij45JZelYOjEFoCOn7E6Vxu0fwV7ACPzArcno1rYuVxGB7JY6G7__e4_KZW4lTYIaHSLVaVLzklZBLZnQw047oq5-Q/s16000/volks.gif") no-repeat center center;
            width: 330px;
            height: 105px;
            background-size: 100%;
            position: absolute;
            bottom: 0;
            left: 30%;
            -webkit-animation: myfirst 22s linear infinite;
            animation: myfirst 22s linear infinite;
        }

        .new_footer_top .footer_bg .footer_bg_two {
            background: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhyLGwEUVwPK6Vi8xXMymsc-ZXVwLWyXhogZxbcXQYSY55REw_0D4VTQnsVzCrL7nsyjd0P7RVOI5NKJbQ75koZIalD8mqbMquP20fL3DxsWngKkOLOzoOf9sMuxlbyfkIBTsDw5WFUj-YJiI50yzgVjF8cZPHhEjkOP_PRTQXDHEq8AyWpBiJdN9SfQA/s16000/cyclist.gif") no-repeat center center;
            width: 88px;
            height: 100px;
            background-size: 100%;
            bottom: 0;
            left: 38%;
            position: absolute;
            -webkit-animation: myfirst 30s linear infinite;
            animation: myfirst 30s linear infinite;
        }



        @-moz-keyframes myfirst {
            0% {
                left: -25%;
            }

            100% {
                left: 100%;
            }
        }

        @-webkit-keyframes myfirst {
            0% {
                left: -25%;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes myfirst {
            0% {
                left: -25%;
            }

            100% {
                left: 100%;
            }
        }

    </style>
</head>

<body>
    <header>
        <nav class="navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="https://sourcecodester.com"><?= env('short_name') ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= isset($page_title) && $page_title == 'Home' ? 'active' : '' ?>" aria-current="page" href="<?= base_url('/crud') ?>">Home</a>
                        </li>
                        <li><a class="nav-link <?= isset($page_title) && $page_title == 'Products' ? 'active' : '' ?>" href="<?= base_url('/products') ?>">Products</a></li>
                        <li><a class="nav-link <?= isset($page_title) && $page_title == 'Users' ? 'active' : '' ?>" href="<?= base_url('/users') ?>">Users</a></li>
                    </ul>
                    <div class="dropdown">
                        <button type='button' class="" id="user-topnav-menu" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user rounded-circle border"></i> <i class="fa fa-angle-down text-muted"></i></button>
                        <ul class="dropdown-menu" aria-labelledby="user-topnav-menu-items">

                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fa fa-sign-out text-muted"></i> Logout</a></li>
                        </ul>
                    </div>

                </div>
        </nav>
    </header>

    <?= $this->renderSection('content') ?>


    <footer class="new_footer_area bg_color">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Don’t miss any updates of our new templates and extensions.!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Android App</a></li>
                             
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Term &amp; conditions</a></li>
                              
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <a href="#" class="fab fa-facebook"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-linkedin"></a>
                                <a href="#" class="fab fa-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
       
    </footer>
</body>