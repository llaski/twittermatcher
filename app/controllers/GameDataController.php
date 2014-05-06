<?php

use TwitterMatcher\GameData\GameDataRepositoryInterface as GameDataRepository;

class GameDataController extends \APIController {

	protected $game_data;
    private $time = 3;
    private $time_units = 'minutes';

	public function __construct(GameDataRepository $game_data)
	{
		$this->game_data = $game_data;
	}

	public function getRandomGameData()
	{
		$game = $this->game_data->getShuffledData();

		return $this->response(array(
            'accounts' => $game,
            'time_to_solve' => $this->time.' '.$this->time_units,
            'end_time' => date('Y-m-d h:i:s', strtotime('+'.$this->time.' '.$this->time_units))
        ));
	}

}
