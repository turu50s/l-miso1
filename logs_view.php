<?php
//$ln = $hour . "\t" . $min. "\t" . $host . "\t" . $ip . "\t"
//    . $_SERVER['HTTP_REFERER'] . "\t" . $_SERVER['HTTP_USER_AGENT'] . "\n";
ini_set( 'display_errors', 0 );

$hour = array();
$host = array();
$ip = array();
$referer = array();
$user = array();
 
$dir_name = opendir('./log/');
while ($file_name = readdir($dir_name)) {
    $file_path = './log/' . $file_name;
    if (($file_path != "./log/.") && ($file_path != "./log/..")) { 
//        print "$file_path<br>";
	    $file = fopen($file_path,"r");
		while(!feof($file)){
		    $str = fgets($file);
		    $line = split("\t",$str);
//		    print $line[2];
		    $hour[$line[0]]++;
		    $host[$line[2]]++;
		    $ip[$line[3]]++;
		    $referer[$line[4]]++;
		    $user[$line[5]]++; 
		}
		fclose($file);
     }
}
closedir($dir_name);

print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
print "<HTML>";
print "<HEAD><TITLE>柏のリサイクル・ゆずり葉</TITLE></HEAD>";
print "<body>";
print "時間別<br>";
print "<table><tr>";
for ($i=0; $i < 25; $i++) {
    print "<th>" . $i ."</th>";
}
print "</tr><tr>";

foreach ($hour as $h) {
    print "<td>" . $h . "</td>";
}
print "</tr></table>";

print "<br>リファラー別<br>";
print "<table>";
foreach ($referer as $key => $value) {
    print '<tr><th align="left">' . $key ."</th>" . "<td>" . $value . "</td></tr>";
}
print "</table>";

//print "ホスト別<br>";
//print "<table>";
//foreach ($host as $key => $value) {
//    print "<tr><th>" . $key ."</th>" . "<td>" . $value . "</td></tr>";
//}
//print "</table>";

print "</body></html>";
?>
