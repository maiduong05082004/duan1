<?php
function loadbill(){
    $sql="SELECT idbill, ngaydathang, bill_total, bill_name, bill_address, bill_email, bill_status
    FROM bill
    GROUP BY ngaydathang
    ORDER BY ngaydathang ASC";
return pdo_query($sql);
}
?>