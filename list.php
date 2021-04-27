<?php
date_default_timezone_set('PRC');
if ($_REQUEST[act]=='update') {
	$data=explode(PHP_EOL,trim($_REQUEST[memberlist]));
	$json_string="var member=[";
	foreach ($data as $key => $value)	{$json_string=$json_string.'{"name":"'.$value.'"},';}
	$json_string = rtrim($json_string, ",");
	$json_string = $json_string.']';
	file_put_contents('member_list.js', $json_string);
}
$json_string = file_get_contents('member_list.js');
$json_string=str_replace('var member=[','[',$json_string);
$data = json_decode($json_string, true);
$stime = date('Y-m-d H:i:s',time());
?>
<form align=center><input type=hidden value='update' name='act'>
	There are <?=sizeof($data)?> people in the list now.<br>
	<?=$stime?><br>
	<textarea rows="30" cols="10" name="memberlist"><?php foreach ($data as $key => $value)	{echo "{$value['name']}".PHP_EOL;}	?></textarea><br><br>
	<input type='submit' value='Update List'><br><br>
	<a href='index.html'>Go go Lucky Draw</a>
</form>
