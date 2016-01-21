<?php



// ===== 假设这个页面非常重要，不是网站的用户不能看

// 一种思路：（这种思路有什么问题）
// 先判断用户名/密码，然后定义常量，
$conn = mysqli_connect('localhost', 'root', '', 'boolshop');

$sql = 'SET NAME UTF8';
mysqli_query($conn, $sql);

$sql = "SELECT count(*) FROM user WHERE user_name ='" . $_POST['username'] . "' AND passwd='" . $_POST['passwd'] . "'";
$rs = mysqli_query($conn, $sql);

$row = mysqli_fetch_row($rs);

if($row[0] == 1) {
	echo '有这个用户名/密码，且匹配。<br />';
	define('USER', true);
} else {
	echo '用户名/密码错误';
	exit;
}

if(!defined('USER')) {
	echo '你没有登入';
	exit;
}

// ===== 如何把这行代码控制住，非本站用户不能看
echo '这部分非常重要！当你看到时，说明你是本站用户<br />';
echo 'very important!';

/* ===== 这种思路的问题：
	1. 不能跨页面，状态无法保存；
	2. 页面结束，所有的变量、常量、对象PHP会自动释放（自动销毁，回收内存）；
	3. 此时，如果链接到03.php页面后，原来02.php定义的常量无法传递到03.php页面，
	   因此02.php做了登入判断，无法持续到03.php。
*/

/* ===== 生活中的场景
	一群人，买豆浆，也不排队，乱哄哄的。豆浆现磨，先交钱，交完钱蹲一边等。

	这个老板---非常健忘！转脸就忘。

	李四给老板钱 <---> “大杯黄豆！”，交互结束。

	李四来取豆浆时（这已经是和老板再一次打交道了），而老板早已忘记之前的事情。

	请问：如何帮助老板记住客户！！！  ---> 04.php
*/
?>
<a href="03.php" target="_black">一个隐私页面</a>