
@include('webviews/header')
<section class="user-login section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="block">
					<!-- Image -->
					<div class="image align-self-center" style="text-align: center;"><img class="img-fluid" style="width: 100%;" src="{{asset('assets-front/images/frgt-pswrd.gif')}}" alt="desk-image">
					</div>
					<!-- Content -->
					<div class="content text-center adj-pad-2">
						<div class="logo">
							<a href="{{url('')}}"><img src="{{asset('assets-front/images/logo.png')}}" alt=""></a>
						</div>
						<div class="title-text">
							<h3>Forgot Password</h3>
							<p>Enter your email and we'll send you a link to reset your password</p>
						</div>
                        @if(Session::has('message'))
                        <x-alert type="{!! session('message')[0] !!}" indication="{!! session('message')[1] !!}" message="{!! session('message')[2]!!}"/>
                        @endif
						<form action="forget-password" method="post">
                            @csrf
							<!-- Username -->
							<input class="form-control-3 main" type="text" placeholder="Email" type="email" name="email" required>
							
							<!-- Submit Button -->
							<button class="btn btn-main-md" type="submit">submit</button>
						</form>
						<div class="new-acount">
							<a href="login"><i class="ti-back-left"></i>Back to Login</a>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('webviews/footer')