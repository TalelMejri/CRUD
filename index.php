<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>CRUD</title>
</head>
<body>
    <?php require_once "process.php";
        $db=new mysqli("localhost","root","","bootstrrap") or die(mysqli_error($db));
    ?>
     <table  class="table "  >
         <tr>
             <th>Id</th>
             <th>Nom</th>
             <th>Email</th>
             <th>Password</th>
             <th>Action</th>
         </tr>
         <?php 
            $res=$db->query("select * from crud");
            while($row=$res->fetch_assoc()){
         ?>
          <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['Nom']; ?></td>
              <td><?php echo $row['Email']; ?></td>
              <td><?php echo $row['Password']; ?></td>
              <td>
                   <a href="index.php?edit=<?php echo $row['id']?>" class="btn btn-info" onclick="return confirm('do you really want update this profil');";>edit</a>
                    <a href="process.php?delete=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('do you want delete this !');">delete</a>
                </td>
          </tr>
         <?php }?>
     </table>
     
     <div class="container">
         <form action="process.php" method="post" name="f">
          <?php if (isset($_SESSION['message'])){?>
             <div class="alert alert-<?= $_SESSION['msg_type']?>">
               <?php
               echo $_SESSION['message'];?>
             </div>
           <?php }?>
            <div class="form-group mb-3">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <label >NOM :</label>
                <input type="text" name="nom" class="form-group" placeholder="Your Name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group mb-3">
            <label >Email :</label>
                <input type="text" class="form-group" name="email" placeholder="name@gmail.com" value="<?php echo $email; ?>">
            </div>
            <div class="form-group mb-3">
            <label >Password :</label>
                <input type="password" id="pass"  class="form-group" name="pass" placeholder="Your password" value="<?php echo $password; ?>">
                 <p id="message">The Password Is <span id="str"></span></p>
                
            </div>
            <div class="form-group">
                <?php if ($update==false): ?>
                <button type="submit" name="save" onclick="return verif();" class="btn btn-primary">Save</button>
                <?php else : ?>
                    <button type="submit" name="new" onclick="return verif();" class="btn btn-info">Upadte</button>
            <?php endif?>
                </div>
         </form>
         <div>
            <button class="view">VIEW</button>
        </div>
     </div>
     <!--<div id="admin">
          <form action="verif.php" name="f1" methode="POST">
            <h4>Administrateur :</h4>
            <label>USERNAME :</label>
            <input type="text"  name="user">
            <label >PASSWORD :</label>
            <input type="password"  name="pass">
             <button type="submit" class="view">Login</button>
          </form>
           <div id="annuler"><img src="./img/42614692-annuler-fermer-icône-de-l-art-en-ligne-pour-les-applications-et-sites-web.webp" alt="" width="70px" height="70px"></div>
      </div>-->
</body>
<script src="./js/java.js"></script>
</html>

