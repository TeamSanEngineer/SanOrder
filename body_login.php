<table align="center" border="0" cellpadding="5" width="50%">
<tbody>
      <tr>
          <td align="right">Username :</td>
          <td><input type="text" name="txtUsername" id="txtUsername"  value="<?php if (isset($_COOKIE['user_login'])) { echo $_COOKIE['user_login']; } ?>" required></td>
      </tr>
     <tr>
         <td align="right">Password :</td>
        <td><input type="password" name="txtPassword" id="txtPassword" value="<?php if (isset($_COOKIE['user_password'])) { echo $_COOKIE['user_password']; } ?>" required></td>
    </tr>
    <tr>
        <td>
        </td>
        <td align="left">
        <input type="checkbox" id="remeber" name="remeber" <?php if (isset($_COOKIE['user_login'])) { ?> checked <?php } ?> >
        <label for="">จดจำ</label><br>
            <button class="btn btn-primary btn-sm">Login</button>&nbsp;&nbsp; 
             <a href="" class="btn btn-primary btn-sm" role="button"> Cancel </a></td>           
    </tr>
    <tr>
    <td></td>
     <td>
     <a href="forgotpassword.php">ลืมรหัสผ่าน?</a>
    </td>          
    </tr>
    <tr>
    <td>สมาชิกใหม่</td>
     <td>
     <a href="register.php" class="btn btn-danger btn-sm" role="button"> สมัครสมาชิก  </a>
    </td>          
    </tr>   
</table>
</br>
</br>
</tbody>