<?php
function revertCharacters($str)
{
    $arr = str_split($str);
    $arrnew = [];
    $up = [];
    $i = 0;

    foreach ($arr as $k => $v) {
        if (ctype_upper($arr[$k])) {
            $up[] = $k;
            $arr[$k] = strtolower($v);
        }
        if($v != ' ' AND $v != '!' AND $v != ',' AND $v != '.') {
            $i++;
        } else {
            $stop = $k - $i;
            for ($x = $k - 1; $x >= $stop; $x--){
                array_push($arrnew, $arr[$x]);
            }
            array_push($arrnew, $arr[$k]);
            $i = 0;
        }
    }

    foreach ($arrnew as $k => $v) {
        foreach ($up as $n => $m) {
            if ($k === $m) {
                $arrnew[$k] = strtoupper($arrnew[$k]);
            }
        }
    }

    return implode($arrnew);
}
echo revertCharacters('Hello, World! And all my Friends!');
?>

