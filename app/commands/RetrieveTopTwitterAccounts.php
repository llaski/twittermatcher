<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use GameData\TwitterAccounts;

class RetrieveTopTwitterAccounts extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:retrieve-top-twitter-accounts';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Retrieve\'s the top Twitter Accounts (Max/Default is 100)';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$account_scraper = new TwitterAccounts($this->option('num-accounts'));
		$accounts = $account_scraper->getAccountData();
		foreach ($accounts as $account)
			TwitterAccount::firstOrCreate(array('screen_name' => $account));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('num-accounts', null, InputOption::VALUE_OPTIONAL, 'Num Accounts', 10),
		);
	}

}
