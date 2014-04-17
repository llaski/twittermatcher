<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

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
		//hit "website" (any datasource) for top twitter accounts
		//parse results to clean up screenames
		//store screennames in database (use sqlite for now)
		$accounts = DB::select('select * from twitter_account');
		print_r($this->option('num-accounts'));
		print_r($accounts);
		exit;
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
			array('num-accounts', null, InputOption::VALUE_OPTIONAL, 'Num Accounts', 100),
		);
	}

}
