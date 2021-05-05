<?php

class TourOperatorManager {

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function add(TourOperator $tourOperator)
  {
    
    $q = $this->db->prepare('INSERT INTO tour_operators (name, link, grade, is_premium) VALUES(:name, :link, :grade, :is_premium)');
    
    $q->bindValue(':name', $tourOperator->getName());
    $q->bindValue(':link', $tourOperator->getLink());
    $q->bindValue(':grade', $tourOperator->getGrade());
    $q->bindValue(':is_premium', $tourOperator->isIsPremium());
    
    $q->execute();
    
    $tourOperator->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }

  public function getList()
  {
    $tourop = [];

    $q = $this->db->prepare('SELECT tour_operators.* FROM `tour_operators`');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {

      array_push($tourop,new TourOperator($donnees));

    }

      return $tourop;
  }

  

  public function getMoyenne(TourOperator $tour_operator)
  {

    $q = $this->db->prepare('SELECT AVG (note) FROM reviews WHERE id_tour_operator =?');
    $q->execute([intval($tour_operator->getId())]);
    
  }

  public function addGrade(TourOperator $tourOperator)
  {
    $q = $this->db->prepare('INSERT INTO tour_operators (grade) VALUES(:grade)');
    
    $q->bindValue(':grade', $this->getMoyenne($tourOperator));
    $q->execute();
    
  }

}