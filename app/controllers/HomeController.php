<?php

use TwitterMatcher\GameData\GameDataRepositoryInterface as GameDataRepository;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function __construct(GameDataRepository $game_data)
    {
        $this->game_data = $game_data;
    }

	public function index()
	{
        $game = $this->game_data->getShuffledData();

		return View::make('index')
            ->with('game_data', $game);
	}

}
