<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use TwitterMatcher\GameData\RetrieveGameDataRepositoryInterface as DataRetriever;

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
	protected $description = 'Retrieve\'s the top Twitter Accounts (Max/Default is 10)';

	protected $data_retriever;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(DataRetriever $data_retriever)
	{
		parent::__construct();

		$this->data_retriever = $data_retriever;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		if ( ! $this->validateOptions()) exit;

		$this->info('Retrieving Account Screennames from source...');
		$accounts = $this->data_retriever->getAccountData($this->option('num-accounts'));
		$this->info('Storing Account Data...');
		$this->data_retriever->storeAccountData($accounts);
		$this->info('Complete.');
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

	/**
	 * Validate Options
	 * @return boolean
	 */
	private function validateOptions()
	{
		$result = true;
		if (!is_numeric($this->option('num-accounts')) || $this->option('num-accounts') > 100)
		{
			$result = false;
			$this->error('Invalid Num Accounts Value.');
		}

		return $result;
	}

}
