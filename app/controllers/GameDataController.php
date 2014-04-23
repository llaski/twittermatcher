<?php

use TwitterMatcher\GameData\GameDataRepositoryInterface as GameDataRepository;

class GameDataController extends \APIController {

	protected $game_data;

	public function __construct(GameDataRepository $game_data)
	{
		$this->game_data = $game_data;
	}

	public function getRandomGameData()
	{
		// $twitter = new Twitter();

		// $results = array();
		// $accounts = TwitterAccount::getShuffledAccounts(5);

		// foreach ($accounts as $account)
		// 	$results[] = $twitter->getUserTweetsByScreename($account->screen_name);

		// return Response::json(array('results' => $results));

		$game = $this->game_data->getShuffledData();
		return $this->response($game);
	}

	// public function getTopAccounts($num_accounts = 100)
	// {
	// 	$results = TwitterAccount::take($num_accounts)->get()->toArray();

	// 	return Response::json(array('results' => $results));
	// }

}