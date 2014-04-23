<?php namespace TwitterMatcher\GameData;

use GameData;
use DB;

class EloquentGameDataRepository implements GameDataRepositoryInterface {

    protected $game_data;

    public function __construct(GameData $game_data)
    {
        $this->game_data = $game_data;
    }

    public function getShuffledData($num_accounts = 10)
    {
        return $this->game_data->select('screen_name')->orderBy(DB::raw('RAND()'))->take($num_accounts)->get()->toArray();
    }
}