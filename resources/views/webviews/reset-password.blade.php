@include('user/header')
<section class="user-login section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <!-- Image -->
                    <div class="image align-self-center" style="text-align: center;"><img class="img-fluid"
                            style="width: 100%;" src="{{asset('assets-front/images/reset.gif')}}" alt="desk-image">
                    </div>
                    <!-- Content -->
                    <div class="content text-center adj-pad-3">
                        <div class="logo">
                            <a href="{{url('')}}"><img src="{{asset('assets-front/images/logo.png')}}" alt=""></a>
                        </div>
                        <div class="title-text">
                            <h3>Reset Password</h3>
                        </div>
                        @if(Session::has('message'))
                        <x-alert type="{!! session('message')[0] !!}" indication="{!! session('message')[1] !!}" message="{!! session('message')[2]!!}"/>
                        @endif
                        <form action="reset-password" method="post">
                            @csrf
                            <!-- Username -->
                            <div class="password-container le-up-adj-2">
                                <input class="form-control main adjust" type="password" name="password" placeholder="Password"
                                    id="password">
                                <i class="fa-solid fa-eye adj-eye" id="eye"></i>
                            </div>

                            <!-- Password -->
                            <div class="password-container up-adj-2s">
                                <input class="form-control main" name="confirm_password" type="password" placeholder="Confirm Password"
                                    id="password_c">
                                <i class="fa-solid fa-eye adj-eye" id="eye"></i>
                            </div>
                            <input type="hidden" value="{{$token}}" name="token">
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-main-md">reset password</button>
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
@include('user/footer')