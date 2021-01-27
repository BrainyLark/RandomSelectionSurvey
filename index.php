<?php

    $lang = "en";

    if (isset($_GET["lang"]) && $_GET["lang"] == 'mn') {
        $lang = "mn";
        $title = "Тавтай морил!";
        $subtitle = "Сонирхолд тань нийцэх бүс цүнхний санал асуулга!";
        $bag_desc = "<strong>Бүс цүнх</strong>, хавтага нь ямар ч янзаар зүүж ба үүрч болох төсөр бөгөөд минималистик цүнх юм.";
        $instr = "Сайн уу! Танаас хүсэж буй савхин бүс цүнхний санал асуулга нь <b>арьсны материал</b>, <b>арьсны зузаан</b>, <b>эзлэхүүн</b>, <b>өнгөний анги</b> болон <b>үнэ</b> зэргээрээ ялгарч байгаа. Нийт 15 асуулт тус бүр нь 4 сонголтоос бүрдэх ба та тэр дөрвөөс өөрийн авмаар байгаа нэгийг нь дугуйлахад л хангалттай.";
        $ps_desc = "Жич: <strong>веган</strong> болон <strong>хиймэл</strong> савхин эдлэл нь өдөр тутмын амьдралд нэг зүйлийг заадаг ч, энэ судалгаанд веган арьсыг 100% PU (polyurethane), харьцангуй нефтийн нягт багатай материалаар хийсэн бол хиймэл нь PVC болон бусад байгальд харьцангуй илүү хортой бодисоос гаралтай байгаа.";
        $button_txt = "Энд дараарай!";
    } else {
        $title = "Welcome!";
        $subtitle = "The survey for your fanny pack preference!";
        $bag_desc = "<strong>Fanny pack</strong>, belt bag or bum bag is a minimalistic affordable bag that can be put on whatever the way you'd prefer.";
        $instr = "Hi! We're eager to have you vote for varieties of leather choices you'd like to have in yourself that are differing in <b>material</b>, <b>leather thickness</b>, <b>volume</b>, <b>color</b> and, of course, <b>price</b>. There are 15 questions in total, each of which consists of 4 alternatives that you're supposed to choose the one you don't mind buying.";
        $ps_desc = "PS: Despite referring to the same notion in everyday life, <strong>vegan</strong> and <strong>faux</strong> leathers being concerned are set apart in this context, where vegan one is produced from 100% PU (polyurethane), a relatively less petrolium-heavy material that is significantly environmentally friendly, and the other covers all other artificial leathers, including PVC.";
        $button_txt = "Take me to the quiz :^)";
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Welcome to our quiz!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

        <style media="screen">
            body {
                font-family: "PT Sans", sans-serif;
            }
            .columns {
                margin-top: 25px;
            }
            img.mainimage {
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="columns">

                <div class="column is-5 is-offset-1">

                    <div class="box">

                        <div class="content">

                            <div class="title"><?php echo $title; ?>!</div>
                            <div class="subtitle"><?php echo $subtitle; ?></div>

                            <div class="block">
                                <img class="mainimage" src="./assets/mainimg.jpg" alt="There are many ways you can put on fanny packs!">
                            </div>

                            <div class="block" style="text-align:justify;">
                                <?php echo $bag_desc; ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="column is-5">
                    <div class="box">

                        <div class="content">

                            <div class="block" style="text-align:justify;"><?php echo $instr; ?></div>

                            <div class="block">
                                <article class="message is-link">
                                    <div class="message-body" style="text-align:justify;">
                                        <?php echo $ps_desc; ?>
                                    </div>
                                </article>
                            </div>

                            <br>

                            <center><button onclick="location.href='survey.php?lang=<?php echo $lang; ?>'" type="button" class="button is-large is-link is-rounded is-outlined"><?php echo $button_txt; ?></button></center>

                            <br>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </body>
</html>
