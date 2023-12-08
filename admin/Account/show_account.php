<div class="admin-content">
    <h1>Danh sách tài khoản khách hàng</h1>
    <div class="row2 form_content ">
        <form action="index.php?act=showaccount" method="POST" enctype="multipart/form-data">
            <div class="search-container">
                <input type="text" placeholder="Tìm kiếm..." class="search-input" name="kyw">
                <input type="submit" value="Tìm kiếm" class="search-btn" name="listok">
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    <th>Chặn</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaccount as $account) {
                    extract($account);
                    $suatk = "index.php?act=updateaccount&acc_id=" . $acc_id;
                    $xoatk = "index.php?act=xoaaccount&acc_id=" . $acc_id;
                    if ($role == 4) {
                        $text = "Bỏ chặn";
                        $nutblock = "index.php?act=unblock&acc_id=".$acc_id; 
                    } else {
                        $text = "Chặn";
                        $nutblock = "index.php?act=block&acc_id=".$acc_id;
                    }
                
                    echo '<tr>                     
                                <td>' . $acc_name . '</td>           
                                <td>' . $acc_user . '</td>
                                <td>' . $acc_pass . '</td>
                                <td>' . $acc_email . '</td>
                                <td style="width: 300px;">' . $acc_address . '</td>
                                <td>' . $acc_tel . '</td>
                                <td>' . $role_name . '</td>
                                <td>
                                    <a href="' . $suatk . '"><input type="button" class="submit-btn" value="Sửa"></a> 
                                </td>
                                <td>
                                    <a href="' . $xoatk . '"><input type="button" class="submit-btn" value="Xóa"></a>
                                </td>
                                <td>
                                    <a href="' . $nutblock . '"><input type="button" class="submit-btn" value="' . $text . '" style="width:88px"></a>
                                </td>
                            </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="index.php?act=addaccount"> <input class="submit-btn" id="btn" type="button" value="NHẬP THÊM"></a>
    </div>