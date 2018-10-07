<?php
$counter_file = 'counter.txt';
$counter_length = 8;

$fp = fopen($counter_file,'r+');

if ($fp) {
	if (flock($fp,LOCK_EX)) {
		$counter = fgets($fp, $counter_length);
		$counter++;
		
		rewind($fp);
		
		if (fwrite($fp, $counter) == FALSE) {
			print('ファイル書き込みエラー');
		}
		
		flock($fp, LOCK_UN);
	}
}

fclose($fp);

$format = '%0'.$counter_length.'d';
$n_counter = sprintf($format, $counter);
for ($i = 0; $i <= 9; $i++) {
	$num = (string)$i;
	$img_num = '<img src="./pic/digit/d'.$i.'.gif">';
	$n_counter = str_replace($num, $img_num, $n_counter);
}
$size = ' width="12",height="15",border="0">';
$n_counter = str_replace('>', $size, $n_counter);

print('いらっしゃいませ。'.$n_counter.'人目のお客様です。');
?>
