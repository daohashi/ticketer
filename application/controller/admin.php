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
	private function _validate(){
		if(!isset($_SESSION['verified'])){
			die("You must be a verified to access this action");
		}
	}

	/**
	 * try to verify with the given code
	 */
	public function verify($code){
		$result=0;
		if(isset($_SESSION['verifiedid'])&&isset($_SESSION['verified'])){
			$result=1;
		}else{
			$eventsmodel = $this->loadModel("eventsmodel");
			$event = $eventsmodel->getEventByCode($code);
			if(isset($event['id'])){
				$_SESSION['verified']=1;
				$_SESSION['verifiedid']=$event['id'];
				$result=1;
			}else{
				$result=0;
			}
		}
		echo json_encode($result);
	}

	/**
	 * Generates a ticket for someone without a phone
	 * @return JSON data wrt the ticket
	 */
	public function produceTicket(){
		$this->_validate();
		$wordhelper = $this->loadHelper("words");
		$word = $wordhelper->getWord();

		
	}
}
