<?php
$username = $_POST["username"];
$usersex = $_POST["usersex"];
$userschool = $_POST["userschool"];
$userthought= $_POST["userthought"];
$userinterest = $_POST["userinterest"];

?>

<!DOCTYPE html>
<html lang="zh-TW">    
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>表單結果</title>
  </head>

  <body bgcolor="#d1fce8">
    <?php
      if($usersex == "male"){
        echo "<h2>$username 先生您好！</h2>";
      }else{
        echo "<h2>$username 小姐您好！</h2>";
      }
      echo "您的學歷為:". $userschool . "<br>";

      echo "您喜歡下列活動如下: ";
      echo "<ul>";
        foreach ($userinterest as $value){
          echo "<li>" . $value . "</li>";
        }
      echo "</ul>";
      echo "您對於使用者臉書經營社群有何看法為：";
      echo "<br>";
      echo "<p>" . $userthought . "</p>";
    ?>
  </body>

</html>