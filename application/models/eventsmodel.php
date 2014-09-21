<?php

class EventsModel extends Model
{
    /**
     * returns an array of events that are a certain distance away from a given location
     * @param  double  $latitude 
     * @param  double  $longitude
     * @param  integer $distance 
     * @return array             array of locations
     */
    public function getEventsByLocation($latitude,$longitude,$distance=1){
        try{
            $sql = "SELECT *, (SELECT count(t.id) from tickets as t WHERE t.sessionid = :sessionid AND t.eventid = e.id) as hasticket from events as e WHERE  (e.endtime > :timet) AND POW((( If(:latitude > latitude , :latitude-latitude,latitude-:latitude))*110.54),2)+POW((IF(:longitude>longitude, :longitude-longitude, longitude-:longitude)*111.320*COS(latitude)),2) < POW(:distance,2)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':sessionid'=>session_id(),':latitude'=>$latitude,':longitude'=>$longitude,':distance'=>$distance,':timet'=>date('Y-m-d H:i:s')));
        }catch (Exception $e){
            throw new Exception("Error trying to get events by latitude and longitude");
        }
        return $query->fetchAll();
    }

    /**
     * Gets event information based on event code
     */
    public function getEventByCode($code)
    {
        try{
            $sql = "SELECT * FROM events WHERE code = :code";
            $query = $this->db->prepare($sql);
            $query->execute(array(':code'=>$code));
        }catch (Exception $e){
            throw new Exception("Error trying to get event by code");
        }
        return $query->fetch();
    }

    /**
     * Gets event information based on event id
     */
    public function getEventById($id)
    {
        try{
            $sql = "SELECT * FROM events WHERE id = :id";
            $query = $this->db->prepare($sql);
            $query->execute(array(':id'=>$id));
        }catch (Exception $e){
            throw new Exception("Error trying to get event by id");
        }
        return $query->fetch();
    }
}
