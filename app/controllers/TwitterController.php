<?php

use Models\Twitter;

class TwitterController extends \BaseController {

	public function index()
	{
		$twitter = new Twitter();

		$katyperry_results = $twitter->getUserTweetsByScreename('katyperry');
		$obama_results = $twitter->getUserTweetsByScreename('BarackObama');
		$ladygaga_results = $twitter->getUserTweetsByScreename('ladygaga');

		return Response::json(array('results' => array($katyperry_results, $obama_results, $ladygaga_results)));
	}


}
