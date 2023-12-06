
<?php
include __DIR__ .'/Product.php';

class Book extends Product {
    private $id;
    private $title;
    private $longDescription;
    private $thumbnailUrl;



    function __construct($title, $image , $longDescription, $quantity, $price) {

        parent::__construct($quantity, $price);
        $this->title = $title;
        $this->longDescription = $longDescription;
        $this->thumbnailUrl = $image;

    }


    public function printCard() {
        $image = $this->thumbnailUrl;
        $title = $this->title;
        $content = substr($this->longDescription, 0, 100).'...';
        $quantity = $this->quantity;
        $price = $this->price;
        include __DIR__.'/../Views/card.php';
    }
}


$bookString = file_get_contents(__DIR__.'/books_db.json');
$bookList = json_decode($bookString, true);
$books = [];
foreach($bookList as $item) {
    $quantity = rand(2,10);
    $price = rand(4,20);

    $books[] = new Book( $item['title'], $item['thumbnailUrl'], $item['longDescription'], $quantity, $price);
}



?>