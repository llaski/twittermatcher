<?php namespace TwitterMatcher\GameData;

use Symfony\Component\DomCrawler\Crawler as Crawler;
use GameData;

class ScraperRetrieveGameDataRepository implements RetrieveGameDataRepositoryInterface {

    private $data_url = 'http://twitaholic.com';

    protected $crawler;

    public function __construct(Crawler $crawler, GameData $game_data)
    {
        $this->crawler = $crawler;
        $this->game_data = $game_data;
    }

    public function storeAccountData(array $screen_names)
    {
        pp($screen_names, true);
        foreach ($screen_names as $screen_name)
            $this->game_data->createByScreenname($screen_name);
    }

    public function getAccountData($num_accounts = 10)
    {
        $html = file_get_contents($this->data_url);

        //Not ideally efficient right, goes through all results reguardless of num count
        $this->crawler->add($html);
        $results = $this->crawler->filter('.statcol_name')->each(function(Crawler $node, $i){
            return substr($node->text(), strpos($node->text(), '@') + 1);
        });

        return array_slice($results, 0, $this->num_accounts);
    }

}