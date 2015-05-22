	//<!-- 点击图片预览所需js -->
	$('a[class=pic]').unbind('click').click(function(e){
		var imgcontent = $(this).attr('filedir'); + $(this).html();
		$.get("man.php?type=imgcontent&filedir=" + imgcontent, function(data){
			$.layer({
				type: 1,
				title: false, //不显示默认标题栏
				closeBtn: false, //不显示关闭按钮
				shadeClose: true,
//		 		shade: [0], //不显示遮罩
				area: ['500px', '500px'],
				page: {html: '<img height="500px" src="'+ data +'">'}
			});
		});
	})
	
//<!-- 点击txt预览所需js -->
$('a[class=txt]').unbind('click').click(function(e){
	var txt = $(this).next("span").html();
	$.layer({
		type: 1,
		title: false, //不显示默认标题栏
		shadeClose: true,
// 		shade: [0], //不显示遮罩
		area: ['500px', '500px'],
		page: {html: '<div style="width:500px; height:500px; overflow:auto; border:1px solid #000000;"><pre>'+ txt +'</pre></div>'}
	});
})