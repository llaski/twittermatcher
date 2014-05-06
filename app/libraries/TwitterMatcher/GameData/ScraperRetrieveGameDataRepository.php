<?php namespace TwitterMatcher\GameData;

use Symfony\Component\DomCrawler\Crawler as Crawler;
use TwitterMatcher\API\TwitterAPI;
use TwitterMatcher\GameData\GameDataRepositoryInterface;

class ScraperRetrieveGameDataRepository implements RetrieveGameDataRepositoryInterface {

    private $data_url = 'http://twitaholic.com';

    protected $crawler;
    protected $twitter_api;
    protected $game_data;

    public function __construct(Crawler $crawler, TwitterAPI $twitter_api, GameDataRepositoryInterface $game_data)
    {
        $this->crawler = $crawler;
        $this->twitter_api = $twitter_api;
        $this->game_data = $game_data;
    }

    public function storeAccountData(array $screen_names)
    {
        foreach ($screen_names as $screen_name)
        {
            //Check if this user exists & what the tweet time is
            $account = $this->game_data->getAccountByScreenname($screen_name);

            if ( ! $account || ! $account->tweet_time ||  time() >= strtotime($account->tweet_time))
            {
                $data = $this->updateTweet($screen_name);
                if ($data)
                {
                    $data['screen_name'] = $screen_name;
                    $this->game_data->createOrUpdateAccount($data);
                }
            }
        }
    }

    public function getAccountData($num_accounts = 10)
    {
        $html = file_get_contents($this->data_url);

        //Not ideally efficient right, goes through all results reguardless of num count
        $this->crawler->add($html);
        $results = $this->crawler->filter('.statcol_name')->each(function(Crawler $node, $i){
            return substr($node->text(), strpos($node->text(), '@') + 1);
        });

        return array_slice($results, 0, $num_accounts);
    }

    private function updateTweet($screen_name)
    {
        $tweet = $this->twitter_api->getRecentUserTweetByScreename($screen_name);
        return $tweet ?: false;
    }

}
