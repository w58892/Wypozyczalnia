<?php

/**
 * Zawiera metody do których dostęp mają jedynie zalogowani użytkownicy
 */


class Client extends User
{

  /**
   * Użytkownik tworzy rezerwację przyczepy w wybranym terminie
   */
  public function addReservation($modelID,$begin,$end){

    $db = SingletonDB::getInstance();

    $data=date("Y-m-d");
    if($begin>$end||$begin<$data)
      return '{"date":"wrong"}';
    
    $sth = $db->query('SELECT caravans.* FROM caravans LEFT JOIN (SELECT caravans.caravanID FROM caravans INNER JOIN reservations ON 
      reservations.caravanID = caravans.caravanID WHERE caravans.modelID=:modelID AND reservations.end > :begin
      AND reservations.begin < :end ) as t2 ON caravans.caravanID = t2.caravanID WHERE caravans.modelID=:modelID AND t2.caravanID IS NULL LIMIT 1');
    
    $sth->bindValue(':modelID', $modelID, PDO::PARAM_STR);
    $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
    $sth->bindValue(':end', $end, PDO::PARAM_STR);
    $sth->execute();
    
    if ($sth->rowCount() > 0) {
      foreach ($sth as $row) {
        $caravanID = $row['caravanID'];
      };
          
      $sth = $db->query('INSERT INTO reservations (begin, end, userID, caravanID) VALUE (:begin,:end,:userID,:caravanID)');
      $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
      $sth->bindValue(':end', $end, PDO::PARAM_STR);
      $sth->bindValue(':userID', $_SESSION['userID'], PDO::PARAM_INT);        
      $sth->bindValue(':caravanID', $caravanID, PDO::PARAM_INT);
      $res = $sth->execute();
    
      if ($res == true) 
        return '{"success":"true"}';
    }else
        return '{"available":"false"}';
  }
    
  public function modifyReservation($begin,$end,$caravanID,$reservationID){
    $db = SingletonDB::getInstance();
    
    $sth = $db->query('UPDATE reservations SET begin=:begin,end=:end,caravanID=:caravanID WHERE reservationID=:reservationID');
    $sth->bindValue(':begin', $begin, PDO::PARAM_STR);
    $sth->bindValue(':end', $end, PDO::PARAM_STR);
    $sth->bindValue(':caravanID', $caravanID, PDO::PARAM_INT);
    $sth->bindValue(':reservationID', $reservationID, PDO::PARAM_INT);
    $mod = $sth->execute();
    if($mod == true)
      return '{"success":"true"}';
    else
      return '{"success":"fail"}';
  }
    
  /**
   * Użytkownik usuwa rezerwację
   */
  public function deleteReservation($reservationID){
    
    $db = SingletonDB::getInstance();
        
    $sth = $db->query('DELETE FROM reservations WHERE reservationID=:reservationID');
    $sth->bindValue(':reservationID', $reservationID, PDO::PARAM_INT);
    $del = $sth->execute();
    
    if($del == true)
    die ('{"success":"true"}');
    else
      return '{"success":"fail"}';
  }
}