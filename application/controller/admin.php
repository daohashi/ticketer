<?php

/**
 * Class admin
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Admin extends Controller
{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['verified'])){
			die("You must be a verified event planner to access this action");
		}
	}

	/**
	 * Generates a ticket for someone without a phone
	 * @return JSON data wrt the ticket
	 */
	public function produceTicket(){
		$wordhelper = $this->loadHelper("words");
		$word = $wordhelper->getWord();

		
	}
}
