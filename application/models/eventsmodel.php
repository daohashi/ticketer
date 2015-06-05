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
            $sql = "SELECT *, (SELECT count(t.id) from tickets as t WHERE t.sessionid = :sessionid AND t.eventid = e.id) as hasticket from events as e WHERE  (e.endtime > :timet) AND 
                        acos(sin(latitude * 0.0175) * sin(:latitude * 0.0175) 
                           + cos(latitude * 0.0175) * cos(:latitude * 0.0175) *    
                             cos((:longitude * 0.0175) - (longitude * 0.0175))
                          ) * 3959 <= 1";            
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

    public function createEvent($eventInfo)
     {
        $data = json_decode($eventInfo);
        // echo $data->Name;
        // echo $data->Description;
        // echo $data->Code;
        // echo $data->Latitude;
        // echo $data->Longitude;
        try{
             $sql = "INSERT INTO events (name,latitude,longitude,description,time,issuetime,endtime,code) 
             VALUES (:name , :latitude , :longitude, :description , :time , :issuetime, :endtime, :code)";
            $query = $this->db->prepare($sql);
            $query->execute(
                                                array(
                                                    ':name'  =>$data->Name,
                                                    ':latitude'   =>$data->Latitude,
                                                    ':longitude'    =>$data->Longitude,
                                                    ':description'       => $data->Description,
                                                    ':time'      => date("Y-m-d H:i:s"),
                                                    ':issuetime' => date("Y-m-d H:i:s"),
                                                    ':endtime' =>date("Y-m-d H:i:s", strtotime('+5 years')),
                                                    ':code' =>$data->Code)
                                        );
        }catch (Exception $e){
            throw new Exception("Error Creating Event");
        }
     
    }
}
