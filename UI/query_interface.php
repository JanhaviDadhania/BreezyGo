<?php

session_start();

echo <<<_END
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
    text-align: center
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 100px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: center;
  padding: 6px 10px;
  margin-top: 200px;
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

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>




<div class="topnav">
  <div class="search-container">
  <img src="breezygo.jpg" width="300" height="275" title="Logo of a company" alt="Logo of a company" />

    <form action="serp.php" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>

  </div>
</div>



</body>
</html>
_END;
?>
