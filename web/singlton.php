<?php
//-- Singlton
/* class someClass {
    protected static $_instance; 

        private function __construct() {  
        echo '123';      
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;   
        }
 
        return self::$_instance;
    }
    public function newPhrase(){
        return 'dop';
    }
  
    private function __clone() {
    }

    private function __wakeup() {
    }     
}
someClass::getInstance();
someClass::getInstance();
echo someClass::getInstance()->newPhrase();
echo someClass::getInstance()->newPhrase();*/


//-- Позднее и ранее статическое связывание
class Beer {
  const NAME = 'Beer!';
  public function getName() {
      return self::NAME;
  }
  public function getStaticName() {
      return static::NAME;
  }
}

class Ale extends Beer {
  const NAME = 'Ale!';
}

$beerDrink = new Beer;

$aleDrink = new Ale;

echo "Beer is: " . $beerDrink->getName() ."\n";
echo "Ale is:  " . $aleDrink->getName()  ."\n";

echo "Beer is actually: " . $beerDrink->getStaticName() ."\n";
echo "Ale is actually:  " . $aleDrink->getStaticName()  ."\n";

?>