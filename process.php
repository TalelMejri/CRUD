<?php 
   session_start();
    $id=0;
    $update=false;
    $name='';
    $email='';
    $password='';
    $db=new mysqli("localhost","root","","bootstrrap") or die(mysqli_error($db));
     if(isset($_POST['save'])){
         $nom=$_POST['nom'];
         $email=$_POST['email'];
         $pass=$_POST['pass'];
         $db->query("INSERT INTO crud VALUES('$id','$nom','$email','$pass')") or die($db->error);   
        $_SESSION['message']="has ben saved";
        $_SESSION['msg_type']="success";
        header("location:index.php");
        }
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
         $db->query("delete  from crud where id=$id") or die($db->error);
         $_SESSION['message']="has been deleted";
         $_SESSION['msg_type']="danger";
         header("location:index.php");
    }
     
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        $res=$db->query("select * from crud where id=$id") or die($db->error);
        if($res->num_rows){
            $row=$res->fetch_array();
            $name=$row['Nom'];
            $email=$row['Email'];
            $password=$row['Password'];
        }
    }

    if(isset($_POST['new'])){
        $id=$_POST['id'];
        $no=$_POST['nom'];
        $em=$_POST['email'];
        $passw=$_POST['pass'];
        $req=$db->query("UPDATE `crud` SET `Nom`='$no',`Email`='$em',`Password`='$passw' WHERE id=$id") or die($db->error);
        
         $_SESSION['message']="has been updated ";
         $_SESSION['msg_type']="info";
         header("location:index.php");
    }
?>