<?php
function insert_content_lienHe($contract_name,$contract_email,$contract_content)  {
    $sql="INSERT INTO `contract`(`contract_name`, `contract_email`, `contract_content`) VALUES ('$contract_name','$contract_email','$contract_content')";
pdo_execute($sql);
}