<?php

class SomeData {
    private $data = [];


    /**
     * @param $name
     * @param $arguments
     * @return bool|mixed
     * @throws Exception
     */

    public function __call($name, $arguments)
    {
        $methodName = substr($name, 0,3);
        $key = strtolower(substr($name,3));
        $arguments = implode(',', $arguments);

        switch ($methodName) {
            case 'set':
                $this->data[$key] = $arguments;
                break;
            case 'get':
                return $this->data[$key] ?? null;
            case 'has':
                return isset($this->data[$key]);
            case 'uns':
                if (array_key_exists($key, $this->data) ) {
                    unset($this->data[$key]);
                } else {
                    echo "Key doesn't exist.";
                }
                break;
            default :
                throw new Exception("Method not allowed. ");
        }
        return ' ';
    }

}

$data = new SomeData();

try {
    $data->setLastname('Soldo');

    var_dump($data->getFirstname());
    echo '<br>';

    echo $data->getLastname();
    echo '<br>';

    var_dump($data->hasLastname());
    echo '<br>';

    var_dump($data->hasFirstname());
    echo '<br>';

    $data->setFirstname('Ivan');
    echo $data->getFirstname();
    echo '<br>';

    print_r($data);
    echo '<br>';
    $data->unsLastname();
    print_r($data);

    echo '<br>';
    $data->unsAge();

    echo '<br>';
    $data->checkThisMethod();
} catch (Exception $e) {
    echo $e->getMessage();
}








