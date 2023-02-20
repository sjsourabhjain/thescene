@include('user.header')
<section class="user-login section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <!-- Image -->
                    <div class="image align-self-center" style="text-align: center;"><img class="img-fluid"
                            style="width: 100%;" src="{{asset('assets-front/images/login.gif')}}" alt="desk-image">
                    </div>
                    <!-- Content -->
                    <div class="content text-center adj-pad">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('assets-front/images/logo.png')}}" alt=""></a>
                        </div>
                        <div class="title-text">
                            <h3>Sign In</h3>
                        </div>
                        @if(Session::has('message'))
                        <x-alert type="{!! session('message')[0] !!}" indication="{!! session('message')[1] !!}" message="{!! session('message')[2]!!}"/>
                        @endif
                        <form action="login" method="post">
                            @csrf
                            <!-- Username -->
                            <input class="form-control main adjust" type="text" name="username" placeholder="Username" required>

                            <!-- Password -->
                            <div class="password-container">
                                <input class="form-control main" name="password" type="password" placeholder="Password..."
                                    id="password">
                                <i class="fa-solid fa-eye adj-eye" id="eye"></i>
                            </div>

                            <!-- Submit Button -->
                            <button class="btn btn-main-md" type="submit">sign in</button>
                        </form>
                        <div class="new-acount">
                            <a href="forget-password">Forget your password?</a>
                            <p>Don't Have an account? <a href="sign-up"> SIGN UP</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('user.footer')