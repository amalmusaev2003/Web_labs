<?php
// Получаем текст из текстареа
$text = $_POST['text'];
// Удаляем лишние пробелы и переносы строк
$text = trim($text);
// Разбиваем текст на слова по пробелам
$words = explode(" ", $text);
// Считаем количество слов
$word_count = count($words);
// Считаем количество символов
$char_count = strlen($text);
// Выводим результаты на экран
echo "Количество слов: $word_count<br>";
echo "Количество символов: $char_count<br>";
?>

<?php
// Получаем текст из текстареа
$text = $_POST['text'];
// Удаляем лишние пробелы и переносы строк
$text = trim($text);
// Разбиваем текст на слова по пробелам
$words = explode(" ", $text);
// Считаем количество слов
$word_count = count($words);
// Считаем количество символов
$char_count = strlen($text);
// Выводим результаты на экран
echo "Количество слов: $word_count<br>";
echo "Количество символов: $char_count<br>";
?>

<?php
// Стартуем сессию
session_start();
// Если форма отправлена, то сохраняем данные в сессию в виде массива
if (isset($_POST['submit'])) {
  $_SESSION['data'] = [
    'name' => $_POST['name'],
    'age' => $_POST['age'],
    'salary' => $_POST['salary'],
    'hobby' => $_POST['hobby']
  ];
}
?>
<form method="post">
  <p>Введите имя: <input type="text" name="name"></p>
  <p>Введите возраст: <input type="number" name="age"></p>
  <p>Введите зарплату: <input type="number" name="salary"></p>
  <p>Введите хобби: <input type="text" name="hobby"></p>
  <p><input type="submit" name="submit" value="Отправить"></p>
</form>
<?php
// На другой странице выводим данные из сессии в виде списка
session_start();
echo "<ul>";
foreach ($_SESSION['data'] as $key => $value) {
  echo "<li>$key: $value</li>";
}
echo "</ul>";
?>