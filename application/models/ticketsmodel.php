<?php

class TicketsModel extends Model
{

    /**
     * creates a ticket for the user at the given event
     */
    public function enterTicket($isactive,$eventid,$number,$ip,$code,$sessionid){
        try{

            $sql2 = "UPDATE events SET count=count+1 WHERE id = :eventid";
            $query2 = $this->db->prepare($sql2);
            $query2->execute(array(':eventid'=>$eventid));

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

    public function deactivateTicket($ticketid){
        try{
             $sql2 = "UPDATE events SET count=count-1 WHERE id = :eventid";
            $query2 = $this->db->prepare($sql2);
            $query2->execute(array(':eventid'=>$eventid));

            $sql = "UPDATE tickets SET isactive=0 WHERE id = :tickid";
            $query = $this->db->prepare($sql);
            $query->execute(array(':tickid'=>$ticketid));
        }catch (Exception $e){
            throw new Exception("Could not deactivate given ticket");
        }
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

    /**
     * Get next users ticket information
     */
    public function getNextTicket($eventid)
    {
        try{
            //get the oldest ticket still active
            $sql = "SELECT * FROM tickets WHERE eventid = :eventid AND isactive = 1 ORDER BY id ASC";
            $query = $this->db->prepare($sql);
            $query->execute(array(':eventid'=>$eventid));
        }catch (Exception $e){
            throw new Exception("Could not select a ticket");
        }
        return $query->fetch();
    }
}
