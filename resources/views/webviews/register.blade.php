@include('webviews/header')
<style>
    div .error{
        color: red;
    }
    </style>
<section class="user-login section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="block">
                    <!-- Image -->
                    <div class="image align-self-center" style="text-align: center;"><img class="img-fluid"
                            style="width: 100%;" src="{{asset('assets-front/images/Signin.gif')}}" alt="desk-image">
                    </div>
                    <!-- Content -->
                    <div class="content text-center">
                        <div class="logo">
                            <a href="{{url('')}}"><img src="{{asset('assets-front/images/logo.png')}}" alt=""></a>
                        </div>
                        <div class="title-text">
                            <h3>Sign Up</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger text-left">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="sign-up" method="post" id="signUpForm">
                            @csrf
                            <!-- Username -->
                            <input class="form-control main adjust" type="text" placeholder="Name" name="first_name" >
                            <!-- Email -->
                            <input class="form-control main" type="email" placeholder="Email" name="email" >
                            <!-- Password -->
                            <div class="password-container le-up-adj">
                                <input class="form-control main adjust" type="password" name="password" placeholder="Password"
                                    id="password">
                                <i class="fa-solid fa-eye adj-eye" id="eye"></i>
                            </div>
                            <!-- Password -->
                            <div class="password-container up-adj">
                                <input class="form-control main" type="password" name="confirm_password" placeholder="Confirm Password"
                                    id="password_">
                                <i class="fa-solid fa-eye adj-eye" id="eye_"></i>
                            </div>
                            <!-- Submit Button -->
                            <button class="btn btn-main-md" type="submit">sign up</button>
                        </form>
                        <div class="new-acount">
                            <p>By clicking “Sign Up” I agree to <a href="#">Terms & Conditions.</a></p>
                            <p>Already have an account? <a href="login">SIGN IN</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('assets-front/jquery-validation/dist/jquery.validate.js')}}"></script>
<script>
// $("#signUpForm").validate({
//     messages: {},
//     errorElement : 'div',
//     errorLabelContainer: '.errorTxt'
// });
</script>
@include('webviews/footer')