<?php

class Reservation{

    private $reservationID,$reservationDate,$begin,$end,$userID,$caravanID;

    public function reservation($userID,$caravanID,$begin,$end){
        $this->userID = $userID;
        $this->ReservationDate = $reservationDate;
        $this->begin = $begin;
        $this->end = $end;
        $this->userID = $userID;
        $this->caravanID = $caravanID;
    }
}

?>