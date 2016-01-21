<?php


if(!defined('USER')) {
	echo '你没有登入';
	exit;
}


// ===== 如何把这行代码控制住，非本站用户不能看
echo '这部分非常重要！当你看到时，说明你是本站用户<br />';
echo 'very important!';

?>