<?php

use Models\Twitter;

class TwitterController extends \BaseController {

	public function getGameData()
	{
		$twitter = new Twitter();

		$results = array();
		$accounts = TwitterAccount::getShuffledAccounts(5);

		foreach ($accounts as $account)
			$results[] = $twitter->getUserTweetsByScreename($account->screen_name);

		return Response::json(array('results' => $results));
	}

	public function getTopAccounts($num_accounts = 100)
	{
		$results = TwitterAccount::take($num_accounts)->get()->toArray();

		return Response::json(array('results' => $results));
	}

}
