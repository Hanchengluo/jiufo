window.onload = function() {
	$("tbody").on("click", "#delete", function(event) {
		if(!confirm("确认要删除吗？")) {
			return false;
			var e = event || window.event;
			e.preventDefault();
		} else {
			var url = $(this).attr('href');
			$.ajax({
				type: "get",
				url: url,
				dataType: "json",
				success: function(msg) {
					$(".pagination").html(msg.str);
					var str = '';
					for(var i = 0; i < msg.result.length; i++) {
						if(i % 2 == 0) {
							str += '<tr class=alt-row><td><input type="checkbox" cid="1" /></td>';
						} else {
							str += '<tr ><td><input type="checkbox" cid="1" /></td>';
						}
						str += '<td>' + msg.result[i].id + '</td>';
						str += '<td><a href="#" title="title">' + msg.result[i].title + '</a></td>';
						str += '<td>' + msg.result[i].type + '</td>';
						str += '<td>' + msg.result[i].mktime + '</td>';
						str += '<td><a href="index.php?f=admin&c=reEdit&id=' + msg.result[i].id + '" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
						str += '<a id="delete" href="index.php?f=admin&c=index&id=' + msg.result[i].id + '&p=' + msg.p + '" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>';
						str += '<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a></td></tr>';
					}
					$("tbody").html(str);
				}
			});
			return false;
		}
	})

	$(".pagination").on("click", "a", function() {
		var url = $(this).attr('href');
		$.ajax({
			type: "get",
			url: url,
			dataType: "json",
			success: function(msg) {
				$(".pagination").html(msg.str);
				var str = '';
				for(var i = 0; i < msg.result.length; i++) {
					if(i % 2 == 0) {
						str += '<tr class=alt-row><td><input type="checkbox"/><input type="hidden" name="" id="" value="' + msg.p + '" /></td>';
					} else {
						str += '<tr ><td><input type="checkbox"/><input type="hidden" name="" id="" value="' + msg.p + '" /></td>';
					}
					str += '<td>' + msg.result[i].id + '</td>';
					str += '<td><a href="#" title="title">' + msg.result[i].title + '</a></td>';
					str += '<td>' + msg.result[i].type + '</td>';
					str += '<td>' + msg.result[i].mktime + '</td>';
					str += '<td><a href="index.php?f=admin&c=reEdit&id=' + msg.result[i].id + '" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
					str += '<a id="delete" href="index.php?f=admin&c=index&id=' + msg.result[i].id + '&p=' + msg.p + '" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>';
					str += '<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a></td></tr>';
				}
				$("tbody").html(str);	
			}

		});
		return false;
	});

	$(".bulk-actions .button").click(function() {
		if($(".bulk-actions [name='dropdown']").val() == 'option3') {
			var arr = [];
			var $check = $("tbody :checked");
			for(var i = 0; i < $check.length; i++) {
				arr[i] = $check.eq(i).parent().next().text();
				var cid = $check.eq(i).next().val();
			}
			if(!confirm("确认要删除吗？")) {
				var e = event || window.event;
				e.preventDefault();
			} else {
				$.ajax({
					type: "post",
					url: "delet.php",
					dataType: "json",
					data: {
						"idArr": arr,
						"cid": cid
					},
					success: function(msg) {
						$(".pagination").html(msg.str);
						var str = '';
						for(var i = 0; i < msg.result.length; i++) {
							if(i % 2 == 0) {
								str += '<tr class=alt-row><td><input type="checkbox"/><input type="hidden" name="" id="" value="' + msg.p + '" /></td>';
							} else {
								str += '<tr ><td><input type="checkbox"/><input type="hidden" name="" id="" value="' + msg.p + '" /></td>';
							}
							str += '<td>' + msg.result[i].id + '</td>';
							str += '<td><a href="#" title="title">' + msg.result[i].title + '</a></td>';
							str += '<td>' + msg.result[i].type + '</td>';
							str += '<td>' + msg.result[i].mktime + '</td>';
							str += '<td><a href="index.php?f=admin&c=reEdit&id=' + msg.result[i].id + '" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>';
							str += '<a id="delete" href="index.php?f=admin&c=index&id=' + msg.result[i].id + '&p=' + msg.p + '" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a>';
							str += '<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a></td></tr>';
						}
						$("tbody").html(str);
					}
				});
			}
		}
		return false;
	})
}