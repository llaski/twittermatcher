<?php namespace TwitterMatcher\API;

// use Cache;
use Twitter; //thujohn twitter package

class TwitterAPI {

    private $url = 'https://twitter.com/';

    /**
     * Get Tweets by User Screename
     * @param  string $screen_name
     * @return array
     */
    public function getRecentUserTweetByScreename($screen_name)
    {
        $results = array();
        // if (Cache::has($screen_name.'results'))
        // {
        //     $results = Cache::get($screen_name.'results');
        // }
        // else
        // {
        $user_data = Twitter::getUserTimeline(array(
            'screen_name' => $screen_name,
            'format' => 'array'
        ));

        if (isset($user_data[0]))
        {
            $results = array(
                'name' => $user_data[0]['user']['name'],
                'screen_name' => $user_data[0]['user']['screen_name'],
                'tweet' => $user_data[0]['text'],
                'tweet_time' => date('Y-m-d H:i:s', strtotime($user_data[0]['created_at'])),
                'url' => $this->url.$user_data[0]['user']['screen_name'],
                'profile_img' => $user_data[0]['user']['profile_image_url'],
            );
        }


            // Cache::put($screen_name.'results', $results, 60); //60 minutes
        // }

        return $results;
    }

}