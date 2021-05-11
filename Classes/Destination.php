<?php 

class Destination {

    
    protected $id;
    protected string $location;
    protected string $img;
    protected string $description;
    protected int $price;
    protected int $id_tour_operator;


    /* CONSTRUCT */

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    /* HYDRATE */

    public function hydrate($donnees){
        foreach ($donnees as $key =>$value) {
        
            $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
        }
    }

    /* GETTER SETTER */

    public function getId (){
        return $this->id;
    }

    public function setId ($id){
        $this->id = $id;
    }

    public function getImg (){
        if (isset($this->img)) {
            return $this->img;
        }else{
            return null;
        }
    }

    public function setImg ($img){
        $this->img = $img;
    }

    public function getDescription (){
        if (isset($this->description)) {
            return $this->description;
        }else{
            return null;
        }
    }

    public function setDescription ($description){
        $this->description = $description;
    }

    public function getLocation (){
        return $this->location;
    }

    public function setLocation ($location){
        $this->location = $location;
    }

    public function getPrice (){
        return $this->price;
    }

    public function setPrice ($price){
        $this->price = $price;
    }

    public function getIdTourOperator (){
        return $this->id_tour_operator;
    }

    public function setId_tour_operator ($id_tour_operator){
        $this->id_tour_operator = $id_tour_operator;
    }

}
