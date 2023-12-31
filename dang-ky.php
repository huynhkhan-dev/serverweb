<?php include "includes/header.php" ?>
<?php require_once("connection.php"); ?>
<?php
    if (isset($_POST["btn_submit"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $username = $_POST["username"];
        $password = $_POST["pass"];

        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($username == "" || $password == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        } else {
            //Kiểm tra tên đăng nhập này đã có người dùng chưa
            $result = mysqli_query($conn, "SELECT username FROM account WHERE username='$username'");
            if (mysqli_num_rows($result) > 0) {
                echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
            $sql = "INSERT INTO account(username, password) VALUES ('$username', '$password')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            if (mysqli_query($conn, $sql)) {
                echo "chúc mừng bạn đã đăng ký thành công";

                // JavaScript code to redirect after 5 seconds
                echo "<script>
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 5000);
                      </script>";
            } else {
                echo "Đăng ký không thành công: " . mysqli_error($conn);
            }
        }
    }
?>
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-9 col-lg-7 col-xl-6">
				<div style="border-radius: 15px;">
					<div class="card-body p-2">
					<h2 class="text-uppercase text-center mb-3">Đăng ký thành viên Ngọc Rồng HOCK</h2>
					<form action="dang-ky.php" method="post">
						<div class="form-outline mb-3">
							<label class="form-label" for="form3Example1cg">Username</label>
							<input type="text" id="username" name="username" class="form-control form-control-lg" />
						</div>

						<div class="form-outline mb-4">
							<label class="form-label" for="form3Example4cg">Password</label>
							<input type="password" id="pass" name="pass" class="form-control form-control-lg" />
						</div>

						<div class="form-check d-flex justify-content-center mb-5">
							<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
							<label class="form-check-label" for="form2Example3g">
								I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
							</label>
						</div>

						<div class="d-flex justify-content-center">
							<input type="submit" name="btn_submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="Đăng ký">
						</div>

					</form>

					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
<?php include "includes/footer.php" ?>