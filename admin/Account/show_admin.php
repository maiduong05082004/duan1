<div class="admin-content">
    <h1>Danh sách tài khoản ADMIN</h1>
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
                    <th>Email</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaccount as $account) {
                    extract($account);
                    echo '<tr>                     
                                <td>' . $acc_name . '</td>           
                                <td>' . $acc_user . '</td>
                                <td>' . $acc_email . '</td>
                                <td>' . $acc_tel . '</td>
                            </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>