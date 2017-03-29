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
    <script type="text/javascript" src="../../shopAssests/js/validation.js"></script>
</head>

<body class="size-1140">


<!-- MAIN -->
<main role="main">
    <!-- Content -->
    <article>
        <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Sample store</h1>
        </header>
        <div class="section background-white">

            <div class="line">
                <div class="margin text-center">
            {foreach  $products as $productName => $productInfo}

                        <div class="s-12 m-12 l-4 margin-bottom">
                            <div class="padding-2x block-bordered border-radius">
                                <i class="icon-paperplane_ico icon2x text-primary margin-bottom-30"></i>
                                <h2 class="text-thin">{$productName}</h2>
                                <p class="margin-bottom-30">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
                                <a class="button border-radius background-primary text-size-12 text-white text-strong" href="/">GET MORE INFO</a>
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