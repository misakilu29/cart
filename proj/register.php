<?php
require('__connect_db.php');
?>

<!-- <?php  
    if(isset($_POST['create'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $birthday = sha1($_POST['birthday']);

        $sql = "INSERT INTO members (email, password, mobile, address, birthday ) VALUES(?,?,?,?,?)";
        $stmtinsert = $pdo->prepare($sql);
        $result = $stmtinsert->execute([$email, $password, $mobile, $address, $birthday]);
        if($result) {
            echo '已成功註冊';
        }else {
            echo '請檢查輸入內容';
        }
        // echo $email . ' ' . $password . ' ' . $mobile . ' ' . $address . ' ' . $birthday;
    }
?> -->

<?php include __DIR__ . '/parts/navbar.php'; ?>
<?php include __DIR__ . '/parts/html-head.php'; ?>

<div>
	<form action="register.php" method="post">
		<div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">會員註冊</h5>
                            <form name="form1" onsubmit="sendForm(); return false;">
                                <div class="form-group">
                                    <label for="email">帳號</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                    <small class="form-text">請填寫Email</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">密碼</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <small class="form-text">請填寫密碼</small>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">手機</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile">
                                    <small class="form-text">請填寫手機</small>
                                </div>
                                <div class="form-group">
                                    <label for="address">地址</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                    <small class="form-text">請填寫地址</small>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">生日</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                </div>
                                <button type="submit" class="btn btn-primary" id="register" name="create" value="Sign Up">註冊</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
        $('#register').click(function(e){
            var valid = this.form.checkValidity();

			if(valid){

            var email    = $('#email').val();
			var password = $('#password').val();
			var mobile   = $('#mobile').val();
			var address  = $('#address').val();
			var birthday = $('#birthday').val();


                e.preventDefault();

                $.ajax({
					type: 'POST',
                    url: 'register-api.php',
                    data: {email: email, password: password, mobile: mobile, address: address, birthday: birthday},
                    success: function(data){
                        Swal.fire({
                            'title': 'successful',
                            'text': data,
                            'type': 'success' 
                        })
                    },
                    
                    error: function(data){
                        Swal.fire({
                            'title': 'Error',
                            'text': '重新註冊',
                            'type': 'error'  
                        })
                    }
                });

            }else{
                
            } 
        })
    });
</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>