<?php
//include __DIR__ . '/Model/Genre.php';
class Movie
{
    private $id;
    private $title;
    private $overview;
    private $vote_average;
    private $poster_path;
    private $original_language;


    function __construct($id, $title, $overview, $vote, $image, $language)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->original_language = $language;
    }

    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }


    public function getFlag($language)
    {
        $flags = ['de', 'fr', 'it', 'jp', 'kr', 'es', 'uk'];
        if (in_array($language, $flags)) {

            return "/php-oop-1/img/{$language}.png";
        } else {
            return "/php-oop-1/img/fake.png";
        }
    }


    public function printCard()
    {
        $image = $this->poster_path;
        $title = $this->title;
        $content = substr($this->overview, 0, 100) . '...';
        $custom = $this->getVote();
        $language = $this->original_language;
        $flag = $this->getFlag($language);
        include __DIR__ . '/../Views/card.php';
    }
}


$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];
foreach ($movieList as $item) {
    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language']);
}



?>

<!-- //per stampare il primo titolo di un film

//var_dump($movies[0]->title);

//se le variabili sono private le possono leggere e scrivere solo all'interno della classe, quindi per leggerle
all'esterno della classe

//1 mi faccio una funzione pubblica dentro la classe la chiamo print card
//2 importo la card



// public function hasFlag($language)
    // {
    //     $flags = ['de', 'fr', 'it', 'jp', 'kr', 'es', 'uk'];
    //     return in_array($language, $flags);
    // }
    // public function getFlag($language)
    // {
    //     $flag = "/../img/{$language}.png";
    //     return $flag;
    // }
-->