<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>p5Playground - {{ $name }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/cm.css') }}" rel="stylesheet" type="text/css">

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

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .CodeMirror {
                float: left;
                width: calc(100% - 400px);
                border-right: 0.5px solid lightgray;
                border-bottom: 0.5px solid lightgray;
                /* border-radius: 5px 0 0 5px; */
                font-size: 1.1rem;
                height: 100vh;
            }

            #previewDiv {
                float: right;
                position: relative;
                height: 100vh;
                width: 400px;
                border-bottom: 0.5px solid lightgray;
                overflow: hidden;
            }

            iframe#preview {
                position: absolute;
                right: 0;
                width: 400px;
                height: 400px;
                top: 50%;
                margin-top: -200px;
            }

            button {
                -webkit-appearance: button;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            <textarea id=code name=code type="text/javascript">{{ $content }}</textarea>
            <div id="previewDiv">
                <iframe id=preview scrolling=no sandbox="allow-scripts allow-same-origin" seamless frameborder="0"></iframe>
            </div>

            <div style="clear:both"></div>

            <select id=select>
                <option selected>default</option>
                <option>ambiance</option>
                <option>blackboard</option>
                <option>cobalt</option>
                <option>elegant</option>
                <option>material</option>
                <option>mdn-like</option>
                <option>midnight</option>
                <option>oceanic-next</option>
                <option>solarized dark</option>
                <option>solarized light</option>
            </select>

            <button>Save</button>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
