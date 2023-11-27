<?php
function insert_taikhoan($username,$password,$email,$ten,$address,$tel){
    $sql="insert into taikhoan(username,password,email,ten,address,tel) values('$username','$password','$email','$ten','$address',$tel)";
    pdo_execute($sql);

}
function checkemail($email){
    $sql="select * from taikhoan where email='".$email."'";
    $sp=pdo_query_one($sql);    
    return $sp;
}
function update_capnhat_tk($id,$username,$password,$email,$ten,$address,$tel){
$sql="update taikhoan set username='".$username."', password='".$password."',email='".$email."',ten='".$ten."',address='".$address."',tel='".$tel."' where id=".$id;
    pdo_execute($sql);  
}
function loadall_taikhoan(){
    $sql="SELECT * FROM taikhoan order by id desc";
    $listtaikhoan=pdo_query($sql);
    return  $listtaikhoan;
}
function insert_account_user($user, $password, $email, $tel, $address, $role)
{
    $sql = "INSERT INTO taikhoan (user,pass,email,address,tel,role) VALUES ('$user','$password','$email','$tel','$address','$role')";
    pdo_execute ($sql);
}
// function checkuser($user,$pass){
//     $sql="select *from account where (acc_user='".$user."' OR acc_tel='".$user."') AND  acc_password='".$pass."'";
//     $sp=pdo_query_one($sql);
//     return $sp;
// }
function checkuser($user, $password) {
    $sql = "SELECT * FROM account WHERE acc_user='".$user."'  AND acc_pass = '".$password."'";
    $acc=pdo_query_one($sql);
    return $acc;
}
function checkuser1($username,$password){
    $sql="select * from account where acc_user=? and acc_pass=?";
    return pdo_query_one($sql,$username,$password);
    
}
?>