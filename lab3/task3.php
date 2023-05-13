<?php
// Создаем несколько папок категорий
$categories = ['cars', 'clothes', 'electronics', 'furniture', 'pets'];
foreach ($categories as $category) {
  if (!is_dir($category)) {
    mkdir($category);
  }
}
// Если форма отправлена, то сохраняем данные в файл
if (isset($_POST['submit'])) {
  // Получаем данные из формы
  $email = $_POST['email'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $text = $_POST['text'];
  // Формируем имя файла
  $filename = $category . '/' . $title . '.txt';
  // Записываем текст объявления в файл
  file_put_contents($filename, $text);
}
?>
<form method="post">
  <p>Введите email: <input type="email" name="email" required></p>
  <p>Выберите категорию: <select name="category" required>
    <?php
    // Выводим список категорий в виде опций
    foreach ($categories as $category) {
      echo "<option value='$category'>$category</option>";
    }
    ?>
  </select></p>
  <p>Введите заголовок объявления: <input type="text" name="title" required></p>
  <p>Введите текст объявления: <textarea name="text" required></textarea></p>
  <p><input type="submit" name="submit" value="Добавить"></p>
</form>
<?php
// Выводим список уже загруженных объявлений в виде таблички
echo "<table border='1'>";
echo "<tr><th>Email</th><th>Категория</th><th>Заголовок</th><th>Текст</th></tr>";
// Перебираем все папки категорий
foreach ($categories as $category) {
  // Перебираем все файлы в папке
  foreach (glob($category . '/*.txt') as $file) {
    // Получаем заголовок и текст из имени и содержимого файла
    $title = basename($file, '.txt');
    $text = file_get_contents($file);
    // Выводим строку таблицы с данными
    echo "<tr><td>$email</td><td>$category</td><td>$title</td><td>$text</td></tr>";
  }
}
echo "</table>";
?>