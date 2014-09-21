<?php

class EventsModel extends Model
{

    /**
     * Gets event information based on event id
     */
    public function getEventById($id)
    {
        $sql = "SELECT * FROM events WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id'=>$id));
        return $query->fetchAll();
    }
}
