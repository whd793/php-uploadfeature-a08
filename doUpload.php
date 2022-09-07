<?php
session_start();

set_time_limit(300);

if($_POST["uploadFile"] != "")
{
  $fileExt = strrchr($_FILES['userfile']['name'], ".");
  
  if ( ($fileExt != ".jpg") && ($fileExt != ".gif") && ($fileExt != ".png") )
  {
    $_SESSION["badFileType"] = "You cannot upload a file of type ".$fileExt;
  }
  else
  {
    $fileName = $_FILES['userfile']['name'];
    
    if(!is_uploaded_file($_FILES['userfile']['tmp_name']))
    {
      echo "Problem: possible file upload attack";
      exit;
    }
    
    $counter = 24;
    
    $upfile = "upload/".$_POST["category"].$counter.".jpg";
    
    if(!copy($_FILES['userfile']['tmp_name'], $upfile))
    {
      echo "Problem: Could not move file into directory";
      exit;
    }
    
    $_SESSION["badFileType"] = "File Successfully Uploaded.";
    
  }
  
}
else
{
  $_SESSION["badFileType"] = "";
}

header("Location: upload.php");
?>