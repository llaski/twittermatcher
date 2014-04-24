<?php namespace TwitterMatcher\GameData;

use GameData;
use DB;

class EloquentGameDataRepository implements GameDataRepositoryInterface {

    protected $game_data;

    public function __construct(GameData $game_data)
    {
        $this->game_data = $game_data;
    }

    public function getAccountByScreenname($screen_name)
    {
        $account = $this->game_data->where('screen_name', $screen_name)->take(1)->get();

        if (isset($account[0]))
            return $account[0];
        else
            return array();
    }

    public function getShuffledData($num_accounts = 10)
    {
        return $this->game_data->orderBy(DB::raw('RAND()'))->take($num_accounts)->get()->toArray();
    }

    public function createAccount($data)
    {
        //This method is not well optimized for the purpose of creating rows in the event of duplicate unique indexes - find different way or write custom method/query
        return $this->game_data->firstOrCreate($data);
    }
}