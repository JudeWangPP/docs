<?php
    //包含一个文件上传类中的上传类
    include "fileupload.class.php";
    require_once 'config.php';
    //设定上传目录.
  	if ($_GET["mulu"] == 'tooldocs'){
  		$topass = TOOLDOCS;	
  	}elseif ($_GET["mulu"] == 'prodocs'){
  		$topass = PRODOCS;	
  	}else{
  		$topass = "D:\\laji";
  	}
    $up = new fileupload;
    //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
    $up -> set("path", $topass);
    $up -> set("maxsize", 10000000);
    $up -> set("allowtype", array("doc", "docx", "xls", "xlsx", "ppt", "pptx", "txt"));
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