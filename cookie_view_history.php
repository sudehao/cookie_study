<?php
header("content-type:text/html; charset=utf-8");

$id = isset($_GET['id'])?$_GET['id']:0;
?>
<p><a href="cookie_view_history.php?id=<?php echo $_GET['id']<=0?0:$id-1;?>">上一页</a><code>&nbsp;</code>
<a href="cookie_view_history.php?id=<?php echo $id+1;?>">下一页</a>
</p>


<?php
//*cookie案例之浏览历史：
// setcookie('view', array($uri)); 是错误的，cookie只能存储字符串，数字；不能存储数组，资源之类的多维数据
$uri = $_SERVER['REQUEST_URI'];
if(!isset($_COOKIE['view'])) {
	$his[] = $uri;
}else{
	$his = explode('|', $_COOKIE['view']);
	array_unshift($his, $uri);
	$his = array_unique($his);
	if(count($his)>5) {
		array_pop($his);
	}
}

setcookie('view', implode('|', $his));

$history = isset($_COOKIE['view'])?explode('|', $_COOKIE['view']):array('没有浏览历史');

?>

<ul>
<?php
echo '浏览历史：';
foreach($history as $v) { ?>
	<li><?php echo $v; ?></li>
<?php } ?>
</ul>