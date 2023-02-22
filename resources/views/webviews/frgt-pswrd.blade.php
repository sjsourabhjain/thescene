@include('webviews/header')
<section class="user-login section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Image -->
					<div class="image align-self-center" style="text-align: center;"><img class="img-fluid" style="width: 100%;" src="images/frgt-pswrd.gif" alt="desk-image">
					</div>
					<!-- Content -->
					<div class="content text-center adj-pad-2">
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt=""></a>
						</div>
						<div class="title-text">
							<h3>Forgot Password</h3>
							<p>Enter your email and we'll send you a link to reset your password</p>
						</div>
						<form action="#">
							<!-- Username -->
							<input class="form-control-3 main" type="text" placeholder="Email" required>
							
							<!-- Submit Button -->
							<button class="btn btn-main-md">submit</button>
						</form>
						<div class="new-acount">
							<a href="sign-in.html"><i class="ti-back-left"></i>Back to Login</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('webviews/footer')