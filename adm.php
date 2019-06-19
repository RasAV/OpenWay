<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <form name="input_form" action="/adm.php" method="post">

      <p>
        <a class="home" href="index.php" name="home"> На главную </a>
      </p>

      <div class="adm_form" id="adm_log">
        <p> Логин </p>
        <input type="text" name="login">
      </div>

      <div class="adm_form" id="adm_pas">
        <p> Пароль </p>
        <input type="password" name="password"></input>
      </div>

      <div class="adm_form">
        <button id="send2" type="submit" name="check"> Отправить </button>
      </div>
    </form>


    <?php
      if (isset($_POST["check"])) {
        if (($_POST["login"] == 'admin') && ($_POST["password"] == 'admin')){
          @mysql_connect("localhost", "root", "");
          @mysql_select_db("participants");

          $result = mysql_query('SELECT * FROM `members`');
          $cnt = 1;
    ?>

      <?php
        while($row = mysql_fetch_array($result)) {
      ?>
            <div class="table">
              <div class="id_tab"> <?php echo "№", $cnt ?> </div>
              <div class="fio_tab"> <?php echo $row['FIO'] ?> </div>
              <div class="text_tab"> <?php echo  $row['mess'] ?> </div>
            </div>
            <br>
            <?php $cnt++ ?>
      <?php }

        }
        else {?>
          <div class="input_form" id="adm_mess" style="color:red"> Вы неверно ввели комбинацию логин и пароль </div>
          <?php
        }
      }
    ?>

  </body>

</html>
