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
            $sql = "SELECT * from events WHERE  (endtime > :timet) AND POW((( If(:latitude > latitude , :latitude-latitude,latitude-:latitude))*110.54),2)+POW((IF(:longitude>longitude, :longitude-longitude, longitude-:longitude)*111.320*COS(latitude)),2) < POW(:distance,2)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':latitude'=>$latitude,':longitude'=>$longitude,':distance'=>$distance,':timet'=>date('Y-m-d H:i:s')));
        }catch (Exception $e){
            throw new Exception("Error trying to get events by latitude and longitude");
        }
        return $query->fetchAll();
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
