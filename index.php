
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

<?php include "includes/header.php" ?>
	<section id="hero" class="hero">
		<div class="container position-relative">
			<div class="row gy-5" data-aos="fade-in">
				<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
					<div class="d-flex justify-content-center justify-content-lg-start">
						<a href="dang-ky.php" class="btn-get-started">Đăng ký ngay</a>
					</div>
				</div>
				<div class="col-lg-6 order-1 order-lg-2">
					<img src="./assets/img/logo.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
				</div>
			</div>
		</div>

		<div class="icon-boxes position-relative">
			<div class="container position-relative">
				<div class="row gy-4 mt-5">

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
					<div class="icon-box">
						<div class="icon">
							<a href="./download/hock.zip" download>
								<img src="assets/img/clients/pc.png" class="img-fluid" alt="">
							</a>
						</div>
						<h4 class="title"><a href="./download/hock.zip" download class="stretched-link">Windows</a></h4>
					</div>
				</div><!--End Icon Box -->

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
					<div class="icon-box">
					<div class="icon">
						<a href="./download/hock.jar" download>
							<img src="assets/img/clients/java.png" class="img-fluid" alt="">
						</a>
					</div>
					<h4 class="title"><a href="./download/hock.jar" download class="stretched-link">Java</a></h4>
					</div>
				</div><!--End Icon Box -->

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
					<div class="icon-box">
					<div class="icon">
						<a href="./download/hock.apk" download>
							<img src="assets/img/clients/android.png" class="img-fluid" alt="">
						</a>
					</div>
					<h4 class="title"><a href="./download/hock.apk" download class="stretched-link">Android</a></h4>
				</div>
				</div><!--End Icon Box -->

				<div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
					<div class="icon-box">
					<div class="icon">
						<a href="./download/hock.ipa" download>
							<img src="assets/img/clients/iphone.png" class="img-fluid" alt="">
						</a>
					</div>
					<h4 class="title"><a href="./download/hock.ipa"download class="stretched-link">iPhone</a></h4>
					</div>
				</div><!--End Icon Box -->

			</div>
		</div>
	</section>
	<!-- End Hero Section -->
	<main id="main">
		<!-- ======= About Us Section ======= -->
		<section id="dangky" class="dangky">
			<div class="container" data-aos="fade-up">
				<div class="section-header">
					<h2>Đăng ký thành viên</h2>
					<p>Chào mừng các bạn đã đến với Ngọc Rồng HOCK</p>
				</div>
			</div>
			<section class="vh-100 bg-image"
  			style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
			<div class="mask d-flex align-items-center h-100 gradient-custom-3">
				<div class="container ">
					<div class="row d-flex justify-content-center h-100">
						<div class="col-12 col-md-9 col-lg-7 col-xl-6">
							<div style="border-radius: 15px;" class="border border-success">
								<div class="card-body p-2">
									<form action="dang-ky.php" method="post">
										<div class="form-outline mb-5 p-4">
											<label class="form-label" for="form3Example1cg">Username</label>
											<input type="text" id="username" name="username" class="form-control form-control-lg" />
										</div>

										<div class="form-outline mb-5 p-4">
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
											<input type="submit" name="btn_submit" class=" text-light btn btn-success btn-block btn-lg gradient-custom-4 text-body " value="Đăng ký">
										</div>

									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End About Us Section -->

		<section id="download" class="download">
      		<div class="container" data-aos="zoom-out">
        		<div class="clients-slider swiper">
					<div class="swiper-wrapper align-items-center">
						<div class="swiper-slide">
							<a href="./download/hock.zip" download>
								<img src="assets/img/clients/pc.png" class="img-fluid" alt="">
							</a>
						</div>
						<div class="swiper-slide">
							<a href="./download/hock.apk" download>
								<img src="assets/img/clients/android.png" class="img-fluid" alt="">
							</a>
						</div>
						<div class="swiper-slide">
							<a href="./download/hock.jar" download>
								<img src="assets/img/clients/java.png" class="img-fluid" alt="">
							</a>
						</div>
						<div class="swiper-slide">
							<a href="./download/hock.ipa" download>
								<img src="assets/img/clients/iphone.png" class="img-fluid" alt="">
							</a>
						</div>
					</div>
        		</div>
			</div>
    	</section><!-- End Clients Section -->

		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact">
      		<div class="container" data-aos="fade-up">

        		<div class="section-header">
          			<h2>Góp ý kiến</h2>
          			<p>
						Ý kiến của bạn góp phần giúp máy chủ của chúng tôi thêm hoàn thiện
					</p>
        		</div>

        		<div class="row gx-lg-0 gy-4">

          			<div class="col-lg-4">

            			<div class="info-container d-flex flex-column align-items-center justify-content-center">
              				<div class="info-item d-flex">
                				<i class="bi bi-geo-alt flex-shrink-0"></i>
                				<div>
                  					<h4>Location:</h4>
                  					<p>97 No.24 Street, Thu Duc city</p>
                				</div>
              				</div><!-- End Info Item -->

              				<div class="info-item d-flex">
                				<i class="bi bi-envelope flex-shrink-0"></i>
								<div>
									<h4>Email:</h4>
									<p>huynhkhan91@gmail.com</p>
                				</div>
              				</div><!-- End Info Item -->

              				<div class="info-item d-flex">
                				<i class="bi bi-phone flex-shrink-0"></i>
								<div>
									<h4>Call:</h4>
									<p>+84 961 800 341</p>
								</div>
              				</div><!-- End Info Item -->

							<div class="info-item d-flex">
								<i class="bi bi-chat-dots-fill flex-shrink-0"></i>
								<div>
									<h4>Nhóm zalo</h4>
									<p>chat.zalo.me</p>
								</div>
							</div><!-- End Info Item -->
            			</div>

          			</div>

          			<div class="col-lg-8">
            			<form action="forms/contact.php" method="post" role="form" class="php-email-form">
              				<div class="row">
                				<div class="col-md-6 form-group">
                  					<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                				</div>
                				<div class="col-md-6 form-group mt-3 mt-md-0">
                  					<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                				</div>
              				</div>
              				<div class="form-group mt-3">
                				<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              				</div>
              				<div class="form-group mt-3">
                				<textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
              				</div>
              				<div class="my-3">
                				<div class="loading">Loading</div>
                				<div class="error-message"></div>
                				<div class="sent-message">Your message has been sent. Thank you!</div>
              				</div>
              				<div class="text-center"><button type="submit">Send Message</button></div>
            			</form>
          			</div><!-- End Contact Form -->

        		</div>

      		</div>
    	</section><!-- End Contact Section -->

  	</main><!-- End #main -->

<?php include "includes/footer.php" ?>