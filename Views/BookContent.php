<?php
include(__DIR__.'/../Model/Books.php');
?>
<header>
    <div class=" navbar navbar-nav">
        <a class="nav-link " href="BookPage.php">Books</a>
        <a class="nav-link" href="index.php">Movie</a>
        <a class="nav-link" href="PlayPage.php">Play</a>
    </div>
</header>


<main>
    <div class="row gy-4">
        <?php
        foreach($books as $book) {
            $book->printCard();
        }
        ?>

    </div>
</main>