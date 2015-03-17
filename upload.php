<meta charset="utf-8">
<?php
    //包含一个文件上传类中的上传类
    include "fileupload.class.php";
    require_once 'config.php';
    //设定上传目录.
  	if ($_POST["mulu"] == 'tooldocs'){
  		$topass = TOOLDOCS;	
  	}elseif ($_POST["mulu"] == 'prodocs'){
  		$topass = PRODOCS;	
  	}elseif ($_POST["mulu"] == 'freshdocs'){
  		$topass = FRESHDOCS;	
  	}elseif ($_POST["mulu"] == 'TBpic'){
  		$topass = TBPIC;	
  	}elseif ($_POST["mulu"] == 'workpic'){
  		$topass = WORKPIC;	
  	}elseif ($_POST["mulu"] == 'livepic'){
  		$topass = LIVEPIC;	
  	}elseif ($_POST["mulu"] == 'teamvideo'){
  		$topass = TEAMVIDEO;	
  	}elseif ($_POST["mulu"] == 'otherpic'){
  		$topass = OTHERPIC;	
  	}elseif ($_POST["mulu"] == 'studytest'){
  		$topass = STUDYTEST;	
  	}elseif ($_POST["mulu"] == 'studyphp'){
  		$topass = STUDYPHP;	
  	}elseif ($_POST["mulu"] == 'studynet'){
  		$topass = STUDYNET;	
  	}elseif ($_POST["mulu"] == 'studyjava'){
  		$topass = STUDYJAVA;	
  	}elseif ($_POST["mulu"] == 'studydatabase'){
  		$topass = STUDYDATABASE;	
  	}elseif ($_POST["mulu"] == 'studylinux'){
  		$topass = STUDYLINUX;	
  	}elseif ($_POST["mulu"] == 'studyother'){
  		$topass = STUDYOTHER;	
  	}else{
  		$topass = "D:\\laji";
  	}
    $up = new fileupload;
    //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
    $up -> set("path", $topass);
    $up -> set("maxsize", 50000000);
    $up -> set("allowtype", array("doc", "docx", "xls", "xlsx", "ppt", "pptx", "txt", "pdf", "jpg", "bmp", "png", "gif"));
    $up -> set("israndname", false);
    //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
    if($up -> upload("file")) {
        //获取上传后文件名子
        echo "恭喜！".$up->getFileName()."上传成功<br/>";
        echo '<br/><input type="button" value="继续上传" name="name" onclick="javascript: window.history.back(-1);"/> <input type="button" value="关闭" name="name" onclick="javascript: window.close();"/>';
            } else {
        //获取上传失败以后的错误提示
        echo($up->getErrorMsg());
        echo '<br/><input type="button" value="继续上传" name="name" onclick="javascript: window.history.back(-1);"/> <input type="button" value="关闭" name="name" onclick="javascript: window.close();"/>';
    }
?>