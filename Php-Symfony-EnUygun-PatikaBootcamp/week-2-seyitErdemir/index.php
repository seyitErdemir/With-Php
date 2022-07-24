<?php
class  Vehicle
{
    public $plate;
    public $brand;
    public $model;
    public $wheels;
    public $wing;


    // Methods
    function set_plate($plate)
    {
        $this->plate = $plate;
    }
    function get_plate()
    {
        return $this->plate;
    }

    function set_brand($brand)
    {
        $this->brand = $brand;
    }
    function get_brand()
    {
        return $this->brand;
    }

    function set_model($model)
    {
        $this->model = $model;
    }
    function get_model()
    {
        return $this->model;
    }

    function set_wheels($wheels)
    {
        $this->wheels = $wheels;
    }
    function get_wheels()
    {
        return $this->wheels;
    }

    function set_wing($wing)
    {
        $this->wing = $wing;
    }
    function get_wing()
    {
        return $this->wing;
    }
}

class Car extends Vehicle
{


    public function index()
    {
        parent::set_plate('06 ARAC 06');
        parent::set_brand('Mercedes');
        parent::set_model('C180');
        parent::set_wheels('4');
        echo "--------Car---------- " . '<br>';
        echo 'Plaka No: ' .  parent::get_plate() . '<br>';
        echo 'Marka: ' .  parent::get_brand() . '<br>';
        echo 'Model: ' .  parent::get_model() . '<br>';
        echo 'Tekerlek Sayısı:  ' .  parent::get_wheels() . '<br>';
        echo "--------Car----------" . '<br> <br> <br>';
    }
}



class Motorcycle extends Vehicle
{
    public function index()
    {
        parent::set_plate('06 ARAC 06');
        parent::set_brand('Honda');
        parent::set_model('Forza 750');
        parent::set_wheels('2');
        echo "--------Motorcycle---------- " . '<br>';
        echo 'Plaka No: ' .  parent::get_plate() . '<br>';
        echo 'Marka: ' .  parent::get_brand() . '<br>';
        echo 'Model: ' .  parent::get_model() . '<br>';
        echo 'Tekerlek Sayısı:  ' .  parent::get_wheels() . '<br>';
        echo "--------Motorcycle----------" . '<br> <br> <br>';
    }
}

class Airplane extends Vehicle
{
    public function index()
    {
        parent::set_brand('Airbus');
        parent::set_model('A380');
        parent::set_wheels('80m');
        echo "--------Airplane---------- " . '<br>';
        echo 'Marka: ' .  parent::get_brand() . '<br>';
        echo 'Model: ' .  parent::get_model() . '<br>';
        echo 'Kanat Açıklığı:  ' .  parent::get_wheels() . '<br>';
        echo "--------Airplane----------" . '<br> <br> <br>';
    }
}


$car = new Car();
$car->index();

$motorcycle = new Motorcycle();
$motorcycle->index();

$airplane = new Airplane();
$airplane->index();

// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
echo "ikinci kodlar <br> <br> <br> <br>";
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------

abstract class Vehicle1
{

    //abstract method
    public abstract function plate($plate);

    public abstract function brand($brand);

    public abstract function model($model);

    public abstract function wheels($wheels);

    public abstract function wing($wing);
}


class Car1 extends Vehicle1
{

    public function plate($plate)
    {
        echo "Plaka No: " . $plate . "<br>";
    }
    public function brand($brand)
    {
        echo "Marka:" . $brand . "<br>";
    }
    public function model($model)
    {
        echo "Model:" . $model . "<br>";
    }

    public function wheels($wheels)
    {
        echo "Tekerlek Sayısı :" . $wheels . "<br>";
    }
    public function wing($wing)
    {
    }
}

class Motorcycle1 extends Vehicle1
{

    public function plate($plate)
    {
        echo "Plaka No: " . $plate . "<br>";
    }
    public function brand($brand)
    {
        echo "Marka:" . $brand . "<br>";
    }
    public function model($model)
    {
        echo "Model:" . $model . "<br>";
    }

    public function wheels($wheels)
    {
        echo "Tekerlek Sayısı :" . $wheels . "<br>";
    }
    public function wing($wing)
    {
    }
}



class Airplane1 extends Vehicle1
{

    public function plate($plate)
    {
    }
    public function brand($brand)
    {
        echo "Marka:" . $brand . "<br>";
    }
    public function model($model)
    {
        echo "Model:" . $model . "<br>";
    }

    public function wheels($wheels)
    {
    }

    public function wing($wing)
    {
        echo "Kanat Açıklığı: " . $wing . "<br>";
    }
}

echo "--------Car1---------- " . '<br>';
$car = new Car1();
echo $car->plate("06 ARAC 06");
echo $car->brand("Mercedes");
echo $car->model("C180");
echo $car->wheels("4");
echo "--------Car1---------- " . '<br> <br> <br>';


echo "--------Motorcycle1---------- " . '<br>';
$motorcycle = new Motorcycle1();
echo $motorcycle->plate("06 ARAC 06");
echo $motorcycle->brand("Honda");
echo $motorcycle->model("Forza 750");
echo $motorcycle->wheels("2");
echo "--------Motorcycle1---------- " . '<br> <br> <br>';


echo "--------Airplane1---------- " . '<br>';
$airplane = new Airplane1();
echo $airplane->brand("Airbus");
echo $airplane->model("A380");
echo $airplane->wing("80m");
echo "--------Airplane1---------- " . '<br> <br> <br>';


// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
echo "üçüncü  kodlar <br> <br> <br> <br>";
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------


interface   Vehicle2
{
    public    function plate($plate);

    public function brand($brand);

    public  function model($model);
}

interface Wheels
{
    public  function wheels($wheels);
}
interface Wing
{
    public  function wing($wing);
}


class Car2 implements Vehicle2, Wheels
{

    public function plate($plate)
    {
        echo "Plaka No: " . $plate . "<br>";
    }
    public function brand($brand)
    {
        echo "Marka:" . $brand . "<br>";
    }
    public function model($model)
    {
        echo "Model:" . $model . "<br>";
    }

    public function wheels($wheels)
    {
        echo "Tekerlek Sayısı :" . $wheels . "<br>";
    }
}


class Motorcycle2 implements Vehicle2, Wheels
{

    public function plate($plate)
    {
        echo "Plaka No: " . $plate . "<br>";
    }
    public function brand($brand)
    {
        echo "Marka:" . $brand . "<br>";
    }
    public function model($model)
    {
        echo "Model:" . $model . "<br>";
    }

    public function wheels($wheels)
    {
        echo "Tekerlek Sayısı :" . $wheels . "<br>";
    }
}

class Airplane2 implements Vehicle2, Wing
{

    public function plate($plate)
    {
    }
    public function brand($brand)
    {
        echo "Marka:" . $brand . "<br>";
    }
    public function model($model)
    {
        echo "Model:" . $model . "<br>";
    }


    public function wing($wing)
    {
        echo "Kanat Açıklığı: " . $wing . "<br>";
    }
}

echo "--------Car2---------- " . '<br>';
$car = new Car2();
echo $car->plate("06 ARAC 06");
echo $car->brand("Mercedes");
echo $car->model("C180");
echo $car->wheels("4");
echo "--------Car2---------- " . '<br> <br> <br>';


echo "--------Motorcycle2---------- " . '<br>';
$motorcycle = new Motorcycle2();
echo $motorcycle->plate("06 ARAC 06");
echo $motorcycle->brand("Honda");
echo $motorcycle->model("Forza 750");
echo $motorcycle->wheels("2");
echo "--------Motorcycle2---------- " . '<br> <br> <br>';


echo "--------Airplane2---------- " . '<br>';
$airplane = new Airplane2();
echo $airplane->brand("Airbus");
echo $airplane->model("A380");
echo $airplane->wing("80m");
echo "--------Airplane2---------- " . '<br> <br> <br>';