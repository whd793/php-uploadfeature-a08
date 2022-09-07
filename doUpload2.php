<?php
session_start();

set_time_limit(300);

if($_POST["uploadFile"] != "")
{
  $counter = 54;
  
  for($i=1; $i<6; $i++){
    
     $fileExt = strrchr($_FILES['userfile'.$i]["name"], ".");
  
  if (($fileExt != ".jpg") && ($fileExt != ".gif") && ($fileExt != ".png") )
  {
    $_SESSION["badFileType"] = "You cannot upload a file of type ".$fileExt;
  }
  else
  {
    $fileName = $_FILES['userfile'.$i]['name'];
    
    if(!is_uploaded_file($_FILES['userfile'.$i]['tmp_name']))
    {
      echo "Problem: possible file upload attack";
      exit;
    }
    
    
    $upfile = "upload/".$_POST["category"].$counter.$fileExt;
    
    if(!copy($_FILES['userfile'.$i]['tmp_name'], $upfile))
    {
      echo "Problem: Could not move file into directory";
      exit;
    }
    
    $_SESSION["badFileType"] = "File Successfully Uploaded.";
    
    $counter++;
  }
  
}
  
  }
  
 
else
{
  $_SESSION["badFileType"] = "";
}

header("Location: upload2.php");
?>