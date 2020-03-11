<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!--Favicon -->
    <link rel="icon" href="{{url('')}}/assets/img/favicon.png" type="image/x-icon"/>

    <link rel="stylesheet" href="{{ url('assets/css/admin.app.css') }}">

</head>

<body class="bg-primary">

<!--app open-->
<div id="app" class="page">
    <section class="section">
        <div class="container">
            <div class="">

                @yield('auth.content')

            </div>
        </div>
    </section>
</div>
<!--app closed-->

<!--app closed-->
<!--Jquery.min js-->
<script src="{{url('')}}/assets/js/jquery.min.js"></script>

<!--Scripts js-->
<script src="{{url('')}}/assets/js/scripts.js"></script>

</body>
</html>










