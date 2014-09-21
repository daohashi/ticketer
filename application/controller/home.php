<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';

    }

    public function owner()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/owner.php';
        require 'application/views/_templates/footer.php';
        
    }

    public function ticket()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/ticket.php';
        require 'application/views/_templates/footer.php';
        
    }
    public function description()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/description.php';
        require 'application/views/_templates/footer.php';
        
    }

    public function getEvents($latitude,$longitude){
    	echo json_encode(array(
		    		array('id'=>1,'title'=>"TITLE1",'description' => "description1"),
    				array('id'=>2,'title'=>"TITLE2",'description' => "description2"),
    				array('id'=>3,'title'=>"TITLE4",'description' => "description3")
    			));
    }

    /**
     * returns ticket information if it exists for user or 
     * @param  int $eventId event id
     * @return JSON          event information
     */
    public function getEventPageInfo($eventid){

        $sessionid = session_id();
        $ticketmodel = $this->loadModel("ticketsmodel");
        $ticket = $ticketmodel->getUserTicketByEventId($eventid,$sessionid);

        require 'application/views/_templates/header.php';
        if(isset($ticket['id'])){
            require 'application/views/home/ticket.php';
        }else{
            $event = $this->loadModel("eventsmodel")->getEventById($eventid);
            require 'application/views/home/event.php';
        }
        require 'application/views/_templates/footer.php';
    }

    
}
