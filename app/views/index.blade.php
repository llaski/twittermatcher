<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TwitterMatcher</title>
        <meta name="viewport" content="width=device-width">

        {{ HTML::style('css/main.css') }}
    </head>
    <body>

        <div class="container">
            {{ HTML::image('img/twitter-icon.png', 'Twitter Matcher', array('class' => 'center')) }}
            <div class="row">
                <h3 id="numTries" class="alert right">Num Tries Remaining: 5</h3>
            </div>
            <div class="row">
                <div id="accounts-container" class="col-md-12 well">

                    <p id="drop-msg" class="alert txt-center"></p>
                </div>
            </div>

            <div class="row">
                <div id="tweets-container" class="col-md-12">
                </div>
            </div>
        </div>


        {{ HTML::script('js/main.js') }}
        <script>
            App.gameCollection = new App.Collections.Account({{ json_encode($game_data['accounts']) }});
            App.accountsView = new App.Views.GameItemAccounts({ collection: App.gameCollection });
            App.tweetsView = new App.Views.GameItemTweets({ collection: App.gameCollection });

            $("#accounts-container").prepend(App.accountsView.render().el);
            $("#tweets-container").prepend(App.tweetsView.render().el);
           </script>
    </body>
</html>
