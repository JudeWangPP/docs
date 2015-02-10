
<!doctype html>
<html>
<head>
<title>开始使用layer</title>
</head>
<body>
	<a id="test1" href="#">小小提示层</a>

	你必须先引入jQuery1.8或以上版本
	<script type="text/javascript" src="Lib/jquery.min.js"></script>
	<script type="text/javascript" src="layer/layer.min.js"></script>
	<script>

$('#test1').on('click', function(){
	    $.layer({
	        type: 1,
	        title: false, //不显示默认标题栏
// 	        shade: [0], //不显示遮罩
	        area: ['500px', '500px'],
	        page: {html: '<img width="500px" height="500px" src="/tong.jpg">'}
	    });
});

</script>

</body>
</html>
