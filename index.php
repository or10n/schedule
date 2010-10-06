<?php

$mounthlist = array(1 => 'Январь',
                    2 => 'Февраль',
                    3 => 'Март',
                    4 => 'Апрель',
                    5 => 'Май',
                    6 => 'Июнь',
                    7 => 'Июль',
                    8 => 'Август',
                    9 => 'Сентябрь',
                    10 => 'Октябрь',
                    11 => 'Ноябрь',
                    12 => 'Декабрь');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css">
            table,td,th {
                    border: 1px solid white;
                    border-collapse: collapse;
            }
        </style>

    </head>
    <body>

        <center>
            <h1>Выберите этаж:</h1>

            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="4">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="&nbsp;4 этаж&nbsp;">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="5">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="&nbsp;5 этаж&nbsp;">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="6">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="&nbsp;6 этаж&nbsp;">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="7">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="&nbsp;7 этаж&nbsp;">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="8">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="&nbsp;8 этаж&nbsp;">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="9">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="&nbsp;9 этаж&nbsp;">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="10">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="10 этаж">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="11">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="11 этаж">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="12">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="12 этаж">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="13">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="13 этаж">
            </form>
            <form action="data.php" method="POST" style="height: 10px;">
                <input type="hidden" name="floor" value="14">
                <input type="hidden" name="mounth" value="<?php echo date('m'); ?>">
                <input type="hidden" name="year" value="<?php echo date('Y'); ?>">
                <input type="submit" value="14 этаж">
            </form>
        </center>


    </body>
</html>
