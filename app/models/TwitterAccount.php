<?php

class TwitterAccount extends \Eloquent {
	protected $table = 'twitter_account';
	protected $fillable = ['screen_name'];

	public static function getShuffledAccounts($num_accounts = 10)
	{
		return self::select('screen_name')->orderBy(DB::raw('RANDOM()'))->take($num_accounts)->get();
	}
}