<?php
//<?php предназначен для больших блоков кода, которые могут не содержать непосредственного ввода, только для расчетов, объявления переменных, функций и тд..
$a = 10;
define('MYCONST', 'const');
function funName($a)
{
    return $a;
}

//<?= используется для сокращенной записи вывода, эквивалент <?php echo $a;
//пример:
?>
<?= $a; ?>