<?php
class Product {
    protected $name;
    protected $price;
    protected $discount;

    public function __construct($name, $price, $discount) {
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }
}

class CDMusic extends Product {
    private $artist;
    private $genre;

    public function __construct($name, $price, $discount, $artist, $genre) {
        parent::__construct($name, $price, $discount);
        $this->artist = $artist;
        $this->genre = $genre;
    }

    public function getArtist() {
        return $this->artist;
    }

    public function setArtist($artist) {
        $this->artist = $artist;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }
}

class CDRack extends Product {
    private $capacity;
    private $model;

    public function __construct($name, $price, $discount, $capacity, $model) {
        parent::__construct($name, $price, $discount);
        $this->capacity = $capacity;
        $this->model = $model;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }
}

// Simulasi untuk CDMusic
$cdMusic = new CDMusic('The Album', 1000, 10, 'Blackpink', 'Kpop');

print "CD Music:\n";
print "Name: " . $cdMusic->getName() . "\n";
print "Price: " . $cdMusic->getPrice() . "\n";
print "Discount: " . $cdMusic->getDiscount() . "%\n";
print "Artist: " . $cdMusic->getArtist() . "\n";
print "Genre: " . $cdMusic->getGenre() . "\n\n";


// Simulasi untuk CDRack
$cdRack = new CDRack('Rack 1', 500, 0, 20, 'Model X');

print "CD Rack:\n";
print "Name: " . $cdRack->getName() . "\n";
print "Price: " . $cdRack->getPrice() . "\n";
print "Discount: " . $cdRack->getDiscount() . "%\n";
print "Capacity: " . $cdRack->getCapacity() . "\n";
print "Model: " . $cdRack->getModel() . "\n";

?>
