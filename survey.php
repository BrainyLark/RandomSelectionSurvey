<?php

    if (isset($_GET["lang"]) && $_GET["lang"] == 'mn') {
        $shape = array('circ' => 'Дугуй', 'rect' => 'Тэгш өнцөгт', 'moon' => 'Тал дугуй');
        $material = array('suede' => 'Илэг', 'vegan' => 'Веган (100%)', 'faux' => 'Хиймэл арьс', 'fullgrain' => 'Арьс');
        $price = array('39.99' => '₮39\'000', '79.99' => '₮79\'000', '129.99' => '₮129\'000');
        $txt_thick = "Арьсны зузаан: ";
        $txt_volume = "Талбай ✕ Гүн: ";
        $txt_choose = "Энийг авмаар байна!";
        $txt_inst = "Доор санал болгосон 4 сонголтоос авмаар байгаа нэгийг сонгоорой.";
        $txt_submit = "Саналаа илгээх!";
    } else {
        $shape = array('circ' => 'Circular', 'rect' => 'Rectangular', 'moon' => 'Half-moon');
        $material = array('suede' => 'Suede', 'vegan' => '100% Vegan', 'faux' => 'Faux', 'fullgrain' => 'Top-grain');
        $price = array('39.99' => 39.99, '79.99' => 79.99, '129.99' => 129.99);
        $txt_thick = "Thickness: ";
        $txt_volume = "Area ✕ Depth: ";
        $txt_choose = "I want this!";
        $txt_inst = "Pick one of the following 4 alternates that you would like to have in your possession.";
        $txt_submit = "Submit my response!";
    }

    $color = array('light' => 'light', 'burgcar' => 'caramel', 'black' => 'dark');
    $volume = array('mini' => '35.56cm ✕ 1.725cm', 'medium' => '44.5cm ✕ 2.875cm');
    $thickness = array('1.625' => 1.625, '1.875' => 1.875, '2.125' => 2.125);
    $figure = array('light' => array('circ' => 'light_circ.jpg', 'rect' => 'light_rect.png', 'moon' => 'light_moon.jpeg'), 'black' => array('circ' => 'black_circ.jpg', 'rect' => 'black_rect.png', 'moon' => 'black_moon.jpg'), 'burgcar' => array('circ' => 'tan_circ.jpg', 'rect' => 'tan_rect.png', 'moon' => 'tan_moon.jpeg'));

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>ZoloArts: Experimental Platform</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: "PT Sans Narrow", sans-serif;
            }
        </style>
    </head>
    <body>
        <br>
        <div class="container">
            <form method="post" action="response.php">
                <?php

                for($i = 1; $i <= 15; $i ++) { ?>
                <br><center><h1><b><?php echo $i; ?>. <?php echo $txt_inst; ?></b></h1></center><br>

                <div class="columns is-mobile is-multiline">

                    <div class="column is-2-desktop is-1-tablet is-0-mobile">
                    </div>

                    <?php for($j = 1; $j <= 4; $j ++) {
                        $rand_color = array_rand($color, 1);
                        $rand_shape = array_rand($shape, 1);
                        $rand_mater = array_rand($material, 1);
                        $rand_volum = array_rand($volume, 1);
                        $rand_price = array_rand($price, 1);
                        $rand_thick = array_rand($thickness, 1);
                    ?>

                    <input type='hidden' name='question-<?php echo $i?>:alt-<?php echo $j?>:color' value='<?php echo $rand_color; ?>'>
                    <input type='hidden' name='question-<?php echo $i?>:alt-<?php echo $j?>:shape' value='<?php echo $rand_shape; ?>'>
                    <input type='hidden' name='question-<?php echo $i?>:alt-<?php echo $j?>:mater' value='<?php echo $rand_mater; ?>'>
                    <input type='hidden' name='question-<?php echo $i?>:alt-<?php echo $j?>:volum' value='<?php echo $rand_volum; ?>'>
                    <input type='hidden' name='question-<?php echo $i?>:alt-<?php echo $j?>:thick' value='<?php echo $rand_thick; ?>'>
                    <input type='hidden' name='question-<?php echo $i?>:alt-<?php echo $j?>:price' value='<?php echo $rand_price; ?>'>

                    <div class="column is-2-desktop is-5-mobile">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-1by1">
                                    <img src="./assets/<?php echo $figure[$rand_color][$rand_shape];?>" alt="Placeholder image">
                                </figure>
                            </div>

                            <div class="card-content">
                                <div class="content">
                                    <span class="icon-text has-text-dark">
                                        <span class="icon">
                                            <i class="fas fa-layer-group"></i>
                                        </span>
                                        <span><b><?php echo $material[$rand_mater].' ('.$shape[$rand_shape].')'; ?></b></span>
                                    </span><br>
                                    <span class="icon-text has-text-danger">
                                        <span class="icon">
                                            <i class="fas fa-shopping-bag"></i>
                                        </span>
                                        <span><b><?php echo $txt_thick . $thickness[$rand_thick]; ?> mm</b></span>
                                    </span><br>
                                    <span><?php echo $txt_volume . $volume[$rand_volum]; ?></span>
                                    <br>
                                    <img class="shades" src="./assets/<?php echo $color[$rand_color];?>.png">
                                    <br>
                                    <span class="tag is-danger is-light">
                                        <span class="icon">
                                            <i class="fas fa-coins"></i>
                                        </span>
                                        <span><b>$ <?php echo $price[$rand_price]; ?></b></span>
                                    </span><br>
                                    <label class="radio">
                                        <input type="radio" name="ans:<?php echo $i; ?>" value="<?php echo $j;?>">
                                            <b><?php echo $txt_choose; ?></b>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php }?>
                </div>
                <?php } ?>
                <center><input type="submit" class="button is-large is-link is-rounded" value="<?php echo $txt_submit; ?>"></center>
            </form>
            <br>
            <br>
        </div>

    </body>
</html>
