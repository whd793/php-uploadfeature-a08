<?php
session_start();
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 08 - Upload</title>
	<meta http-equiv="Content-Type" content="text/html; UTF-8" />
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea, ul li select{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; 
														font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#info {position:absolute; top:100px; left:20px; width:460px; }
		fieldset#submit {position:absolute; top:240px; left:20px; width:460px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#errorMsg {color:#ff0000; font-weight:bold; font-size:12pt; position:absolute; top:300px; left:25px;}
		div#newLogin {color:#0000ff; font-size:12pt; position:absolute; top:350px; left:25px;}
	</style>
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 08 - Upload</h1>

<?php include("includes/menu.php"); ?>

<form id="form0" method="post" action="doUpload.php" enctype="multipart/form-data"> 
    <fieldset id="info">
        <input type="hidden" name="src" value="upload.php" />
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <legend>Upload 1 File</legend>
        <ul>
            <li> <label title="category" for="category">Category <span>*</span></label>
	            <select name="category" id="category">
                    <option value="Furniture">Furniture</option>
                    <option value="Fixtures">Fixtures</option>
                    <option value="Accessories">Accessories</option>
				</select>
            </li>
            <li> <label title="userfile" for="userfile">File: <span>*</span></label> <input type="file" name="userfile" id="userfile" size="25" /></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input type="submit" id="uploadFile" name="uploadFile" value="Upload File" />
    </fieldset>
</form>

<div id="errorMsg"><?php if(!empty($_SESSION["badFileType"])){echo($_SESSION["badFileType"]);} ?></div>

<script type="text/javascript">
	document.getElementById("category").focus();
</script>

<?php
$_SESSION["badFileType"] = "";
?>
</body>
</html>