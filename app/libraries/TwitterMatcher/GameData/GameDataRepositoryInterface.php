<?php namespace TwitterMatcher\GameData;

interface GameDataRepositoryInterface {

    public function getShuffledData($num_accounts = 10);
    public function getAccountByScreenname($screen_name);
    public function createOrUpdateAccount($data);

}