<?php



//===== cookie 缘起 =====

/*
用户注册之后，需要做用户登入，退出
	知识点：cookie、session

看一个问题：我是谁？
	比如说，外面需要看自己的注册资料，即用户表中自己的信息：
	连上mysql，查询数据，地址传参，传user_id，根据user_id，查询用户信息。


*/

$user_id = $_GET['user_id'] + 0;

$conn = mysqli_connect('localhost', 'root', '', 'boolshop');

$sql = 'SET NAMES UTF8';
mysqli_query($conn, $sql);

$sql = 'SELECT * FROM user WHERE user_id=' . $user_id;
$rs = mysqli_query($conn, $sql);

print_r(mysqli_fetch_assoc($rs));

/*
思考：如果要我的user_id是5，我在地址栏输入5，看到自己的信息。
	  但是如果把user_id改成6，岂不是看到了别人的信息？

	如何才能控制只看到自己的信息？---> 02.php
*/




























?>