<?php
session_start();

/*echo <<<_END
<form action="curl.php" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>

_END;*/

echo <<< _END
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="query_interface.php">Home</a>
  <a href="about.txt">About</a>
  <div class="search-container">
    <form action="curl2.php" method='post'>
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

</body>


_END;

$post = $_SESSION['search'];

//if(isset($_POST["search"])) {
    //echo $_POST["search"];
//}
//else {
    //echo "sorry no result.";
//}
$variable=$post;
// From URL to get webpage contents.
$url = "http://localhost:8983/solr/jcg/select?q=name:*$variable*&wt=json";

// Initialize a CURL session.
$ch = curl_init();

// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_URL, $url);

$result = curl_exec($ch);
//echo count($result);
//echo var_dump($result);
$myJSON = json_encode($result);
//echo var_dump($myJSON);
//$output = json_validate("sfshfkjsf,ghkghsjhsd[]   [ ]{");
//echo $output;

$json=$myJSON;

$ob = json_decode($json,true);
if($ob === null) {
    echo "sorry, error occured. :( ";
 // $ob is null because the json cannot be decoded
}
//echo $ob;
//echo var_dump($ob);
//$key="responseHeader";
//$one=$ob[$key];
//echo $myJSON["responseHeader"]["status"];
$match="";
preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $ob, $match);

//echo "<pre>";
//print_r($match[0]);
//echo "</pre>";







for($x=0;$x<count($match[0]);$x++) {
    //echo $match[0][$x];
    echo "<br/>";

    $email = '<a href= "'.$match[0][$x].'" >'.$match[0][$x].'</a>';
    echo "<br/>";
    echo "<br/>";
    $string = $email;
    echo $string;
}


//ini_set("display error",1);
//$ch = curl_init();

/*curl_setopt($ch, CURLOPT_URL, 'http://localhost:8983/solr/jcg/select?q=name:%22https://stackoverflow.com/help%22&rows=345');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
echo $result;
curl_close($ch);*/
?>
