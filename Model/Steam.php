<?php
include __DIR__.'/Product.php';

class Steam extends Product {
    private $name;
    private $playtime_forever;
    private $img_icon_url;



    function __construct($name, $image, $playtime, $quantity, $price) {

        parent::__construct($quantity, $price);
        $this->name = $name;
        $this->playtime_forever = $playtime;
        $this->img_icon_url = $image;

    }


    public function printCard() {
        $image = $this->img_icon_url;
        $title = $this->name;
        $content = $this->playtime_forever;
        $quantity = $this->quantity;
        $price = $this->price;
        include __DIR__.'/../Views/card.php';
    }
}


$gameString = file_get_contents(__DIR__.'/steam_db.json');
$gameList = json_decode($gameString, true);
$games = [];
foreach($gameList as $item) {
    $quantity = rand(2, 10);
    $price = rand(4, 20);

    $games[] = new Steam($item['name'], $item['img_icon_url'], $item['playtime_forever'], $quantity, $price);
}



?>