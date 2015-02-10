<?php require_once 'config.php';?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="Lib/html5.js"></script>
	<![endif]-->
	<link href="static/h-ui/css/H-ui.css?v2013122601" rel="stylesheet" type="text/css" />
	<link href="static/h-ui/css/H-ui.doc.css?v2013122601" rel="stylesheet" type="text/css" />
	<link href="static/h-ui/css/H-ui.yun.css?v" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="Lib/jquery.min.js"></script>
	<script type="text/javascript" src="static/h-ui/js/H-ui.js?v2013122601"></script>
	<script type="text/javascript" src="static/h-ui/js/common.js?v2013122601"></script>
	<!--[if IE 6]>
	<script type="text/javascript" src="Lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('.pngfix,.icon,.list-icon');</script>
	<![endif]-->
	<script type="text/javascript" src="Lib/stickUp.min.js"></script>
	<title>工具说明文档</title>
</head>
<body>
<?php require_once 'header.php';?>
	<div class="cl frame-main">
		<?php require_once 'slider.php';?>
		<div class="dislpayArrow">
			<a ID = "wangzhipeng" class="pngfix" href="javascript:void(0);"></a>
		</div>
		<section class="Hui_article">
			<nav class="Hui_breadcrumb">
				<a class="maincolor" href="./">首页</a> 
				<span class="c_gray en">&gt;</span>
				<span class="c_gray">照片＆影像</span>
				<span class="c_gray en">&gt;</span>
				<span class="c_gray">其他照片</span>
				<span class="r"><a class="maincolor" href="upfile.php" target="_black">上传文件</a>　</span>
			</nav>
<!-- 			开始正文内容			 -->
			<div class="Hui_articlebox">
				<article class="admin_con listview">
				<div class="dir-path cl pt-5 pb-5 pl-10 pr-10"><span class="l">全部文件</span><span class="r">已加载11个</span></div>
					<header class="cl">
						<div class="col c2">
							<span>修改时间</span>
						</div>
						<div class="col c3">
							<span>大小</span>
						</div>
						<div class="col c1">
							<span>文件名</span>
						</div>
					</header>
					<dl>
					<?php
						require_once 'classFileType.php'; 
						$dir=OTHERPIC;
						if(is_dir($dir)){
							$sh = opendir($dir);
							$list = new classFileType();
							while (($file = readdir($sh)) != false){
								if (filetype($dir."\\".$file) == "dir"){
									//做dir 干的事情
								}else{
									$list->listView($dir, $file);
								}
							}
							closedir($sh);
						}
					?>
					</dl>
				</article>
			</div>
<!-- 			正文内容结束			 -->
		</section>
	</div>	
</body>
</html>