<?php

class TwitterController extends \BaseController {

	public function index()
	{
		if (Cache::has('katyperry_results'))
		{
			$katyperry_results = Cache::get('katyperry_results');
		}
		else
		{
			$katyperry_results = Twitter::getUserTimeline(array(
				'screen_name' => 'katyperry',
				'format' => 'array'
			));

			if (isset($katyperry_results[0]))
			{
				$katyperry_results = array(
					'name' => $katyperry_results[0]['user']['name'],
					'screen_name' => $katyperry_results[0]['user']['screen_name'],
					'tweet' => $katyperry_results[0]['text'],
					'profile_img' => $katyperry_results[0]['user']['profile_image_url'],
				);
			}
			
			Cache::put('katyperry_results', $katyperry_results, 15); //15 minutes
		}

		if (Cache::has('obama_results'))
		{
			$obama_results = Cache::get('obama_results');
		}
		else
		{
			$obama_results = Twitter::getUserTimeline(array(
				'screen_name' => 'BarackObama',
				'format' => 'array'
			));

			if (isset($obama_results[0]))
			{
				$obama_results = array(
					'name' => $obama_results[0]['user']['name'],
					'screen_name' => $obama_results[0]['user']['screen_name'],
					'tweet' => $obama_results[0]['text'],
					'profile_img' => $obama_results[0]['user']['profile_image_url'],
				);
			}
			
			Cache::put('obama_results', $obama_results, 15); //15 minutes
		}

		if (Cache::has('ladygaga_results'))
		{
			$ladygaga_results = Cache::get('ladygaga_results');
		}
		else
		{
			$ladygaga_results = Twitter::getUserTimeline(array(
				'screen_name' => 'ladygaga',
				'format' => 'array'
			));

			if (isset($ladygaga_results[0]))
			{
				$ladygaga_results = array(
					'name' => $ladygaga_results[0]['user']['name'],
					'screen_name' => $ladygaga_results[0]['user']['screen_name'],
					'tweet' => $ladygaga_results[0]['text'],
					'profile_img' => $ladygaga_results[0]['user']['profile_image_url'],
				);
			}
			
			Cache::put('ladygaga_results', $ladygaga_results, 15); //15 minutes
		}

		return Response::json(array('results' => array($katyperry_results, $obama_results, $ladygaga_results)));
	}


}
