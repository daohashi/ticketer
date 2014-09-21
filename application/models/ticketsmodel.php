<?php

class TicketsModel extends Model
{

    /**
     * creates a ticket for the user at the given event
     */
    public function enterTicket($isactive,$eventid,$number,$ip,$code,$sessionid){
        try{
            $sql = "INSERT INTO tickets (isactive,eventid,number,ip,code,sessionid) VALUES (:isactive , :eventid , :number, :ip , :code , :sessionid)";
            $query = $this->db->prepare($sql);
            $query->execute(
                                                array(
                                                    ':isactive'  =>$isactive,
                                                    ':eventid'   =>$eventid,
                                                    ':number'    =>$number,
                                                    ':ip'        => $ip,
                                                    ':code'      => $code,
                                                    ':sessionid' =>$sessionid)
                                        );
        }catch (Exception $e){
            throw new Exception("Could not enter a new ticket for this event");
        }
    }

    /**
     * get the ticket count for a certain session and event
     * @param  int $eventid   event id
     * @param  string $sessionid session id
     * @return int            number of tickets
     */
    public function getTotalTicketCount($eventid){
        try{
            $sql = "SELECT count(id) AS amount_of_tickets FROM tickets WHERE eventid = :eventid";
            $query = $this->db->prepare($sql);
            $query->execute(array(':eventid'=>$eventid));
            $num = $query->fetch();
        }catch (Exception $e){
            throw new Exception("Could not check if ticket exists");
        }
        return $num['amount_of_tickets'];
    }

    /**
     * get the ticket count for a certain session and event
     * @param  int $eventid   event id
     * @param  string $sessionid session id
     * @return int            number of tickets
     */
    public function getTicketCount($eventid,$sessionid){
        try{
            $sql = "SELECT count(id) AS amount_of_tickets FROM tickets WHERE eventid = :eventid AND sessionid = :sessionid";
            $query = $this->db->prepare($sql);
            $query->execute();
            $num = $query->fetch();
        }catch (Exception $e){
            throw new Exception("Could not check if ticket exists");
        }
        return $num['amount_of_tickets'];
    }

    /**
     * Get users ticket information by event id
     */
    public function getUserTicketByEventId($eventid,$sessionid)
    {
        try{
            $sql = "SELECT * FROM tickets WHERE eventid = :eventid AND sessionid = :sessionid";
            $query = $this->db->prepare($sql);
            $query->execute(array(':eventid'=>$eventid,':sessionid'=>$sessionid));
        }catch (Exception $e){
            throw new Exception("Could not select a ticket");
        }
        return $query->fetch();
    }
}
