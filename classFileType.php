<?php
class classFileType {
	/**
	 * 展示list页，
	 * @param string $dir
	 * @param string $file
	 */
	function listView($dir,$file){
		$value=explode('.',$file);
		if($value[count($value)-1] == 'db'){
			//过滤一些文件格式
		}else{
			//开始处理正常文件格式
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
		//处理图片文件。
		}elseif(strtolower($value[count($value)-1]) == 'jpg' || strtolower($value[count($value)-1]) == 'bmp' || strtolower($value[count($value)-1]) == 'png' || strtolower($value[count($value)-1]) == 'gif'){
			$icontype='pic';
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a class='pic' filedir='".$filedir."' href='#'>".iconv('gb2312','utf-8',$file)."</a></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";

		}else{
			$icontype=$value[count($value)-1];
			$filedir = $dir."\\".iconv('gb2312','utf-8',$file);
			echo "<div class='col c1'><span><i class='sprite-list-ic icon-".$icontype."'></i> <a href='".$filedir."' target='_blank'>".iconv('gb2312','utf-8',$file)."</a></span></div>";
			echo "<div class='listeditbar'><a href='man.php?type=download&filedir=".$filedir."' target='_blank' class='btn radius btn-small btn-success'>下载到本地</a></div>";
			echo "</dd>";
		}
	}
}

}
?>