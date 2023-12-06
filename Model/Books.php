<!-- per fare un'unica card avrei dovuto dare le caratteristiche generali della card tipo titolo, immagine e id, a tutte e tre tramite il parent, e poi ad ognuna ci aggiungevo quello che volevo -->



<?php

class Book {
    private $id;
    private $title;
    private $longDescription;
    private $thumbnailUrl;



    function __construct($id, $title, $longDescription, $image) {
        $this->id = $id;
        $this->title = $title;
        //$this->longDescription = $longDescription;
        $this->thumbnailUrl = $image;

    }


    public function printCard() {
        $image = $this->thumbnailUrl;
        $title = $this->title;
        //$content = substr($this->longDescription, 0, 100).'...';
        include __DIR__.'/../Views/card.php';
    }
}


$bookString = file_get_contents(__DIR__.'/books_db.json');
$bookList = json_decode($bookString, true);
$books = [];
foreach($bookList as $item) {
    $books[] = new Book($item['id'], $item['title'], $item['thumbnailUrl']);
}



?>