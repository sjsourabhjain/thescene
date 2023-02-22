@include('webviews/header')
<section class="user-login section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Image -->
					<div class="image align-self-center" style="text-align: center;"><img class="img-fluid" style="width: 100%;" src="images/reset.gif" alt="desk-image">
					</div>
					<!-- Content -->
					<div class="content text-center adj-pad-3">
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt=""></a>
						</div>
						<div class="title-text">
							<h3>Reset Password</h3>
						</div>
						<form action="#">
							<!-- Username -->
							<div class="password-container le-up-adj-2">
                  <input class="form-control main adjust" type="password" placeholder="Password" id="password">
                  <i class="fa-solid fa-eye" id="eye"></i>
              </div>
							
							<!-- Password -->
							<div class="password-container up-adj-2s">
  <input class="form-control main" type="password" placeholder="Confirm Password" id="password">
  <i class="fa-solid fa-eye" id="eye"></i>
</div>
							
							<!-- Submit Button -->
							<button class="btn btn-main-md">reset password</button>
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