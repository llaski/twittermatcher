<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TwitterMatcher</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        {{ HTML::style('css/main.css') }}
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <div class="container">
            {{ HTML::image('img/twitter-icon.png', 'Twitter Matcher', array('class' => 'center')) }}
            <div class="row">
                <div class="col-md-12 well">
                    <ul class="items handles">
                        @foreach($game_data as $item)
                            <li class="draggable" draggable="true" data-id="{{ $item['id'] }}">
                                <img draggable="false" src="{{ $item['profile_img'] }}" alt="">
                                <p>{{ $item['name'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="items tweets">
                        @foreach($game_data as $item)
                            <li data-id="{{ $item['id'] }}">
                                <div class="droparea"></div>
                                <p>{{ $item['tweet'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        {{ HTML::script('js/main.js') }}
    </body>
</html>
