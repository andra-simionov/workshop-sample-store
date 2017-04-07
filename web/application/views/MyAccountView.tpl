<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sample Store</title>
    <link rel="stylesheet" href="../../shopAssests/css/components.css">
    <link rel="stylesheet" href="../../shopAssests/css/icons.css">
    <link rel="stylesheet" href="../../shopAssests/css/responsee.css">
    <link rel="stylesheet" href="../../shopAssests/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="../../shopAssests/owl-carousel/owl.theme.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="../../shopAssests/css/template-style.css">
    <!-- Notification style -->
    <link href="../../shopAssests/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../shopAssests/css/animate.min.css" rel="stylesheet"/>

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
                    <li><a href="{site_url({'SampleStore'})}">Products</a></li>
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
                        <h2 class="text-uppercase text-strong margin-bottom-30">User Info</h2>
                        <div class="margin-bottom">
                            <h4 class="margin-bottom-0">Username: {$username}</h4>
                        </div>
                        <div class="margin-bottom">
                            <h4 class="margin-bottom-0">Email: {$email}</h4>
                        </div>

                         {if $isResponseTypeError eq 0}

                        <div class="margin-bottom">
                            <h4 class="margin-bottom-0">Available balance: {$balanceInfo}</h4>
                        </div>

                        {else}

                         <div class="margin-bottom">
                             <h4 class="margin-bottom-0">{$errorMessage}</h4>
                         </div>

                         {/if}

                        <!-- Token Form -->

                        {form_open('MyAccount/updateToken')}

                        <div class="s-12 m-12 l-6">
                            <h2 class="text-uppercase text-strong margin-bottom-30">Update your token for online payments</h2>
                            <form class="customform">
                                <div class="line"><h5>Current token:</h5>
                                    <div class="margin">
                                        <div class="s-12 m-12 l-6">
                                            <input name="token" id="token" value="{$token}" class="required-input name border-radius" placeholder="{$token}" type="text" />
                                        </div>
                                    </div>
                                </div><br/>
                                <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Update</button></div>
                            </form>
                        {form_close()}

                        </div>
                        <br><br><br><br><br><br><br><br>
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
                                    Order reference
                                </th>
                                <th>
                                    Product name
                                </th>
                                <th>
                                    Product price
                                </th>
                                <th>
                                    Order status
                                </th>
                                <th>
                                    Operation
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
                                        {$orderInfo['OrderReference']}
                                    </td>
                                    <td>
                                        {$orderInfo['ProductName']}
                                    </td>
                                    <td>
                                        {capture assign=orderData}{$orderInfo['Price']} {$orderInfo['Currency']}{/capture}
                                        {$orderData}
                                    </td>

                                    <td>
                                        {$orderInfo['OrderStatus']}
                                    </td>
                                    <td>
                                        {if $orderInfo['OrderStatus'] == 'PAID'}
                                        <button class="button border-radius background-primary text-size-12 text-white text-strong" onclick="refund('{site_url()}', '{$orderInfo['OrderReference']}', {$idUser})">
                                            REFUND
                                        </button>
                                        {else} -
                                        {/if}
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
<script src="../../shopAssests/js/bootstrap-notify.js"></script>
<script src="../../shopAssests/js/refundOrder.js"></script>

</body>
</html>
