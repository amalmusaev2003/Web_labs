<?php
// Подключаем библиотеку для работы с Google Sheets API
require_once 'vendor/autoload.php';

// Создаем клиент для авторизации в Google
$client = new Google_Client();
$client->setApplicationName('Google Sheets Integration');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig('credentials.json');
$client->setAccessType('offline');

// Получаем сервис для работы с таблицами
$service = new Google_Service_Sheets($client);

// Указываем ID таблицы, в которой будем хранить объявления
$spreadsheetId = '1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms';

// Если форма отправлена, то добавляем данные в таблицу
if (isset($_POST['submit'])) {
  // Получаем данные из формы
  $email = $_POST['email'];
  $category = $_POST['category'];
  $title = $_POST['title'];
  $text = $_POST['text'];
  // Формируем массив с данными для добавления
  $values = [
    [$email, $category, $title, $text]
  ];
  // Создаем объект для параметров запроса
  $body = new Google_Service_Sheets_ValueRange([
    'values' => $values
  ]);
  // Указываем диапазон ячеек для добавления данных
  $range = 'A2:D';
  // Указываем тип добавления данных (в конец таблицы)
  $params = [
    'valueInputOption' => 'RAW',
    'insertDataOption' => 'INSERT_ROWS'
  ];
  // Выполняем запрос к API для добавления данных
  $result = $service->spreadsheets_values->append(
    $spreadsheetId,
    $range,
    $body,
    $params
  );
}
?>
<form method="post">
  <p>Введите email: <input type="email" name="email" required></p>
  <p>Выберите категорию: <select name="category" required>
    <?php
    // Выводим список категорий в виде опций
    $categories = ['cars', 'clothes', 'electronics', 'furniture', 'pets'];
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
// Указываем диапазон ячеек для получения данных
$range = 'A2:D';
// Выполняем запрос к API для получения данных
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
// Получаем массив с данными из таблицы
$values = $response->getValues();
// Перебираем все строки с данными
foreach ($values as $row) {
  // Получаем email, категорию, заголовок и текст из ячеек строки
  list($email, $category, $title, $text) = $row;
  // Выводим строку таблицы с данными
  echo "<tr><td>$email</td><td>$category</td><td>$title</td><td>$text</td></tr>";
}
echo "</table>";
?>