<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 - Page Not Found</title>

    <link href="/frontier/assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* custom 404 page */

        html {
            height: 100%;
        }

        body {
            height: 100%;
            background: url("https://wallpapercave.com/wp/6SLzBEY.jpg") no-repeat left top;
            background-size: cover;
            overflow: hidden;

            display: flex;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
        }

        .text h1 {
            color: #011718;
            margin-top: -200px;
            font-size: 15em;
            text-align: center;
            text-shadow: -5px 5px 0px rgba(0, 0, 0, 0.7), -10px 10px 0px rgba(0, 0, 0, 0.4), -15px 15px 0px rgba(0, 0, 0, 0.2);
            font-family: monospace;
            font-weight: bold;
        }

        .text h2 {
            color: black;
            font-size: 5em;
            text-shadow: -5px 5px 0px rgba(0, 0, 0, 0.7);
            text-align: center;
            margin-top: -150px;
            font-family: monospace;
            font-weight: bold;
        }

        .text h3 {
            color: white;
            margin-left: 30px;
            font-size: 2em;
            text-shadow: -5px 5px 0px rgba(0, 0, 0, 0.7);
            margin-top: -40px;
            font-family: monospace;
            font-weight: bold;
        }

        .torch {
            margin: -150px 0 0 -150px;
            width: 200px;
            height: 200px;
            box-shadow: 0 0 0 9999em #000000f7;
            opacity: 1;
            border-radius: 50%;
            position: fixed;
            background: rgba(0, 0, 0, 0.3);

            &:after {
                content: '';
                display: block;
                border-radius: 50%;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                box-shadow: inset 0 0 40px 2px #000,
                    0 0 20px 4px rgba(13, 13, 10, 0.2);
            }
        }

        a {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            background: transparent;
            color: #c9c9c9;
            border: 2px solid #c9c9c9;
            display: inline-block;
            padding: 10px 25px;
            font-weight: 700;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        a:hover {
            color: #ffab00;
            border-color: #ffab00;
        }
    </style>

</head>

<body>
    <div class="text">
        <h1>404</h1>
        <h3>Uh, Ohh! We cant find that page 'cuz its so dark in here</h3>
    </div>
    <div class="torch"></div>
    <div>
        <a href="/frontier">Take me home</a>
    </div>
    <script src="/parrot/assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).mousemove(function(event) {
            $('.torch').css({
                'top': event.pageY,
                'left': event.pageX
            });
        });
    </script>
</body>

</html>