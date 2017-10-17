<html>
<?php
// This results in an error.
// The output above is before the header() call
header('Location: /web.njit.edu/~baw7/project1/forwardpage.php');
?>

<?php
$target_dir = "https://web.njit.edu/~baw7/project1/uploads";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file is an  actual csv
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    echo "File is a csv - " . $check["mime"] . ".";
        $uploadOk = 1;
        } else {
        echo "File is not a csv.";
        $uploadOk = 0;
                                                }
        }
  $GET ["fileToUpload"];
  $GET ["name"];
  header("Location: https://web.njit.edu/~baw7/project1/forwardpage.php");
exit;
$file = fopen("contacts.csv","r");
print_r(fgetcsv($file));
fclose($file);
?>
