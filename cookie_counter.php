<?php
header('content-type:text/html; charset=utf-8');


//** cookie案例之计数器：
if(!isset($_COOKIE['num'])) { // 第一次访问，还没有设置相应的cookie键值
	setcookie('num',1); // 设置 num cookie，相当于在本次访问时，服务器送给客户端一个num cookie，此时该cookie还没有发送到客户端
	// echo $_COOKIE['num'];  // 第一次访问，客户端没有num cookie信息，notice报错。
	$num = 1;
}else{  // 不是第一次访问，客户端带来了num cookie信息
	setcookie('num',$_COOKIE['num']+1); // 在客户端带来的num cookie基础上加1。在本次访问结束时，更新客户端num cookie信息。
	echo '此时的$_COOKIE值：'.$_COOKIE['num'].'<br />';  // 此时输出的是客户端带来的num cookie信息。
	$num = $_COOKIE['num']+1;
}

echo '你是第：'.$num.'次访问这个页面了。';

/*
1. 第一次执行该页面时，客户端不存在$_COOKIE['num']，没有携带该cookie给服务器，
   所以此时if条件为真，执行if语块，
   执行：服务端设置$_COOKIE['num']=1，并且发送给客户端。
   由于第一次客户端不存在键为num的cookie，echo $_COOKIE['num']; 会报notice错误 num undefined；
2. 第二次执行该页面时，客户端带来了$_COOKIE['num']=1，if为假，执行了else语块，
   执行：服务端设置$_COOKIE['num']在客户端带来的 $_COOKIE['num']=1 基础上加 1 ，
   此时echo $_COOKIE['num']; 的值是客户端带来的cookie值，也就是 1 。而不是本次的+1操作结果。

这个cookie计数器通过$num这个变量来修正cookie信息存在本地的特性，来达到正确计数的效果。
*/


?>