<?php

interface Subject // Publisher
{
	public function attach(Observer $observer);
	public function detach($index);
	public function notify();
}


interface Observer // Subscriber
{
	public function handle();
}

class Auth implements Subject
{
	/**
	 * We can actually extract the Subject behaviour to trait so it can be used in other classes
	 * @var Observer[]
	 */
	protected $observers = [];

	public function attach(Observer $observer)
	{
		$this->observers[] = $observer;
	}

	public function detach($index)
	{
		unset($this->observers[$index]);
	}

	public function notify()
	{
		foreach ($this->observers as $observer){
			$observer->handle();
		}
	}

	public function authenticate()
	{
		/**
		 * do the login stuff here
		 */

		/**
		 * after that we can trigger the attached opservers
		 */
		$this->notify();
	}
}

class LogHandler implements Observer
{
	public function handle()
	{
		var_dump('log something important');
	}
}

class EmailNotifier implements Observer
{
	public function handle()
	{
		var_dump('trigger email');
	}
}

$auth = new Auth();
$auth->attach(new LogHandler);
$auth->attach(new EmailNotifier);