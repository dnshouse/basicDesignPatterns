<?php

abstract class HomeChecker
{
	public abstract function check(HomeStatus $homeStatus);
}

class Locks extends HomeChecker
{
	public function check(HomeStatus $homeStatus){
		if($homeStatus->locked !== true){
			throw new Exception('The doors are not locked.');
		}
	}
}

class Lights extends HomeChecker
{
	public function check(HomeStatus $homeStatus){
		if($homeStatus->lightsOff !== true){
			throw new Exception('The lights are not off.');
		}
	}
}

class Alarm extends HomeChecker
{
	public function check(HomeStatus $homeStatus){
		if($homeStatus->alarmOn !== true){
			throw new Exception('The alarm is off.');
		}
	}
}

class HomeStatus
{
	public $alarmOn = true;
	public $locked = true;
	public $lightsOff = true;


}