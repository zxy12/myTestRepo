		$(function() { // 相当于在页面中的body标签加上onload事件
			$(".enableEdit").click(function() { // 给页面中有caname类的标签加上click函数
			var objTD = $(this);
			var oldText = $.trim(objTD.text()); // 保存老的类别名称
			var input = $("<textarea class='editarea'>" + oldText + " </textarea>"); // 文本框的HTML代码
			objTD.html(input); // 当前td的内容变为文本框
			// 设置文本框的点击事件失效
			input.click(function() {
				return false;
			});
			// 设置文本框的样式
			input.css("border-width", "0px"); //边框为0
			input.height(objTD.height()); //文本框的高度为当前td单元格的高度
			input.width(objTD.width()); // 宽度为当前td单元格的宽度
			input.css("font-size", "14px"); // 文本框的内容文字大小为14px
			input.css("text-align", "center"); // 文本居中
			input.trigger("focus").trigger("select"); // 全选
			// 文本框失去焦点时重新变为文本
			input.blur(function() {
				var newText = $(this).val(); // 修改后的名称
				var input_blur = $(this);
				var type = objTD.attr('rel');
				var data_id = objTD.attr('ref');
				// 当老的类别名称与修改后的名称不同的时候才进行数据的提交操作
				if (oldText != newText) {
				// AJAX异步更改数据库
				var url = "admin.php?a=ajax&data=" + newText + "&type=" + type + "&id=" + data_id + "&t=" + new Date().getTime();
				$.get(url, function(data) {
				if (data != "1") {
					alert(data);
				//$("#test").text("类别修改失败,请检查是否类别名称重复!");
				//input_blur.trigger("focus").trigger("select"); // 文本框全选
				} else {
				$("#test").text("");
				objTD.html(newText);
			}
			});
			} else {
				// 前后文本一致,把文本框变成标签
				objTD.html(newText);
			}
		});
		// 在文本框中按下键盘某键
		input.keydown(function(event) {
		var jianzhi = event.keyCode;
		var input_keydown = $(this);
		switch (jianzhi) {
		case 13:
		break;
		case 27: // 按下Esc键, 取消修改,把文本框变成标签
		$("#test").text("");
		objTD.html(oldText);
		break;
		}
		});
		});
		});
