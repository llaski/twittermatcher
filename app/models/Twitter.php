<?php
namespace Models;

use Cache;
use Twitter as TwitterAPI;

class Twitter {

    /**
     * Get Tweets by User Screename
     * @param  string $screen_name
     * @return array
     */
    public function getUserTweetsByScreename($screen_name)
    {
        if (Cache::has($screen_name.'results'))
        {
            $results = Cache::get($screen_name.'results');
        }
        else
        {
            $results = TwitterAPI::getUserTimeline(array(
                'screen_name' => $screen_name,
                'format' => 'array'
            ));

            if (isset($results[0]))
            {
                //Clean Tweet

                $results = array(
                    'name' => $results[0]['user']['name'],
                    'screen_name' => $results[0]['user']['screen_name'],
                    'tweet' => $this->cleanTweet($results[0]['text']),
                    'tweet_time' => date('Y-m-d H:i:s', strtotime($results[0]['created_at'])),
                    'profile_img' => $results[0]['user']['profile_image_url'],
                );
            }

            Cache::put($screen_name.'results', $results, 60); //60 minutes
        }

        return $results;
    }

    /**
     * Clean Tweet
     * - removes links
     * - removes invalid characters (non utf-8)
     * @param string $tweet
     * @return string
     */
    private function cleanTweet($tweet)
    {
        return $tweet; //preg_replace('/(http:.*)[ ]?/', '', $tweet);
    }

}