<?php
  include_once "/classes/Shout.php";
  $shout = new Shout();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Basic Shout Box</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="wrapper clr">
      <header class="headsection clr">
        <h2>Basic Shoutbox with PHP OOP & MYSQLI</h2>
      </header>
      <section class="content clr">
        <div class="box">
          <ul>
            <?php
              $getData = $shout->getAllData();
              if($getData){
                while($data = $getData->fetch_assoc()){ ?>
              <li><span><?php echo $data['time']; ?></span> - <b><?php echo $data['name']; ?> </b><?php echo $data['body']; ?></li>
            <?php    }
              }
            ?>
          </ul>
        </div>
  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $shoutData = $shout->insertData($_POST);
    }
  ?>
        <div class="shoutform clr">
          <form action="index.php" method="POST">
            <table>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td>
                  <input
                    type="text"
                    name="name"
                    required
                    placeholder="Enter Your Name"
                  />
                </td>
              </tr>
              <tr>
                <td>Body</td>
                <td>:</td>
                <td>
                  <input
                    type="text"
                    name="body"
                    required
                    placeholder="Enter Your Message"
                  />
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Shout It" /></td>
              </tr>
            </table>
          </form>
        </div>
      </section>
      <footer class="footsection clr">
        <h2>Copyright &copy; 2019</h2>
      </footer>
    </div>
  </body>
</html>
