<html>
<head>
<title>Login Now</title>
<script language="javascript">
function validate()
{
if(document.login.uname.value=="")
{
alert("enter username");
document.login.uname.focus();
return false;
}
if(document.login.pwd.value=="")
{
alert("enter password");
document.login.pwd.focus();
return false;
}
else {
return true;
}
}
</script>
</head>
<body>
<h3>Login</h3>
<?php
if(isset($_POST['login']))
{
$user=($_POST['uname']);
$pass=($_POST['pwd']);
$userdata = simplexml_load_file('userlist.xml') or die("Error: Cannot create object");
$found = 0;
foreach ($userdata as $key => $value) {
if($value->username == $user && $value->password == $pass)
{
$found = 1;
break;
}
}
if($found == 0)
{
echo 'Invalid Username And Password Please Try Again';
}
else
{
echo "<script> location.href='loginsuccess.php';</script>";
}
} ?>
<form name="login" method="POST" action="" onsubmit="validate()">
<table>
<tr> <td>username</td>
<td><input type="text" name="uname"></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pwd"></td>
</tr>
<tr> <td></td>
<td><input type="submit" name="login" value="Login"></td>
</tr>
</table>
</form>
</body>
</html>