<?php
error_reporting(0);
$start_time = microtime(true); // засекаем начало выполнения скрипта

// Инициализация переменных
$text = "";
$keywords = [];


// Проверяем данные из формы, если поля не заполнены - выводим сообщение об ошибке
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
        if (empty($_POST['text']))
            {echo "Введите текст";}
        elseif (empty($_POST['keywords']))
            {echo "Введите ключевые слова";}
        }

    // Получаем данные из формы, обрабатываем их
    $text = trim(strip_tags($_POST['text']));
    $keywords = trim(strip_tags($_POST['keywords']));

    // Преобразуем строку ключевых слов в массив. азделитель - пробел!
    $array_of_words = explode(' ', $keywords);


/**
 *  Аналог функции замены подстроки substr_replace для работы с многобайтными кодировками
 *
 * @param string $string         -- исходная строка
 * @param string $replacement    -- строка замены
 * @param integer $start         -- позиция заменяемой подстроки
 * @param integer $length        -- длина заменяемой подстроки
 * @return string               -- результырующая строка
 */
    function mb_substr_replace($string, $replacement, $start, $length)
        {
            return mb_substr($string, 0, $start).$replacement.mb_substr($string, $start+$length);
        }

    // Функция по выделению ключевых слов из массива $words в строке $string

/**
 * Функция поиска в строке $string ключевых строк из массива $words и выделения их {{скобками}}
 *
 * @param string $string    -- исходная строка
 * @param array $words      -- ключевые слова
 * @return string           -- результирующая строка с выделенными ключевыми словами
 */
    function highlightKeywords($string, $words)
        {
            $specarray = [' ', '.', ',', '!', '?', '-', ':', ';','(', ')', '[', ']', '{', '}']; // .,!?-:; (){}[] пробел

            foreach ($words as $item)
                {
                    $positionOfItem = mb_stripos($string, $item);   // находим позицию искомого слова
                    $positionAfter = $positionOfItem + mb_strlen($item);    // находим позицию символа за искомым словом



                        if ($positionOfItem) {      // если нашли:
                            // и если искомое слово в нужной словоформе (после слова стоит пробел
                            // или спецсимволы из массива $specarray)
                            if (in_array(mb_substr($string, $positionAfter, 1), $specarray))
                                {
                                    // Получаем искомое слово из строки (сохраняется регистр символов)
                                    $newItem = mb_substr($string, $positionOfItem, mb_strlen($item));
                                    // Выделяем искомое слово {{скобками}}
                                    $newItem = "{{" . $newItem . "}}";
                                    // Вставляем выделенное слово в исходную строку в то же самое место
                                    $string = mb_substr_replace($string, $newItem, $positionOfItem, mb_strlen($item));
                                }
                        }
                }

            return $string;
        }

$finish_time = microtime(true); // засекаем завершение выполнения скрипта
$result_time = $finish_time - $start_time; // разница во времени
echo 'Затрачено '.($result_time*1000).' миллисекунды.'; // Вывод времени выполнения скрипта
?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Поиск ключевых слов</title>
</head>

<body>

<form action="<?= $_SERVER['REQUEST_URI']?>" method="post">
    <p>Текст:</p>
    <textarea name="text" cols="80"></textarea>
    <p>Ключевые слова (через пробел, например: php xml ООП интерфейс Zend): </p>
    <p><input type="text" name="keywords" size="100"></p>

    <p><input type="submit" value="Искать">
</form>

<p style="color: red">Исходный текст:</p>
<p><?= $text?></p>
<p style="color: green">Ключевые слова:</p>
<p><?= $keywords ?></p>
<p style="color: blue">Обработанный текст:</p>
<p><?= highlightKeywords($text, $array_of_words) ?></p>



</body>
</html>