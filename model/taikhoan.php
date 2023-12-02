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
function update_capnhat_tk($id,$name,$email,$address,$tel){
$sql="update account set acc_name='".$name."',acc_email='".$email."',acc_address='".$address."',acc_tel='".$tel."' where acc_id=".$id;
    pdo_execute($sql);  
}

function loadall_taikhoan(){
    $sql="SELECT * FROM account order by acc_id desc";
    $listtaikhoan=pdo_query($sql);
    return  $listtaikhoan;
}
function insert_account_user($user, $password, $email,$accname, $tel, $address, $role)
{
    $sql = "INSERT INTO account (acc_user,acc_pass,acc_email,acc_name,acc_address,acc_tel,role) VALUES ('$user','$password','$email','$accname','$address','$tel','$role')";
    pdo_execute ($sql);
}
function checkuser($user, $password) {
    $sql = "SELECT * FROM account WHERE acc_user='".$user."'  AND acc_pass = '".$password."'";
    $acc=pdo_query_one($sql);
    return $acc;
}
function check_account_user($id){
    $sql = "SELECT * FROM account WHERE acc_id=$id";
    return pdo_query_one($sql);
}
?>