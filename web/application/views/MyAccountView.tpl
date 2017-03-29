<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prospera Free - New Amazing HTML5 Template</title>
    <link rel="stylesheet" href="../../shopAssests/css/components.css">
    <link rel="stylesheet" href="../../shopAssests/css/icons.css">
    <link rel="stylesheet" href="../../shopAssests/css/responsee.css">
    <link rel="stylesheet" href="../../shopAssests/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="../../shopAssests/owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="../../shopAssests/css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../../shopAssests/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../../shopAssests/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../shopAssests/js/validation.js"></script>
</head>

<body class="size-1140">

<!-- HEADER -->
<header role="banner">

    <!-- Top Navigation -->
    <nav class="background-white background-primary-hightlight">
        <div class="line">
            <div class="top-nav s-12 l-10">
                <p class="nav-text"></p>
                <ul class="right chevron">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a>Services</a>
                        <ul>
                            <li><a>Service 1</a>
                                <ul>
                                    <li><a>Service 1 A</a></li>
                                    <li><a>Service 1 B</a></li>
                                </ul>
                            </li>
                            <li><a>Service 2</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- MAIN -->
<main role="main">
    <!-- Content -->
    <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Contact US</h1>
        </header>
        <div class="section background-white">
            <div class="line">
                <div class="margin">

                    <!-- Account Information -->
                    <div class="s-12 m-12 l-6">
                        <div class="float-left">
                            <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                        </div>
                        <div class="margin-left-80 margin-bottom">
                            <h4 class="text-strong margin-bottom-0">Username</h4>
                            <p>{$username}</p>
                        </div>

                        <div class="float-left">
                            <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                        </div>
                        <div class="margin-left-80 margin-bottom">
                            <h4 class="text-strong margin-bottom-0">Email</h4>
                            <p>{$email}</p>
                        </div>

                    </div>

                    <!-- Contact Form -->
                    <div class="s-12 m-12 l-6">
                        <h2 class="text-uppercase text-strong margin-bottom-30">Card Data</h2>
                        <form class="customform">
                            <div class="line">
                                <div class="margin">
                                    <div class="s-12 m-12 l-6">
                                        <input name="email" class="required email border-radius" placeholder="{$cardNumber}" title="Your e-mail" type="text" />
                                    </div>
                                    <div class="s-12 m-12 l-6">
                                        <input name="name" class="name border-radius" placeholder="Your name" title="Your name" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="s-12">
                                <input name="subject" class="subject border-radius" placeholder="Subject" title="Subject" type="text" />
                            </div>
                            <div class="s-12">
                                <textarea name="message" class="required message border-radius" placeholder="Your message" rows="3"></textarea>
                            </div>
                            <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Submit Button</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>

<script type="text/javascript" src="../../shopAssests/js/responsee.js"></script>
<script type="text/javascript" src="../../shopAssests/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="../../shopAssests/js/template-scripts.js"></script>

</body>
</html>