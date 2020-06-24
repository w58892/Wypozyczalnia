<?php

  /**
   * Przechowuje informacje o rezerwacjach
   */

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

    /**
   * Zwraca ID rezerwacji
   */
    public function getReservationID(){
        return $this->reservationID;
    }
    
    /**
   * Zwraca datę utworzenia rezerwacji
   */
    public function getReservationDate(){
        return $this->reservationDate;
    }

    /**
   * Zwraca datę planowanego wypożyczenia przyczepy
   */
    public function getBegin(){
        return $this->begin;
    }

    /**
   * Zwraca datę planowanego zwrócenia przyczepy
   */
    public function getEnd(){
        return $this->end;
    }

     /**
   * Zwraca ID użytkownika, który utworzył rezerwację
   */
    public function getUserID(){
        return $this->userID;
    }

    /**
   * Zwraca ID zarezerwowanej przyczepy
   */
    public function getCaravanID(){
        return $this->caravanID;
    }
  
}

?>