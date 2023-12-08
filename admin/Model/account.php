<?php
function insert_account($user, $password, $email, $tel, $address, $name, $role)
{
    $sql = "INSERT INTO account (acc_user,acc_pass,acc_email,acc_tel,acc_address,acc_name,role) VALUES ('$user','$password','$email','$tel','$address','$name','$role')";
    pdo_execute ($sql);
}

function loadall_account_user($kyw = "")
{
    $sql = "SELECT a.acc_id,a.acc_user,a.acc_pass,acc_email,a.acc_name,a.acc_address,acc_tel, r.role_name,a.role 
    FROM account a 
    LEFT JOIN role_of_account r ON a.role = r.role_id where a.role = 2 OR a.role = 3 OR a.role = 4";
    if ($kyw != "") {
        $sql .= "and a.acc_user LIKE '%" . $kyw . "%'";
    }
    $listaccount=pdo_query($sql);
    return $listaccount; 
}
function loadall_account_admin($kyw = "")
{
    $sql = "SELECT a.acc_id,a.acc_user,a.acc_pass,acc_email,a.acc_name,a.acc_address,acc_tel, r.role_name 
    FROM account a 
    LEFT JOIN role_of_account r ON a.role = r.role_id where a.role = 1 ";
    if ($kyw != "") {
        $sql .= "and a.acc_user LIKE '%" . $kyw . "%'";
    }
    $listaccount=pdo_query($sql);
    return $listaccount; 
}
function check_account_user($id){
    $sql = "SELECT * FROM account WHERE acc_id=$id";
    return pdo_query_one($sql);
}
function update_account_user($id, $user, $password, $email, $tel, $address, $name, $role) {
    $sql = "UPDATE account 
            SET acc_user = '$user', acc_pass = '$password', acc_email = '$email', acc_address = '$address', acc_tel = '$tel' ,acc_name='$name', role = '$role'
            WHERE acc_id = '$id'";
    pdo_execute($sql);
}
function block_account_user($id, $role=4) {
    $sql = "UPDATE account 
            SET role = '$role'
            WHERE acc_id = '$id'";
    pdo_execute($sql);
}
function unblock_account_user($id, $role=3) {
    $sql = "UPDATE account 
            SET role = '$role'
            WHERE acc_id = '$id'";
    pdo_execute($sql);
}
function delete_account_admin($id){
    $sql = "DELETE FROM account WHERE acc_id = $id";
    pdo_execute($sql);
}
function update_capnhat_admin($id,$name,$email,$address,$tel){
    $sql="update account set acc_name='".$name."',acc_email='".$email."',acc_address='".$address."',acc_tel='".$tel."' where acc_id=".$id;
        pdo_execute($sql);  
    }
    function checkAdminRole() {
        if ($_SESSION['user']['role'] != 1) {
            echo "<script>
                alert('Bạn không có quyền truy cập vào trang này.');
                window.location.href = 'index.php?act=home';
              </script>";
            exit;
        }
    }
    
?>
