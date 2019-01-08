<html>
  <body>
    <form name="form" action="" method="get">
      <input type="text" name="location" id="loc" value="zip code">
    </form>
    
    <form name="form" action="" method="get">
      <input type="text" name="bedrooms" id="beds" value="0">
    </form>
        
    <form name="form" action="" method="get">
      <input type="text" name="bathrooms" id="baths" value="0">
    </form>
    <form name="form" action="" method="get">
      <input type="text" name="squarefeet" id="sqft" value="0">
    </form>
    <form name="form" action="" method="get">
      <input type="text" name="description" id="desc" value="describe your home">
    </form>
    <input type="submit" class="button" name="submit" value="submit" />
  </body>
</html>
        // button to call the addhouse function
<?php 
  public $housesUp = [];

  if (isset($_POST['action']) = 'submit') {
    switch ($_POST['action']) {
       addHouse($housesUp);
  }
  class House {
    public $place;
    public $bedrooms;
    public $bathrooms;
    public $sqft;
    public $desc;
  }

  function addHouse($housesUp){
	$newHouse = new House;
    $newHouse->where =  $_GET['loc'];
    $newHouse->bedrooms = $_GET['beds'];
    $newHouse->bathrooms = $_GET['baths'];
    $newHouse->sqft = $_GET['sqft'];
    $newHouse->desc = $_GET['desc'];
    array_push($housesUp, $newHouse);
  }
   function findhouse($requirements, $housesUp){
     // requirements: where, bedrooms, bathrooms, min sqft
     $match;
     $posOfMatchingHouses;
     $posInPOMH = 0;
     for(int i = 0; i < sizeof($housesUp); i++){
       $match = true;
       if(housesUp[i]->where != $requirements[0] && $requirements[0] != '-1'){ // if there is no requirement and it does not match
         $match = false;
       }
       else if (housesUp[i]->bedrooms != $requirements[1] && $requirements[1] != '-1'){//""
          $match = false;
        }
        else if (housesUp[i]->bathrooms != $requirements[2] && $requirements[2] != '-1'){//""
          $match = false;
        }
        else if (housesUp[i]->sqft >= $requirements[3] && $requirements[3] != '-1'){//""
          $match = false;
        }
        if($match){
          $posOfMatchingHouses[$posInPOMH] = i;
          $posInPOMH++;
        }
      }
      // posOfMatchingHouses is now filled with the positions of all the houses that fit the requierments of the search
    }
    
    

?>