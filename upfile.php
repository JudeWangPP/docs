<meta charset="utf-8">
<h2>上传文档</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
	选择上传的模块：
	<select id="mulu" name="mulu">
		<option disabled="disabled">－－常用文档－－</option>
		<option value="tooldocs">工具说明文档</option>
		<option value="prodocs">项目相关资料</option>
		<option value="freshdocs">新人阅读文档</option>
		
		<option disabled="disabled">－－照片影像－－</option>
		<option value="TBpic">TB照片</option>
		<option value="workpic">工作照片</option>
		<option value="livepic">生活照片</option>
		<option value="teamvideo">团队视频</option>
		<option value="otherpic">其他照片</option>
		
		<option disabled="disabled">－－技术相关资料－－</option>
		<option value="studytest">TEST</option>
		<option value="studyphp">PHP</option>
		<option value="studynet">.NET</option>
		<option value="studyjava">JAVA</option>
		<option value="studydatabase">DATABASE</option>
		<option value="studylinux">LINUX</option>
		<option value="studyother">OTHER</option>
	</select>
	<br />
	<br /> 
	选择上传的文件：
	<input type="file" name="file" value="">
	<br />
	<br />
	<input type="submit" value="上传" /><br>
</form>
<pre>
注：支持的文件类型 "doc", "docx", "xls", "xlsx", "ppt", "pptx", "txt", "pdf"

    支持的图片类型："jpg", "bmp", "png", "gif"

    上传的文件不能超过50M
</pre>