<?php

interface BookInterface
{
	public function open();

	public function turnPage();
}

interface eReaderInterface
{
	public function turnOn();

	public function pressNextButton();
}

class Book implements BookInterface
{
	public function open()
	{
		var_dump('opening the paper book');
	}

	public function turnPage()
	{
		var_dump('turning the page of the paper book');
	}
}

class Kindle implements eReaderInterface
{
	public function turnOn()
	{
		var_dump('turning on the Kindle');
	}

	public function pressNextButton()
	{
		var_dump('pressing the next button on the Kindle');
	}
}

class eReaderAdapter implements BookInterface
{
	protected $reader;

	public function __construct(eReaderInterface $reader)
	{
		$this->reader = $reader;
	}

	public function open()
	{
		$this->reader->turnOn();
	}

	public function turnPage()
	{
		$this->reader->pressNextButton();
	}
}

class Person
{
	public function read(BookInterface $book)
	{
		$book->open();
		$book->turnPage();
	}
}

(new Person())->read(new Book());
(new Person())->read(new eReaderAdapter(new Kindle()));