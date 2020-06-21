<?php

class Reservation{

    private $reservationID,$reservationDate,$begin,$end,$userID,$caravanID;

    public function reservation($reservationID,$reservationDate,$begin,$end,$userID,$caravanID){
        $this->reservationID = $reservationID;
        $this->reservationDate = $reservationDate;
        $this->begin = $begin;
        $this->end = $end;
        $this->userID = $userID;
        $this->caravanID = $caravanID;
    }

    public function getReservationID(){
        return $this->reservationID;
    }
    
    public function getReservationDate(){
        return $this->reservationDate;
    }

    public function getBegin(){
        return $this->begin;
    }

    public function getEnd(){
        return $this->end;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function getCaravanID(){
        return $this->caravanID;
    }
  
}

?>