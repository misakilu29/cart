<?php
require('__connect_db.php');
?>

<?php
if(isset($_POST)){

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $mobile   = $_POST['mobile'];
    $address  = $_POST['address'];
    $birthday = sha1($_POST['birthday']);

    $sql = "INSERT INTO members (email, password, mobile, address, birthday ) VALUES(?,?,?,?,?)";
    $stmtinsert = $pdo->prepare($sql);
    $result = $stmtinsert->execute([$email, $password, $mobile, $address, $birthday]);
    if($result) {
        echo '已成功註冊';
    }else {
        echo '請檢查輸入內容';
    }
}else{
    echo 'no data';
}