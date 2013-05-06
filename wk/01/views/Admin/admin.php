<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> table</title>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/table.js"></script>
  <style>
  table td{width:120px;overflow: hidden;white-space:normal; word-break:break-all;height:50px}
	.editarea {
		width:110px;
		height:50px;
	}
  </style>
 </head>
 <body>
<?php

if (is_array($this->data)) {
	echo '<table  id="tableList" border="1px" align="center" >';
	echo '<caption>后台表单</caption>';
	echo '<tr><th>用户名</th><th>序列号</th><th width="200px">机器码</th><th>返回KEY</th><th>次数</th><th>时间</th><th>备注</th><th>操作</th></tr>';
	foreach ($this->data as $val) {
		echo '<tr>';
		echo "<td class=\"enableEdit\" rel='username' ref='{$val['id']}'>{$val['username']}</td>";
		echo "<td class=\"enableEdit\" rel='sid' ref='{$val['id']}'>{$val['sid']}</td>";
		echo "<td class=\"enableEdit\" rel='code' ref='{$val['id']}'>{$val['code']}</td>";
		echo "<td class=\"enableEdit\" rel='key' ref='{$val['id']}'>{$val['key']}</td>";
		echo "<td class=\"enableEdit\" rel='num' ref='{$val['id']}'>{$val['num']}</td>";
		echo "<td >{$val['date']}</td>";
		echo "<td class=\"enableEdit\" rel='desc' ref='{$val['id']}'>{$val['desc']}</td>";
		echo "<td><a href='admin.php?a=del&id={$val['id']}'>删除</a></td>";
		echo '</tr>';
	}
	echo '</table>';
}
?>

 </body>
</html>
