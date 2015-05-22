
<?php
if($_GET["type"]=="download"){  //实现图片下载
	$filedir=$_GET["filedir"];
	$value=explode('\\',$filedir);
	$filename = $value[count($value)-1];
	if(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome")){
		$filedir = iconv('utf-8','gb2312',$filedir);
	}elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox")){
		$filedir = iconv('utf-8','gb2312',$filedir);
	}elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Safari")){
		$filedir = iconv('utf-8','gb2312',$filedir);
	}
	
	$ua = $_SERVER["HTTP_USER_AGENT"];
	if(is_file($filedir)) {
		header("Content-Type: application/force-download");
		header("Content-Disposition: attachment; filename=".$filename);
		ob_clean();
		flush();
		readfile($filedir);
		exit;
	}else{
		echo "{$filedir}文件不存在！";
		exit;
	}
	
}elseif($_GET["type"]=="imgcontent"){  //实现图片预览
	$dir=$_GET["filedir"];
	$value=explode('\\',$dir);
	$filename = $value[count($value)-1];//获取文件名
	
	$value=explode('.',$dir);
	$filetype=$value[count($value)-1]; //获得图片类型
	
	$filedir = iconv('utf-8','gb2312',$dir);
	$fp=fopen($filedir,"r")or die("Can't open file");
	$file_content=chunk_split(base64_encode(fread($fp,filesize($filedir)))); //base64编码
	$img='data:image/'.$filetype.';base64,'.$file_content;//合成图片的base64编码
	echo $img;
	fclose($fp);
	
}

?>