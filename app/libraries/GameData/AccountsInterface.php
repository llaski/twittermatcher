<?php namespace GameData;

interface AccountsInterface {

	public function __construct($num_accounts = 10);
	public function getAccountData();

}