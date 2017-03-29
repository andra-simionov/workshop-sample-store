<html>
<head>
    <title>Login</title>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{base_url("assets/css/style.css")}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(c) {
            $('.alert-close').on('click', function(c) {
                $('.message').fadeOut('slow', function(c) {
                    $('.message').remove();
                });
            });
        });
        window.onload = function () { $('#username').val('');
            $('#password').val('');
        };
    </script>

</head>
<body>
<a href="{site_url('Logout')}" class="btn btn-info square-btn-adjust">Logout</a>


<div> daaaa</div>

</body>
</html>