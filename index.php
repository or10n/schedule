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

$thismounth = '10';
$thisyear = '2010';

$data['mounth'] = (int)$_POST['thismounth'];
$data['year'] = (int)$_POST['thisyear'];
$data['day'] = (int)$_POST['day'];
$data['shift'] = (int)$_POST['shift'];
$data['name'] = addslashes($_POST['name']);
$data['group'] = addslashes($_POST['group']);
$data['ip'] = $_SERVER['REMOTE_ADDR'];
$data['date'] = date('Y-m-d H:i:s');


$link = mysql_connect('localhost', 'root', '');
mysql_select_db('schedule',$link);

if ($data['name'] && $data['group']){
$sql = "INSERT INTO data
        (`day`,`mounth`,`year`,`floor`,`shift`,`name`,`group`,`ip`,`date`)
        VALUES ({$data['day']},{$data['mounth']},{$data['year']},1,{$data['shift']},'{$data['name']}','{$data['group']}','{$data['ip']}','{$data['date']}');";
$res = mysql_query($sql);
}

//print_r($sql);

$sql = "SELECT * FROM data ORDER BY mounth";
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
            <h1>
                <?php echo $mounthlist["$thismounth"]; ?>
            </h1>
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
                    <form action="index.php" method="POST" style="height: 10px;">
                        <input type="hidden" name="thismounth" value="<?php echo $thismounth; ?>">
                        <input type="hidden" name="thisyear" value="<?php echo $thisyear; ?>">
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
                    <form <?php if (!$data['2']['name'][$i]) { ?> action="index.php" <?php } ?> method="POST" style="height: 10px;">
                        <input type="hidden" name="thismounth" value="<?php echo $thismounth; ?>">
                        <input type="hidden" name="thisyear" value="<?php echo $thisyear; ?>">
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
