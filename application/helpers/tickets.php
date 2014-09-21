<?php
class Tickets{
    /**
     * returns ticket information if it exists for user or 
     * @param  int $eventId event id
     * @return JSON          event information
     */
    public function getTicket($eventid){
        $sessionid = session_id();
        $ticketmodel = $this->getModel("ticketsmodel");
        return $ticketmodel->getUserTicketByEventId($eventid,$sessionid);
    }
}