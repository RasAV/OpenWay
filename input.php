<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <form name="input_form" action="/input.php" method="post">

      <div>
        <a class="home" href="index.php" name="home"> На главную </a>
      </div>

      <div class="input_form" id="in_fio">
        <p style="font-size:18px"> Ваше ФИО </p>
        <input type="text" name="who">
      </div>

      <div class="input_form"  id="in_text">
        <p style="font-size:18px"> Напишите, почему вы хотите участвовать в школе OpenWay </p>
        <textarea name="message"></textarea>
      </div>

      <div class="input_form">
        <button id="send1" type="submit" name="but"> Отправить </button>
      </div>
    </form>

  </body>
</html>


<?php
  $data = $_POST;
  $FIO_input = $data["who"];
  $mess_input = $data["message"];

  if (isset($_POST["but"])) {
    if ($FIO_input == "") {
      ?>
        <div class="input_form" style="color:red"> Введите имя </div>
      <?php
    }
    elseif ($mess_input == "") {
      ?>
        <div class="input_form" style="color:red"> Введите ответ на вопрос </div>
      <?php
    }
    elseif (($FIO_input != "") && ($mess_input != "")) {
    ?>
      <div class="input_form" style="color:green"> Спасибо за участие! </div>
    <?php
      $mysqli = new mysqli ("localhost", "root", "", "participants");
      $mysqli->query ("SET NAMES 'utf8'");

      $mysqli->query ("INSERT INTO `members` (`FIO`, `mess`) VALUES('$FIO_input', '$mess_input')");


      $mysqli->close();
    }

  }

?>
