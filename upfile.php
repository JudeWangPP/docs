<meta charset="utf-8">
<h2>上传文档</h2>
<form action="upload.php?mulu=tooldocs" method="post" enctype="multipart/form-data">
	选择上传的模块：
	<select id="mulu">
		<option value="tooldocs">工具说明文档</option>
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
注：支持的文件类型 "doc", "docx", "xls", "xlsx", "ppt", "pptx", "txt"

    上传的文件不能超过10M
</pre>