
<aside class="Hui_aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu_1">
			<dt>
				常用文档<b></b>
			</dt>
			<dd>
				<ul>
					<li><a href="tooldocs.php">工具说明文档</a></li>
					<li><a href="proDocs.php">项目相关资料</a></li>
					<li><a href="freshReadDocs.php">新人阅读文档</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu_2">
			<dt>
				照片&影像<b></b>
			</dt>
			<dd>
				<ul>
					<li><a href="TBpic.php">TB照片</a></li>
					<li><a href="workpic.php">工作照片</a></li>
					<li><a href="livepic.php">生活照片</a></li>
					<li><a href="teamvideo.php">团队视频</a></li>
					<li><a href="otherpic.php">其他照片</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu_3">
			<dt>
				技术相关资料<b></b>
			</dt>
			<dd>
				<ul>
					<li><a href="studytest.php">TEST</a></li>
					<li><a href="studyphp.php">PHP</a></li>
					<li><a href="studynet.php">.NET</a></li>
					<li><a href="studyjava.php">JAVA</a></li>
					<li><a href="studydatabase.php">DATABASE</a></li>
					<li><a href="studylinux.php">LINUX</a></li>
					<li><a href="studyother.php">OTHER</a></li>
				</ul>
			</dd>
		</dl>
	</div>
	<script type="text/javascript">
	$(function(){
		var webSite2 ="。/";
		var loc=location.href;var url2 = loc.replace(webSite2,"");
		$(".menu_dropdown ul li").each(function(){var current = $(this).find("a");$(this).removeClass("current");if(url2 == $(current[0]).attr("href")){$(this).addClass("current");}});
	});

    function uiVisible(){
       
    	var url=window.location.href.split("/");
		var pname=url[url.length-1];
		for(var i=0;i<$("a").length;i++){
			if($($("a")[i]).attr("href")==pname || $($("a")[i]).attr("href")+'#'==pname){
				$($("a")[i]).parents("li").addClass("current");
				$($("a")[i]).parents("dl").addClass("selected");
			}
		}
	};
	uiVisible();
	</script>

</aside>