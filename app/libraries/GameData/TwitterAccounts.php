<?php namespace GameData;

use Symfony\Component\DomCrawler\Crawler;

class TwitterAccounts implements AccountsInterface {

	private $data_url = 'http://twitaholic.com';

	public function __construct($num_accounts = 10)
	{
		$this->num_accounts = $num_accounts;
		$this->crawler = new Crawler();
	}

	public function getAccountData()
	{
		$html = file_get_contents($this->data_url);

		//Not ideally efficient right now, goes through all results reguardless of num count
		$this->crawler->add($html);
		$results = $this->crawler->filter('.statcol_name')->each(function(Crawler $node, $i){
			return substr($node->text(), stripos($node->text(), '@') + 1);
		});

		return array_slice($results, 0, $this->num_accounts);
	}
}