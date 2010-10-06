<?php

include_once 'config.inc.php';

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

//$mounth = '10';
//$year = '2010';

$floor = $_POST['floor'];
$mounth = $_POST['mounth'];
$year = $_POST['year'];

$prevmounth = $mounth - 1; $prevyear = $year; if ($prevmounth == 0) { $prevmounth = 12; $prevyear = $year - 1; };
$nextmounth = $mounth + 1; $nextyear = $year; if ($nextmounth == 13){ $nextmounth = 1; $nextyear = $year + 1; };

$data['mounth'] = (int)$_POST['mounth'];
$data['floor'] = (int)$_POST['floor'];
$data['year'] = (int)$_POST['year'];
$data['day'] = (int)$_POST['day'];
$data['shift'] = (int)$_POST['shift'];
$data['name'] = addslashes($_POST['name']);
$data['group'] = addslashes($_POST['group']);
$data['ip'] = $_SERVER['REMOTE_ADDR'];
$data['date'] = date('Y-m-d H:i:s');


$link = mysql_connect($mysql['host'], $mysql['user'], $mysql['pass']);
mysql_select_db($mysql['database'],$link);

if ($data['name'] && $data['group']){
$sql = "INSERT INTO data
        (`day`,`mounth`,`year`,`floor`,`shift`,`name`,`group`,`ip`,`date`)
        VALUES ({$data['day']},{$data['mounth']},{$data['year']},{$data['floor']},{$data['shift']},'{$data['name']}','{$data['group']}','{$data['ip']}','{$data['date']}');";
$res = mysql_query($sql);
}

//print_r($sql);

$sql = "SELECT * FROM data WHERE mounth=$mounth AND year=$year AND floor=$floor ORDER BY day";
$res = mysql_query($sql);

while ($row=mysql_fetch_row($res)) {

    $data["{$row['4']}"]['name']["{$row['0']}"] = $row['5'];
    $data["{$row['4']}"]['group']["{$row['0']}"] = $row['6'];
    $data["{$row['4']}"]['ip']["{$row['0']}"] = $row['7'];
    $data["{$row['4']}"]['date']["{$row['0']}"] = $row['8'];

}
//print_r($data);

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
            <?php echo "Этаж: $floor"; ?>
            <table style="width: 90%;">
                <tr>
                    <td style="width: 80px; text-align: center;">
                        <form action="data.php" method="POST" style="height: 10px;">
                            <input type="hidden" name="floor" value="<?php echo $floor; ?>">
                            <input type="hidden" name="mounth" value="<?php echo $prevmounth; ?>">
                            <input type="hidden" name="year" value="<?php echo $prevyear; ?>">
                            <input type="submit" value="<?php echo $mounthlist["$prevmounth"]; ?>">
                        </form>
                    </td>
                    <td style="width: 150px; text-align: center;"><h1> <?php echo $mounthlist["$mounth"]; ?> </h1></td>
                    <td style="width: 80px; text-align: center;">
                        <form action="data.php" method="POST" style="height: 10px;">
                            <input type="hidden" name="floor" value="<?php echo $floor; ?>">
                            <input type="hidden" name="mounth" value="<?php echo $nextmounth; ?>">
                            <input type="hidden" name="year" value="<?php echo $nextyear; ?>">
                            <input type="submit" value="<?php echo $mounthlist["$nextmounth"]; ?>">
                        </form>
                    </td>
                </tr>
            </table>
        <table>
            <tr>
                <td></td>
                <td style="text-align: center;">Первая смена (08-00 - 16-00)</td>
                <td></td>
                <td style="text-align: center;">Вторая смена (16-00 - 24-00)</td>
            </tr>

        <?php for($i=1;$i<=31;$i++){ ?>

            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <form <?php if (!$data['1']['name'][$i]) { ?> action="data.php" <?php } ?> method="POST" style="height: 10px;">
                        <input type="hidden" name="floor" value="<?php echo $floor; ?>">
                        <input type="hidden" name="mounth" value="<?php echo $mounth; ?>">
                        <input type="hidden" name="year" value="<?php echo $year; ?>">
                        <input type="hidden" name="day" value="<?php echo $i; ?>">
                        <input type="hidden" name="shift" value="1">
                        <input type="text" name="name" value="<?php echo $data['1']['name'][$i]; ?>" size="35px">
                        <input type="text" name="group" value="<?php echo $data['1']['group'][$i]; ?>" size="10px">
                        <?php if (!$data['1']['name'][$i]) { ?>
                            <input type="submit" value="Save">
                        <?php } ?>
                    </form>
                </td>
                <td>
                    &nbsp;
                </td>
                <td>
                    <form <?php if (!$data['2']['name'][$i]) { ?> action="data.php" <?php } ?> method="POST" style="height: 10px;">
                        <input type="hidden" name="floor" value="<?php echo $floor; ?>">
                        <input type="hidden" name="mounth" value="<?php echo $mounth; ?>">
                        <input type="hidden" name="year" value="<?php echo $year; ?>">
                        <input type="hidden" name="day" value="<?php echo $i; ?>">
                        <input type="hidden" name="shift" value="2">
                        <input type="text" name="name" value="<?php echo $data['2']['name'][$i]; ?>" size="35px">
                        <input type="text" name="group" value="<?php echo $data['2']['group'][$i]; ?>" size="10px">
                        <?php if (!$data['2']['name'][$i]) { ?>
                            <input type="submit" value="Save">
                        <?php } ?>
                    </form>
                </td>
            </tr>

        <?php  } ?>
        </table>
        </center>


    </body>
</html>
