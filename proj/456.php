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