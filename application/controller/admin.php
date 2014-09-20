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
		if(!isset($_SESSION['owner'])){
			die("You must be a verified event planner to access this action");
		}
	}

	function produceTicket(){
		
	}
}
