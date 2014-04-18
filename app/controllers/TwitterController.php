<?php

use Models\Twitter;

class TwitterController extends \BaseController {

	public function index()
	{
		$twitter = new Twitter();

		$results = array();
		$accounts = TwitterAccount::getShuffledAccounts(5);

		foreach ($accounts as $account)
			$results[] = $twitter->getUserTweetsByScreename($account->screen_name);

		return Response::json(array('results' => $results));
	}


}
