<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sample store</title>
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

</head>

<body class="size-1140">

<!-- Top Navigation -->
<nav class="background-white background-primary-hightlight">
    <div class="line">
        <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <ul class="right chevron">
                <li><a href="{site_url('MyAccount')}">MyAccount</a></li>
                <li><a href="{site_url('Logout')}"> Logout </a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- MAIN -->
<main role="main">
    <!-- Content -->
    <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Products</h1>
        </header>
        <div class="section background-white">

            <div class="line">
                <div class="margin text-center">
                {foreach  $products as $index => $productInfo}

                    <div class="s-12 m-12 l-4 margin-bottom">
                        <div class="padding-2x block-bordered border-radius">
                            <i class="icon-paperplane_ico icon2x text-primary margin-bottom-30"></i>
                            <h2 class="text-thin">{$productInfo['ProductName']}</h2>
                            <p class="margin-bottom-30">Price: {$productInfo['Price']}</p>
                            <button class="button border-radius background-primary text-size-12 text-white text-strong" data-toggle="modal" data-target="#myModal"><i class="fa
                            fa-pencil"></i>BUY</button>
                        </div>
                    </div>

                {/foreach}
                </div>
            </div>

        </div>
    </article>



</main>

<script type="text/javascript" src="../../shopAssests/js/responsee.js"></script>
<script type="text/javascript" src="../../shopAssests/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="../../shopAssests/js/template-scripts.js"></script>



</body>
</html>