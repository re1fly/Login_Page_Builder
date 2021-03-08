<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">

        <div class="title m-b-md">
            Laravel
        </div>
        <div id="errorHint" style="color:red"></div>

        <div class="links">

            <form autocomplete="off" name="login" action="http://192.168.3.42/omada/1d31c039-2fe9-4f6d-9e70-113859dba67b/login" method="POST">

                <div>
                    <span>username:</span>
                    <input type="text" id="username" name="username" value="yuswa@globalxtreme.com"/>
                </div>
                <div>
                    <span>password:</span>
                    <input type="password" id="password" name="password" value="global101"/>
                </div>

                <input type="hidden" name="apMac" value="{{isset($_GET['apMac']) ? $_GET['apMac'] : ''}}">
                <input type="hidden" name="clientMac" value="{{isset($_GET['clientMac']) ? $_GET['clientMac'] : ''}}">
                <input type="hidden" name="redirectUrl"
                       value="{{isset($_GET['redirectUrl']) ? $_GET['redirectUrl'] : ''}}">
                <input type="hidden" name="radioId" value="{{isset($_GET['radioId']) ? $_GET['radioId'] : ''}}">
                <input type="hidden" name="site" value="{{isset($_GET['site']) ? $_GET['site'] : ''}}">
                <input type="hidden" name="ssidName" value="{{isset($_GET['ssidName']) ? $_GET['ssidName'] : ''}}">
                <input type="hidden" name="t" value="{{isset($_GET['t']) ? $_GET['t'] : ''}}">
                <input type="hidden" name="time" value="{{isset($_GET['time']) ? $_GET['time'] : ''}}">
                <input type="hidden" name="authType" value="{{isset($_GET['authType']) ? $_GET['authType'] : ''}}">

                <button type="submit">Login</button>

            </form>

        </div>
    </div>
</div>

</body>
</html>
