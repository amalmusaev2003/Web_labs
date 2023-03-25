<h3> task1 </h3>
<?php
    $very_bad_uncklear_name = "15 chicken wings";
    $order = &$very_bad_uncklear_name;
    $order .= "is a lot";
    echo "<br>Your order is: $very_bad_uncklear_name.";
?>


<h3> task2 </h3>
<?php
    $int_num = 6;
    echo "int = $int_num <br>";

    $float_num = 6.0;
    echo "float = $float_num <br>";

    echo "int + float = ",  $int_num + $float_num, "<br>";

    $last_month = 1187.23;
    $this_month = 1089.98;
    echo "last - this = ", $last_month - $this_month;
?>


<h3> task11 </h3>
<?php
    $num_language = 4;
    $months = 11;
    $days = $months * 16;
    $days_per_language = $days/$num_language;
    echo "Понадобится ", $days_per_language, " дня";
?>


<h3> task12 </h3>
<?php
    echo 8**2;
?>


<h3> task13 </h3>
<?php
    $my_num = 56;
    $answer = $my_num;
    $answer += 2;
    $answer *= 2;
    $answer -= 2;
    $answer /= 2;
    $answer -= $my_num;
    echo $answer;
?>


<h3> task14 </h3>
<p> Работа с % </p>
<?php
    $a = 10;
    $b = 3;
    echo "$a % $b = ", $a % $b;

    if($a % $b == 0)
        echo "<br>Делится";
    else
    {
        echo "<br>Делится с остатком ";
        echo "$a % $b = ", $a % $b;
    }
?>

<p> Работа со степенью и корнем</p>
<?php
    $st = pow(2, 10);
    echo "2 в 10 степени = ", $st, "<br>";
    echo "Квадратный корень из 245 = ", sqrt(245), "<br>";

    $mas = Array(4, 2, 5, 19, 13, 0, 10);
    $sum_sqrt=0;
    foreach($mas as $value)
        $sum_sqrt += pow($value, 2);
    echo "Корень из суммы квадратов массива = ", sqrt($sum_sqrt), "<br>";
?>

<p> Работа с функциями округления </p>
<?php
    echo "Округление до целых: ", round(sqrt(379), 0), "<br>";
    echo "Округление до десятых: ", round(sqrt(379), 1), "<br>";
    echo "Округление до сотых: ", round(sqrt(379), 2), "<br>";
    $mas_587=Array('floor', 'ceil');
    $mas_587['floor']=floor(sqrt(587));
    $mas_587['ceil']=ceil(sqrt(587));
    echo "Округлите результат в большую сторону: ", $mas_587['floor'], "<br>";
    echo "Округлите результат в меньшую сторону: ", $mas_587['ceil'], "<br>";
?>

<p> Работа с min и max </p>
<?php
    echo "max = ", max( 4, -2, 5, 19, -130, 0, 10), "<br>";
    echo "min = ", min( 4, -2, 5, 19, -130, 0, 10), "<br>";
?>

<p> Работа с рандомом </p>
<?php
    echo "Случайное число от 1 до 100: ", rand(1, 100), "<br>";
    $mas_rand = Array();
    for($i = 0; $i < 10; $i++)
        $mas_rand = rand();
?>

<p>Работа с модулем</p>
<?php
    $a = rand();
    $b = rand();
    echo "Модуль разности для $a и $b = ", abs($a - $b), "<br>";
    $mas_abs = Array(1, 2, -1, -2, 3, -3);
    echo "Массив до 'модуляции'<br>";
    for($i = 0; $i < sizeof($mas_abs); $i++){
        echo $mas_abs[$i], " ";
        if($mas_abs[$i]<0)
            $mas_abs[$i]=abs($mas_abs[$i]);
    }
    echo "<br>Массив после 'модуляции'<br>";
    foreach($mas_abs as $value)
        echo $value, " ";
?>

<p> Общее </p>
<?php
    $task= rand(1, 100);
    $mas_del = Array();
    $count = 0;
    for($i = 1; $i <= $number; $i++)
        if($task% $i == 0){
            $mas_del[$count]=$i;
            $count++;
        }
    echo "Делители числа $number: <br>";
    foreach($mas_del as $value)
        echo $value, " ";

    $mas_sum = Array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    $count = 0;
    $sum = 0;
    foreach($mas_sum as $value){
        $sum += $value;
        $count++;
        if($sum>10)
        {
            echo "<br>Надо $count первых элементовь, чтобы sum > 10 <br>";
            break; 
        }
    }
?>



<h3>task15</h3>
<?php
    function printStringReturnNumber(){
        echo "Число = ";
        return rand(1, 100);
    }
    $my_num=printStringReturnNumber();
    echo $my_num;
?>



<h3>task16</h3>
<?php
    function increaseEnthusiasm($str){
        return $str .= "!";
    }
    echo increaseEnthusiasm("It's work");

    function repeatThreeTimes($str){
        return str_repeat($str, 3);
    }

    echo "<br>", repeatThreeTimes("It's good! ");

    echo "<br>", (repeatThreeTimes(increaseEnthusiasm("Хлеб")));


    function cut($str, $count = 10){
        $time_string = "";
        for($i =0;$i<$count;$i++)
            $time_string .= $str[$i];
        return $time_string;
    }
    echo "<br>Оставлено 10 эл-в из строки 'Hello, world!': ", cut("Hello, world!");


    $mas_write = Array(1,2,3,4,5,6,7,8,9,10);
    function recursiveWrite(&$mas_write, $counter){
        if($counter < sizeof($mas_write)){
            echo $mas_write[$counter], " ";
            $counter++;
            return recursiveWrite($mas_write, $counter);
        }
        else
            return;
    }
    echo "<br>Mas: ";
    recursiveWrite($mas_write, 0);


    $task= rand(1, 50);
    function SumNum($number){
        if(array_sum(str_split($number, 1)) > 9)
            return SumNum(array_sum(str_split($number, 1)));
        else 
            return array_sum(str_split($number, 1));
    }
    echo "<br>Сумма от $taskпри нашем условии = ", SumNum($number);
?>



<h3>task17</h3>
<?php   
    $mas_x = array();
    for($i =0; $i < rand(2, 10);$i++){
        $mas_x[$i]=str_repeat('x', $i);
    }
    echo "Массив размером: ", sizeof($mas_x)-1, "<br>";
    foreach($mas_x as $value)
        echo  $value, " ";


    function arrayFill($str, $count){
        $timeMas=array();
        for($i =0; $i < $count;$i++){
            $timeMas[$i]=$str;
        }
        return $timeMas;
    }
    $mas1 = arrayFill('x', rand(2, 10));
    echo "<br>Массив через arrayFill: <br>";
    foreach($mas1 as $value)
        echo  $value, " ";

    $mas_fun= [[1, 2, 3], 
                [4, 5], 
                [6]];
    $sum =0;
    for($i =0; $i < sizeof($mas_fun);$i++)
        for($j =0; $j <  sizeof($mas_fun[$i]);$j++)
                $sum += $mas_fun[$i][$j];

    echo "<br>Сумма элементов в массиве = ", $sum, "<br>";

    $mas_1 = array();
    $count =1;
    for($i =0; $i < 3;$i++){
        $timemas=array();
        for($j =0; $j <  3;$j++){
            $timemas[$j]=$count++;
            echo  $timemas[$j], " ";
        }
        $mas_1=$timemas;
        echo "<br>";
    }

    $mas1=Array(2, 5, 3, 9);
    $result = $mas1[0]*$mas1[1] + $mas1[2]*$mas1[3];
    echo "<br> result = ", $result;
    
    
    $user=array(
        'name' => 'Амаль',
        'last_name' => 'Мусаев', 
        'patronymic' => 'Русланович'
    );
    echo "<br> ФИО: ", $user['last_name'], " ", $user['name'], " ",  $user['patronymic'], "<br>";

    $date=array(
        'year' => '2023',
        'month' => '03', 
        'day' => '25'
    );
    echo "Дата: ", $date['year'], "-", $date['month'], "-",  $date['day'], "<br>";

    $arr = ['a', 'b', 'c', 'd', 'e'];
    echo "Количсество элементов массива = ", sizeof($arr), "<br>";
    echo "Последний '", end($arr),"' и предпоследний '", prev($arr), "' элементы этого массива <br>";
?>



<h3>task18</h3>
<?php   
    function sum10($a, $b){
        if($a + $b > 10)
            return true;
        else
            return false;
    }   

    function ravn($a, $b){
        if($a == $b)
            return true;
        else
            return false;
    }   

    $test= 0;
    if(!$test)
        echo "верно";

    $age=rand(1, 500);
    if($age < 10 || $age > 99){
        if($age > 99)
            echo "<br> $age > 99";
        else
            echo "<br> $age < 10";
    }     
    else{
        if(array_sum(str_split($age, 1)) <= 9)
            echo "<br>Cумма цифр однозначна (", array_sum(str_split($age, 1)),")";
        else
            echo "<br>Cумма цифр двузначна (", (array_sum(str_split($age, 1))), ")"; 
    }


    $mas_if = Array(1, 8, 9);
    if(sizeof($mas_if) == 3)
        echo "<br> Сумма чисел массива из 3 эл-в = ", array_sum($mas_if);
?>



<h3>task19</h3>
<?php
    for($i =0; $i < 20;$i++)
        echo str_repeat('x', $i), "<br>"; 
?>



<h3>task20</h3>
<?php
    $mas=Array(1, 2, 6, 7, 5, 6, 7, 9, 5);
    echo "Среднее арифметическое = ", array_sum($mas)/sizeof($mas), "<br>";

    echo "Сума чисел от 1 до 100 = ", array_sum(range(1, 100)), "<br>";

    $mas1=Array(36, 49, 25, 64, 4, 9, 16, 81);
    $mas1=array_map('sqrt', $mas1);
    echo "<br>Массив с корнями: <br>";
    foreach($mas1 as $value)
        echo  $value, " ";
    
    $mas_key=array_combine(range('a', 'z'), range(1, 26));
    foreach($mas_key as $key => $var)
        echo  "<br>", $key,  " => ",  $var;

    $numbers = "1234567890";
    $mas_suma = str_split($numbers, 2);
    echo "<br> 12+34+56+78+90 = ", array_sum($mas_suma);
?>