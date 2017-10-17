<?php
$allowedExts = array("csv", "doc");
$allowedTypes = array("text/csv",'..','..',"image/doc");

$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((in_array($_FILES["file"]["type"], $allowedTypes))
   && ($_FILES["file"]["size"] < 20000)
      && in_array($extension, $allowedExts))
      {
      if ($_FILES["file"]["error"] > 0)
      {
         echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	 }
	 else
	 {

	 if (file_exists("upload/" . $_FILES["file"]["name"]))
	   {
	     echo $_FILES["file"]["name"] . " already exists. ";
	       }
	         else
		   {
		       move_uploaded_file($_FILES["file"]["tmp_name"],
		       "upload/" . $_FILES["file"]["name"]);
		           header('Location: forwardpage.html');
			     }
			       }
			       }
			       else
			       {
			       echo "Invalid file";
			       }
			       ?>
<!DOCTYPE html>
<html>
<body>

<form
action="https://web.njit.edu/~baw7/project1/uploads/forwardpage.html" method="post"
enctype="multipart/form-data">
Select file to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload File" name="submit">
</form>


</body>
</html>

