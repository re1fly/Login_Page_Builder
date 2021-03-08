<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>

        /* Bordered form */
        form {
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text], input[type=password], input[type=number], input[type=date] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

    </style>
</head>
<body>
<form autocomplete="off" name="login" action="{{ route('omada.login.auth', $serviceLocation->uuid) }}" method="POST">

    <div class="container">

        @foreach($loginPage->form->forms as $form)

            @if(($form['type']['id'] == \App\Constants\FormType::TEXT_ID) || ($form['type']['id'] == \App\Constants\FormType::NUMBER_ID) || ($form['type']['id'] == \App\Constants\FormType::DATE_ID))

                <label for="{{ $form['name'] }}"><b>{{ $form['display'] }}</b></label>
                <input type="{{ strtolower($form['type']['name']) }}" placeholder="Enter {{ $form['display'] }}"
                       id="{{ $form['name'] }}" name="{{ $form['name'] }}">
                <br>

            @elseif($form['type']['id'] == \App\Constants\FormType::SELECT_OPTION_ID)

                <label for="{{ $form['name'] }}"><b>Choose a {{ $form['display'] }}:</b></label>

                <select name="{{ $form['name'] }}" id="{{ $form['name'] }}">
                    <option hidden value="">- Choose a {{ $form['display'] }} -</option>

                    @foreach($form['values'] as $value)
                        <option value="{{ $value['id'] }}">{{ $value['display'] }}</option>
                    @endforeach

                </select>
                <br>

            @elseif($form['type']['id'] == \App\Constants\FormType::CHECKBOX_ID)

                <br>
                <label>
                    <input type="checkbox" id="{{ $form['name'] }}" name="{{ $form['name'] }}"> {{ $form['display'] }}
                </label>
                <br>

            @elseif($form['type']['id'] == \App\Constants\FormType::RADIO_BUTTON_ID)

                <br>
                @foreach($form['values'] as $value)

                    <input type="radio" id="{{ $value['name'] . '_' . $value['id'] }}" name="{{ $form['name'] }}"
                           value="{{ $value['id'] }}">
                    <label for="{{ $value['name'] . '_' . $value['id'] }}">{{ $value['display'] }}</label>

                @endforeach
                <br>

            @endif

            <span>
                @if($message = Session::get('validation_' . $form['name']))
                    <i style="color: red">{{ $message }}</i>
                    <br><br>
                @endif
            </span>


        @endforeach

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

        <br>
        <button type="submit">Login</button>
        <div>
            <a href="{{ route('google.login') }}">Google Login</a>
            <a href="{{ route('facebook.login') }}">Facebook Login</a>
            <a href="{{ route('github.login') }}">Github Login</a>
        </div>
        <br>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
</body>
</html>
