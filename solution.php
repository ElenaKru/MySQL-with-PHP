<?php
interface IElectronicPart {
    public function getSpecs();
}

class ElectronicPart {
    private $manufacturer;
    private $price;
    private $model;
}

class Screen extends ElectronicPart implements IElectronicPart {
    private $size;
    private $panel;

    public function __construct($manufacturer, $price, $model, $panel, $size) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->model = $model;
        $this->panel = $panel;
        $this->size = $size;
    }

    public function getSpecs() {
        return 
            'Screen manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', Price: ' . $this->price;
    }

    public function insert() {
        $host = '127.0.0.1';
        $db   = 'northwind';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);

        $stmt = $pdo->prepare("INSERT into l40_screens (price,
                                                        model,
                                                        size,
                                                        manufacturer)
                                values (:price,
                                        :model,
                                        :size,
                                        :manufacturer)");
        $stmt ->execute(array(  "price" => $this -> price,
                                "model" => $this -> model,
                                "size" => $this -> size,
                                "manufacturer" => $this -> manufacturer,));
    }
}

class Mouse extends ElectronicPart implements IElectronicPart{
    private $isWired;

    public function __construct($manufacturer, $price, $model, $isWired) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->model = $model;
        $this->isWired = $isWired;
    }

    public function getSpecs() {
        return 
            'Mouse manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', Price: ' . $this->price;
    }

    public function insert() {
        $host = '127.0.0.1';
        $db   = 'northwind';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);

        $stmt = $pdo->prepare("INSERT into l40_mouses (price,
                                                        model,
                                                        is_wired,
                                                        manufacturer)
                                values (:price,
                                        :model,
                                        :is_wired,
                                        :manufacturer)");
        $stmt ->execute(array(  "price" => $this -> price,
                                "model" => $this -> model,
                                "is_wired" => $this -> isWired,
                                "manufacturer" => $this -> manufacturer,));
    }

}

class Keyboard extends ElectronicPart implements IElectronicPart{
    private $isWired;

    public function __construct($manufacturer, $price, $model, $isWired) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->model = $model;
        $this->isWired = $isWired;
    }

    public function getSpecs() {
        return 
            'Keyboard manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', Price: ' . $this->price;
    }

    public function insert() {
        $host = '127.0.0.1';
        $db   = 'northwind';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);

        $stmt = $pdo->prepare("INSERT into l40_keyboards (price,
                                                        model,
                                                        isWired,
                                                        manufacturer)
                                values (:price,
                                        :model,
                                        :isWired,
                                        :manufacturer)");
        $stmt ->execute(array(  "price" => $this -> price,
                                "model" => $this -> model,
                                "isWired" => $this -> isWired,
                                "manufacturer" => $this -> manufacturer,));
    }

}

class Computer extends ElectronicPart implements IElectronicPart{
    private $motherboard;
    private $processor;
    private $hardDrive;
    private $ram;
    private $graphicCard;

    public function __construct(
        $manufacturer, $price, $model, 
        $motherboard, $processor, $hardDrive, $ram, $graphicCard) {
        $this->manufacturer = $manufacturer;
        $this->price = $price;
        $this->model = $model;
        $this->motherboard = $motherboard;
        $this->processor = $processor;
        $this->hardDrive = $hardDrive;
        $this->ram = $ram;
        $this->graphicCard = $graphicCard;
    }
    public function getSpecs() {
        return 
            'Computer manufacturer: ' . $this->manufacturer . 
            ', model: '. $this->model . 
            ', Price: ' . $this->price;
    }
}

class purchase {
    private $screen;
    private $mouse;
    private $keyboard;
    private $computer;

    public function __construct($screen, $mouse, $keyboard, $computer) {
        $this->screen = $screen;
        $this->mouse = $mouse;
        $this->keyboard = $keyboard;
        $this->computer = $computer;   
    }

    public function getFullPurchaseDetails() {
        return $this->screen->getSpecs().'<br>'.
                $this->mouse->getSpecs().'<br>'.
                $this->keyboard->getSpecs().'<br>'.
                $this->computer->getSpecs().'<br><br>';
    }
}
?>