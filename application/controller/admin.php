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
			die("You must be verified to access this action");
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
	 * unactivates a certain ticket id and sends back a new one
	 * @param  int   $id ticket id
	 */
	public function next($id){
		$this->_validate();
		$ticketmodel = $this->loadModel('ticketsmodel');
		$ticketmodel->deactivateTicket($id);

		$ticket = $ticketmodel->getNextTicket($_SESSION['verifiedid']);
		if(!isset($ticket['id'])){
			$ticket=0;
		}
		echo json_encode($ticket);
	}

	/**
	 * Generates a ticket for someone without a phone
	 * @return JSON data wrt the ticket
	 */
	public function issue(){
		$this->_validate();
		$ticketmodel = $this->loadModel('ticketsmodel');

		$wordhelper = $this->loadHelper("words");
		$word = $wordhelper->getWord();
		$sessionid=session_id();
		$eventid = $_SESSION['verifiedid'];
		$ip=$_SERVER['REMOTE_ADDR'];
	            $count = $ticketmodel->getTotalTicketCount($eventid)+1;

		try{
			$ticketmodel->enterTicket(1,$eventid,$count,$ip,$word,$sessionid);
		}catch(Exception $e){
			die(json_encode(0));
		}

		echo json_encode(array(
				'id'=>$this->db->lastInsertId(),
				'code'=>$word,
				'ip'=>$ip,
				'number'=>$count,
				'session'=>$sessionid,
				'eventid'=>$eventid,
				'isactive'=>1
			));
	}

	public function makeEvent ($eventInfo)
	{
		$eventmodel = $this->loadModel("eventsmodel");
		$result = $eventmodel->createEvent($eventInfo);
		echo "Event Created";
	}
}
