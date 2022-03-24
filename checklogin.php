<?php 
session_start();
    if(isset($_POST['txtUsername']))
    {
        //connection
        include("connectdb.php");
       
        //query 
        $sql="SELECT * FROM user Where userid ='".$_POST['txtUsername']."' and password='". $_POST['txtPassword']."' ";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>=1)
        {

            if( !empty($_POST['remeber'])) 
            { // ถ้าติ๊กถูก Login ตลอดไป ให้ทำการสร้าง cookie
                setcookie("user_login",$_POST['txtUsername'],time()+3600*24*356);
                setcookie("user_password",$_POST['txtPassword'],time()+3600*24*356);
            }
            else 
            {
                if (isset($_COOKIE['user_login'])) 
                {
                    setcookie('user_login', '');

                    if (isset($_COOKIE['user_password'])) 
                    {
                        setcookie('user_password', '');
                    }
                }
            }
            $row = mysqli_fetch_array($result);
            $_SESSION["UserID"] = $row["userid"];
            $_SESSION["Level"] = $row["level"];
            $_SESSION["Fristname"] =  $row["fristname"];
            $_SESSION["Lastname"] = $row["lastname"];
            Header("Location: index.php");
        }
        else
        {
            echo '<script>  alert("user or  password not correct ! ");  window.history.back();  </script>';
        }
        mysqli_close($con);
    }
    else
    {
        Header("Location: login.php"); //user & password incorrect back to login again
    }
?>