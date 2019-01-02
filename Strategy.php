<?php

// encapsulate them and make them interchangeable
interface Logger
{
	public function log($data);
}

// define a family of algorithms
class LogToFile implements Logger
{
	public function log($data)
	{
		var_dump('log to a file');
	}
}

class LogToDatabase implements Logger
{
	public function log($data)
	{
		var_dump('log to database');
	}
}

class LogToXWebService implements Logger
{
	public function log($data)
	{
		var_dump('log to the X web service');
	}
}

// example
class App
{
	public function log($data, Logger $logger)
	{
		$logger->log($data);
	}
}

(new App)->log('some data to be logged', new LogToFile());
