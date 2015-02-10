<?php
class classFileType {
	/**
	 * 展示list页，
	 * @param string $dir
	 * @param string $file
	 */
	function listView($dir,$file){
		echo "<dd class='item cl'>";
		$altertime=filemtime($dir."\\".$file);
		echo "<div class='col c2 c_gray' title='修改时间'><span>".date("Y-m-d H:i",$altertime)."</span></div>";
		$filesize=filesize($dir."\\".$file);
		$filesize=$filesize/1024/1024;
		$filesize=round($filesize,2);
		echo "<div class='col c3 c_gray' title='文件大小'><span>".$filesize."M</span></div>";
		$value=explode('.',$file);
		if ($value[count($value)-1] == 'docx'){
			$icontype='doc';
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a href='".$filedir."' target='_blank'>".iconv('gb2312','utf-8',$file)."</a></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
		}elseif($value[count($value)-1] == 'pptx' || $value[count($value)-1] == 'ppt' || $value[count($value)-1] == 'pps'){
			$icontype='other';
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a href='".$filedir."' target='_blank'>".iconv('gb2312','utf-8',$file)."</a></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
		}elseif($value[count($value)-1] == 'xlsx'){
			$icontype='xls';
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a href='".$filedir."' target='_blank'>".iconv('gb2312','utf-8',$file)."</a></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
		}elseif($value[count($value)-1] == 'vsd'){
			$icontype='v';
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a href='".$filedir."' target='_blank'>".iconv('gb2312','utf-8',$file)."</a></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
		//处理txt文件。
		}elseif($value[count($value)-1] == 'txt'){
			$icontype='txt';
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			$txt = file_get_contents($dir."\\".$file);
			$encode = mb_detect_encoding($txt, array('GB2312','GBK','UTF-8','ASCII'));
			if($encode != 'UTF-8'){
				$txt = iconv($encode,'utf-8',$txt);
			}
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a class='txt' href='#'>".iconv('gb2312','utf-8',$file)."</a><span style='display:none'>".$txt."</span></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
			echo <<<EOF
<script type="text/javascript" src="layer/layer.min.js"></script>
<script>
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
</script>
EOF;
		//处理图片文件。
		}elseif($value[count($value)-1] == 'jpg' || $value[count($value)-1] == 'bmp' || $value[count($value)-1] == 'png' || $value[count($value)-1] == 'gif'){
			$icontype='pic';
			$filetype=$value[count($value)-1]; //获得图片类型
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			$fp=fopen($dir."\\".$file,"r")or die("Can't open file");
			$file_content=chunk_split(base64_encode(fread($fp,filesize($dir."\\".$file)))); //base64编码
			$img='data:image/'.$filetype.';base64,'.$file_content;//合成图片的base64编码
			fclose($fp);
			
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a class='pic' href='#'>".iconv('gb2312','utf-8',$file)."</a><span style='display:none'>".$img."</span></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
			echo <<<EOF
<script type="text/javascript" src="layer/layer.min.js"></script>
<script>
$('a[class=pic]').unbind('click').click(function(e){
	var imgcontent = $(this).next("span").html();
	$.layer({
		type: 1,
		title: false, //不显示默认标题栏
		shadeClose: true,
// 		shade: [0], //不显示遮罩
		area: ['500px', '500px'],
		page: {html: '<img width="500px" height="500px" src="'+ imgcontent +'">'}
	});
})
</script>
EOF;
		}else{
			$icontype=$value[count($value)-1];
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a href='".$filedir."' target='_blank'>".iconv('gb2312','utf-8',$file)."</a></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
		}
	}
}

?>