<?php
$logpath = './log/';

$datetime = getdate();
$year = $datetime["year"];
$mon  = $datetime["mon"];
$mday = $datetime["mday"];
$hour = $datetime["hours"];
$min  = $datetime["minutes"];

$ip   = $_SERVER["REMOTE_ADDR"];
$host = $_SERVER["REMOTE_HOST"];
if ($host == null || $host == $ip) {
	$host = gethostbyaddr($ip);
}

$ln = $hour . "\t" . $min. "\t" . $host . "\t" . $ip . "\t"
	. $_SERVER['HTTP_REFERER'] . "\t" . $_SERVER['HTTP_USER_AGENT'] . "\n";

$logfile = $logpath . sprintf("%04d%02d%02d.dat", $year, $mon, $mday);

$file = fopen($logfile,"a");
flock($file,"LOCK_EX");
fwrite($file,$ln);
flock($file,"LOCK_UN");
fclose($file);

?>
