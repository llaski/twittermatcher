<?php namespace TwitterMatcher\GameData;

interface RetrieveGameDataRepositoryInterface {

    public function storeAccountData(array $screen_names);
    public function getAccountData($num_accounts = 10);

}
