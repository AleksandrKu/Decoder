<?php
if ($_POST) {
	$string = $_POST['text'];
	$number = $_POST['number'];
	echo "<b>Исходный текст:</b><br>" . $string;
	echo "<br>";
	// функция кодирования
	function inCrypt($string, $table_width)
	{
		$length_text = iconv_strlen($string);
		$table = [];
		$row = 0;
		$cell = 0;
		$index = 0;
		for ($i = 0; $i < $length_text; $i++) {  // формирования таблицы шириной $number колонок
			$table[$row][$cell] = $string[$i]; // записываем построчно
			if ($cell < ($table_width - 1)) {
				$cell++;
			} else {
				$cell = 0;
				$row++;
			}
		}
		for ($sell_out = 0; $sell_out < $table_width; $sell_out++) { // формирование строки из таблицы
			for ($row_out = 0; $row_out <= $row; $row_out++) {
				$value = $table[$row_out][$sell_out];  // выводим из столбцов таблицы в строку
				if (empty($value)) {
					$value = " ";
				}
				$string_out[$index] = $value;
				$index++;
			}
		}
		return implode($string_out);
	}

	// функция декодирования
	function deCrypt($string, $table_width)
	{
		$length_text = iconv_strlen($string);
		$row_max = ceil($length_text / $table_width);
		$table = [];
		$index = 0;
		$i = 0;
		for ($sell = 0; $sell < $table_width; $sell++) {
			for ($row = 0; $row < $row_max; $row++) {
				if (($length_text - $i) < $table_width) {
				}
				$table[$row][$sell] = $string[$i];
				$i++;
			}
		}
		for ($row_out = 0; $row_out < $row; $row_out++) {
			for ($sel_out = 0; $sel_out < $table_width; $sel_out++) {
				$string_out[$index] = $table[$row_out][$sel_out];
				$index++;
			}
		}
		return rtrim(implode($string_out));
	}


	$string_crypt = inCrypt($string, $number); // вызов функции кодирования
	echo "<br><b>Кодированый текст:</b><br> " . $string_crypt . "<br>";
	echo "<br><b>Декодированый текст:</b><br> " . deCrypt($string_crypt, $number); // вызов функции декодирования
}