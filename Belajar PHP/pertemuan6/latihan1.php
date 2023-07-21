<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latihan Associative Array</title>
        <style>
        .kotak {
            height: 30px;
            width: 30px;
            background-color: blueviolet;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
        </style>
    </head>

    <body>

        <?php
    $var1 = [
        [1, 2, 3], 
        [4, 5, 6], 
        [7, 8, 9]
    ];
    ?>

        <?php foreach ($var1 as $v) : ?>
        <?php foreach ($v as $x) : ?>
        <div class="kotak"><?= $x; ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
        <?php endforeach; ?>
    </body>

</html>