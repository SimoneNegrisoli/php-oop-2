<main>

    <?php
    include(__DIR__.'/../Model/Movie.php');
    ?>

    <div class="row gy-4">
        <?php
        foreach($movies as $movie) {
            $movie->printCard();
        }
        ?>
    </div>



</main>