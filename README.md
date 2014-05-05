TwitterMatcher
==============

Development
-----------

### Dependencies

    php >= 5.4
    php mcrypt extension
    composer
    mysql

### Commands

    composer install
    php artisan migrate

    - Fix for Storage Directory

        Quick Fix - DO NOT USE ON PRODUCTION
        sudo chmod -R 777 app/storage

    When creating new files in new directories, you may need to add them to the mapping to be autoloaded. Check classmap in composer.json. Once you create new files, run:

    composer dump-autoload -o


Production
-----------

game_data
user_games

'name' => $results[0]['user']['name'],
                    'screen_name' => $results[0]['user']['screen_name'],
                    'tweet' => $this->cleanTweet($results[0]['text']),
                    'tweet_time' => date('Y-m-d H:i:s', strtotime($results[0]['created_at'])),
                    'url' => $this->url.$results[0]['user']['screen_name'],
                    'profile_img' => $results[0]['user']['profile_image_url'],