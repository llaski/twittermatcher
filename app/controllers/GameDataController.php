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
		$game = $this->game_data->getShuffledData();
		return $this->response($game);
	}

}