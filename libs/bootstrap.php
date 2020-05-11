<?php
class Bootstrap {
    public function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $file = 'controllers/' . $url[0] . '.php';
//        require_once
        if(file_exists($file)) {
            require $file;
        } else {
            require 'controllers/errors.php';
            $errors = new Errors();
            return false    ;
        }
        $controllers = new $url[0];



        if (isset($url[2])) {
            $controllers->$url[1]($url[2]);
        } else {
            if (isset($url[1])) {
                $controllers->$url[1]();
            }
        }
    }
}


echo '<hr>';


exit;
echo '<hr>';
// echo 'TTTTT';
// var_dump($_POST);
$url = "api.weatherbit.io/v2.0/current?key=4a000d391b154774add3102441511440&lang=uk&city=kharkov&city2=kiev";
$request = curl_init();
curl_setopt($request, CURLOPT_URL, $url);
// curl_setopt($request, CURLOPT_POST, true);
// curl_setopt($request, CURLOPT_HEADER, []);
// curl_setopt($request, CURLOPT_POSTFIELDS, $data);
$responsive = curl_exec($request);
curl_close($request);
var_dump($responsive);
// phpinfo();
$url = "http://www.amazon.com/exec/obidos/search-handle-form/002-5640957-2809605";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
curl_setopt($ch, CURLOPT_FAILONERROR, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
curl_setopt($ch, CURLOPT_POST, 1); // set POST method
curl_setopt($ch, CURLOPT_POSTFIELDS, "url=index%3Dbooks&field-keywords=PHP+MYSQL"); // add POST fields
$result = curl_exec($ch); // run the whole process
curl_close($ch);
echo $result;
echo "<hr>";
$arr = ["Russia" => 'Moscow', "Italy" => 'Milan'];
var_dump($arr);
echo "<hr>";
$a = json_encode($arr);
echo $a;
$b = json_decode($a);
var_dump($b);
echo "<hr>";
/*$filename = file_get_contents("./sunday.json");
$file = fopen($filename, "r+");*/
// fread($file, length);
// fgets(handle);
// fclose(handle);
$ch = curl_init();
$url = "api.weatherbit.io/v2.0/current?key=4a000d391b154774add3102441511440&lang=uk&city=kharkov&city2=kiev";
$html = curl_setopt($ch, CURLOPT_URL, $url);
$d = curl_exec($ch);
var_dump($html);

curl_close($ch);

