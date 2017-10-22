
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
class Manage {
    public static function autoload($class) {
        include $class . '.php';
    }
}
spl_autoload_register(array('Manage', 'autoload'));
$obj = new main();
class main
{
    public function __construct()
    {
        $pageRequest = 'home';
        if (isset($_REQUEST['page'])) {
            $pageRequest = $_REQUEST['page'];
        }
        $page = new $pageRequest;
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            $page->post();
        }
    }
}
abstract class page {
    protected $html;
    public function __construct()
    {
        $this->html .= '<html>';
        $this->html .= '<link rel="stylesheet" href="style.css">';
        $this->html .= '<body>';
    }
    public function __destruct()
    {
        $this->html .= '</html></body>';
        stringFunctions::printThis($this->html);
    }
    public function get(){
        echo 'Get method parent class';
    }
    public function post(){
        echo 'Post method parent class';
    }
}
class home  extends page {
    public function get()
    {
        $form = '<form method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit"	value"Upload CSV File" name="submit">';
        $form .= '</form>';
        $this->html .= '<h1><b>Upload CSV</h1></b>';
        $this->html .= $form;
    }
    public function post()
    {
        $target_dir = "uploads/";
        $target_file = str_replace(' ', '_', $target_dir . basename($_FILES["fileToUpload"]["name"]));
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $imageFileName = pathinfo($target_file,PATHINFO_BASENAME);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        header('Location: index.php?page=table&fileName='.$imageFileName);
    }
}
class table extends page {
    public function get()
    {
        $tableDisplay="";
        $imageFileName = $_REQUEST['fileName'];
        $file = fopen("uploads/".$imageFileName,"r");
        $tableDisplay .='<table border="1">';
        while(! feof($file))
        {
            $table=(fgetcsv($file));
            $arrlength = count($table);
            $i=0;
            $tableDisplay .='<tr>';
            for ($i=0;$i<$arrlength;$i++)
            {
                $tableDisplay .='<td>'.$table[$i].'</td>';
            }
            $tableDisplay .='</tr>';
        }
        $tableDisplay .='</table>';
        print($tableDisplay);
        fclose($file);
    }
}
class stringFunctions {
    static public function printThis($inputText) {
        return print($inputText);
    }
    static public function stringLength($text) {
        return strLen($text);
    }
}
?>
