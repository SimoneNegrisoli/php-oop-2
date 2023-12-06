<?php
include __DIR__.'/Product.php';
class Movie extends Product {
    private $id;
    private $title;
    private $overview;
    private $vote_average;
    private $poster_path;
    private $original_language;


    function __construct($id, $title, $overview, $vote, $image, $language, $quantity, $price) {

        parent::__construct($quantity, $price);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->original_language = $language;
    }

    public function getVote() {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }


    public function getFlag($language) {
        $flags = ['de', 'fr', 'it', 'jp', 'kr', 'es', 'uk'];
        if(in_array($language, $flags)) {

            return "/php-oop-1/img/{$language}.png";
        } else {
            return "/php-oop-1/img/fake.png";
        }
    }


    public function printCard() {
        $image = $this->poster_path;
        $title = $this->title;
        $content = substr($this->overview, 0, 100).'...';
        $custom = $this->getVote();
        $language = $this->original_language;
        $flag = $this->getFlag($language);
        $quantity = $this->quantity;
        $price = $this->price;
        include __DIR__.'/../Views/card.php';
    }
}


$movieString = file_get_contents(__DIR__.'/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];



foreach($movieList as $item) {
    $quantity = rand(2, 30);
    $price = rand(5, 20);

    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $quantity, $price);

}
return $movies;


?>