<?php namespace TwitterMatcher\GameData;

interface GameDataRepositoryInterface {

    public function getShuffledData($num_accounts = 10);

}