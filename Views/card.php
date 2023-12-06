<div class="col-12 col-md-4 col-lg-3">
    <div class="card mycard-h">
        <img src="<?= $image ?>" class="card-img-top my-ratio mainimg" alt="<?= $title ?>">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title">
                    <?= $title ?>
                </h5>
                <div calss="mycard-bd">
                    <?php if(isset($flag)) { ?>
                        <div class="myflag-c">
                            <img src="<?php echo $flag ?>" alt="" class="myflag">
                        </div>
                    <?php } ?>
                    <?php if(is_numeric($content)) { ?>
                        <div>
                            <p class="card-text">
                                Il tempo di gioco è di:
                                <?= $content ?> ore
                            </p>
                        </div>
                    <?php } ?>
                    <?php if(!is_numeric($content)) { ?>
                        <div>
                            <p class="card-text">
                                <?= $content ?>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if(isset($custom)) { ?>
                        <div class="d-flex justify-content-between ">
                            <?= $custom ?>
                        </div>
                    <?php } ?>


                </div>
            </div>


            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Qantita:
                    <?php echo $quantity ?>
                </div>
                <div>
                    Prezzo:
                    <?php echo $price ?>
                </div>
            </div>
        </div>
    </div>
</div>