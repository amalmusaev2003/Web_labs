<?php
// Дана строка
$str = 'ahb acb aeb aeeb adcb axeb';
// Напишем регулярку
$pattern = '/a..a/';
// Применим регулярку к строке и выведем результат
preg_match_all($pattern, $str, $matches);
print_r($matches[0]);
?>

<?php
// Дана строка
$str = 'a1b2c3';
// Напишем функцию, которая возводит число в куб
function cube($match) {
  return $match[0] ** 3;
}
// Применим регулярку с функцией к строке и выведем результат
$str = preg_replace_callback('/\d/', 'cube', $str);
echo $str;
?>