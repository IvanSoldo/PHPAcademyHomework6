<?php

class Dog {

    private $name;
    private $breed;

    /**
     * Dog constructor.
     * @param $name
     * @param $breed
     */
    public function __construct($name = null, $breed = null)
    {
        $this->name = $name;
        $this->breed = $breed;
    }

    public function __get($name)
    {
        return $this->$name ?? null;
    }

    /**
     * @param $name
     * @param $value
     * @throws Exception
     */
    public function __set($name, $value)
    {

        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new Exception ("Property $name doesn't exist. ");
        }
    }


}

$dog = new Dog('Luna');
var_dump($dog);
echo '<br>';

var_dump($dog->a);
echo '<br>';

try {
    $dog->age = 19;
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '<br>';
var_dump($dog);
echo '<br>';

try {
    $dog->breed = 'Labrador';
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($dog);




