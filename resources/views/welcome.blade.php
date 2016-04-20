<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {

                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body >
        @yield('layout')
        <div class="container">
            <div class="content">
                {!! Form::open(['url' => '#']) !!}
                {!!Form::submit('Soy Un Botón')!!}
                <?php $fecha= new Carbon\Carbon;
                echo $fecha->now();?>
                {!! Form::close() !!}
                <div class="title">SIALAS</div>
                <div class="title">by</div>
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
