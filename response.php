<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Result!</title>
        <style media="screen">
            .error {
                color: red;
            }
            .success {
                color: green;
            }
        </style>
    </head>
    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $err_msg = "";
                $ans = array();
                for ($i = 1; $i <= 15; $i ++) {
                    $key = "ans:" . $i;
                    if(empty($_POST[$key])) {
                        $err_msg .= "Question " . $i . " has not been answered!<br>";
                    }
                }
                if ($err_msg != "") {?>
                    <div class="error">
                        <?php echo "Problem occured:<br>" . $err_msg; ?>
                        Please <a href="survey.php">click here</a> to complete your survey.<br>
                        Та дээрх дугаарын асуултуудад хариулаагүй байна. <a href="survey.php">Энд дарж</a> сонголтоо гүйцээнэ үү.
                    </div>
                <?php }
                else {

                    $conn = new mysqli("localhost", "******myname", "******pass", "dbname");

                    if ($conn -> connect_errno) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    /* this is where the response values are extracted */

                    $resp_id = time() . "-" . mt_rand();

                    for ($q = 1; $q <= 15; $q ++) {

                        $rsp = $_POST["ans:$q"];

                        for ($a = 1; $a <= 4; $a ++) {


                            $qst = "qtn-" . $q;
                            $alt = "alt-" . $a;
                            $vol = $_POST["question-$q:alt-$a:volum"];
                            $tck = $_POST["question-$q:alt-$a:thick"];
                            $prc = $_POST["question-$q:alt-$a:price"];
                            $col = $_POST["question-$q:alt-$a:color"];
                            $shp = $_POST["question-$q:alt-$a:shape"];
                            $mat = $_POST["question-$q:alt-$a:mater"];

                            $qry = 'insert into survey(resp_id, quest_id, alt_id, color, shape, material, thickness, volume, price, response) values("'.$resp_id.'", "'.$qst.'", "'.$alt.'", "'.$col.'", "'.$shp.'", "'.$mat.'", '.$tck.', "'.$vol.'", '.$prc.', '.$rsp.');';

                            if ($conn->query($qry) == TRUE) {
                                //echo "Data has been saved successfully!";
                            } else {
                                echo "Error" . $qry . "<br>" . $conn->error;
                            }

                        }
                    }

                    $conn->close();


                ?>
                    <div class="success">
                        You have completed the survey!<br> Thank you greatly for your contribution!<br>Goodbye! :)
                    </div>
                    <?php
                }
            }
        ?>
    </body>
</html>
