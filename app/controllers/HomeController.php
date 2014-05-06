<?php

use TwitterMatcher\GameData\GameDataRepositoryInterface as GameDataRepository;

class HomeController extends BaseController {

    private $time = 3;
    private $time_units = 'minutes';

    public function __construct(GameDataRepository $game_data)
    {
        $this->game_data = $game_data;
    }

	public function index()
	{
        $game = $this->game_data->getShuffledData();

        $game = array(
            'accounts' => $game,
            'time_to_solve' => $this->time.' '.$this->time_units,
            'end_time' => date('Y-m-d h:i:s', strtotime('+'.$this->time.' '.$this->time_units))
        );

		return View::make('index')
            ->with('game_data', $game);
	}

}
