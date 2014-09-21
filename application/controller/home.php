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

    /**
     * get events close to the latitude and logitude points
     */
    public function getEvents($latitude,$longitude){
    	$eventmodel = $this->loadModel("eventsmodel");
            $events = $eventmodel->getEventsByLocation($latitude,$longitude,5);

            echo json_encode($events);
    }

    /**
     * give user a ticket (checks if user already has a ticket)
     */
    public function getTicket($eventid){
        $sessionid = session_id();
        $ticketmodel = $this->loadModel("ticketsmodel");
        $eventmodel = $this->loadModel("eventsmodel");

        $ticket = $ticketmodel->getUserTicketByEventId($eventid,$sessionid);
        $event = $eventmodel->getEventById($eventid);
        if(isset($ticket['id'])){ //check if ticket exists
            header('Location: '. URL . '/home/eventpageinfo/'.$eventid);
            die();
        }else{
            $wordhelper = $this->loadHelper("words");

            $word = $wordhelper->getWord();
            $count = $ticketmodel->getTotalTicketCount($eventid)+1;
            $ip = $_SERVER['REMOTE_ADDR'];

            $ticketmodel->enterTicket(1,$eventid,$count,$ip,$word,$sessionid);
        }

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        header('Location: '. URL . '/home/eventpageinfo/'.$eventid);
    }

    private function loadEventPageAsAdmin(){
            $eventmodel = $this->loadModel("eventsmodel");
            $ticketmodel = $this->loadModel("ticketsmodel");

            $event = $eventmodel->getEventById($_SESSION['verifiedid']);
            $ticket = $ticketmodel->getNextTicket();


            require 'application/views/_templates/header.php';
            require 'application/views/home/owner.php';
            require 'application/views/_templates/footer.php';
    }

    /**
     * returns ticket information if it exists for user or  the event
     * @param  int $eventId event id
     * @return JSON          event information
     */
    public function eventPageInfo($eventid){

        if(isset($_SESSION['verified']) && $_SESSION['verifiedid']==$eventid){
            $this->loadEventPageAsAdmin();
        }else{
            $sessionid = session_id();
            $ticketmodel = $this->loadModel("ticketsmodel");
            $eventmodel = $this->loadModel("eventsmodel");

            $ticket = $ticketmodel->getUserTicketByEventId($eventid,$sessionid);
            $event = $eventmodel->getEventById($eventid);
            require 'application/views/_templates/header.php';
            if(isset($ticket['id'])){ //check if ticket exists
                require 'application/views/home/ticket.php';
            }else{
                require 'application/views/home/description.php';
            }
            require 'application/views/_templates/footer.php';
        }
    }
}
