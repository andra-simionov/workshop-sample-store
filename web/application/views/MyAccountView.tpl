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
                    {capture assign=ProductsPage}SampleStore/loggedIn/{$idUser}{/capture}
                    <li><a href="{site_url({$ProductsPage})}">Products</a></li>
                    <li><a href="{site_url('Logout')}"> Logout </a></li>
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
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Account information</h1>
        </header>
        <div class="section background-white">
            <div class="line">
                <div class="margin">

                    <!-- Account Information -->
                    <div class="s-12 m-12 l-12">
                        <h2 class="text-uppercase text-strong margin-bottom-30">User Profile</h2>
                        <div class="margin-bottom">
                            <h4 class="margin-bottom-0">Username: {$username}</h4>
                        </div>
                        <div class="margin-bottom">
                            <h4 class="margin-bottom-0">E-mail: {$email}</h4>
                        </div><br>
                        <!-- Order History -->
                        <h2 class="text-uppercase text-strong margin-bottom-30">Order History</h2>
                        <table class="section background-white">
                            <tr>
                                <th>
                                    Nr.
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Product name
                                </th>
                                <th>
                                    Product price
                                </th>
                            </tr>
                            {foreach  $orders as $index => $orderInfo}
                                <tr>
                                    <td>
                                        {$index}
                                    </td>
                                    <td>
                                        {$orderInfo['Date']}
                                    </td>
                                    <td>
                                        {$orderInfo['ProductName']}
                                    </td>
                                    <td>
                                        {$orderInfo['Price']}
                                    </td>
                                </tr>
                            {/foreach}
                        </table>

                    </div>

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
