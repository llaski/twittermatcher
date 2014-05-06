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
        return $this->game_data->take($num_accounts)->get()->toArray();
        return $this->game_data->orderBy(DB::raw('RAND()'))->take($num_accounts)->get()->toArray();
    }

    public function createOrUpdateAccount($data)
    {
        //This method is not well optimized for the purpose of creating rows in the event of duplicate unique indexes - find different way or write custom method/query
        $account = $this->game_data->where('screen_name', $data['screen_name'])->first();
        if ($account && $account->exists)
        {
            $account->tweet = $data['tweet'];
            $account->tweet_time = $data['tweet_time'];
            $account->save();
            return $account;
        }
        else
            return $this->game_data->create($data);
    }
}
