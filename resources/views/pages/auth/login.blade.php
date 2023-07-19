@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-userheading text-center">
                        <h3>Sign In</h3>
                        <h4>Please login to your account</h4>
                    </div>
                    <div class="form-login">
                        <label>Email</label>
                        <div class="form-addons">
                            <input id="email" type="text" placeholder="Enter your email address" required>
                            <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                        </div>
                    </div>
                    <div class="form-login">
                        <label>Password</label>
                        <div class="pass-group">
                            <input id="password" type="password" class="pass-input" placeholder="Enter your password" required>
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>
                    </div>
                    <div class="form-login">
                        <div class="alreadyuser">
                            <h4><a href="{{ url('/sendOTP') }}" class="hover-a">Forgot Password?</a></h4>
                        </div>
                    </div>
                    <div class="form-login">
                        <a class="btn btn-login" type="button" onclick="submitLogin()">Sign In</a>
                    </div>
                    <div class="signinform text-center">
                        <h4>Don’t have an account? <a href="{{ url('/registration') }}" class="hover-a">Sign Up</a></h4>
                    </div>
                    <div class="form-setlogin">
                        <h4>Or sign up with</h4>
                    </div>
                    <div class="form-sociallink">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/img/icons/google.png') }}" class="me-2" alt="google">
                                    Sign Up using Google
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/img/icons/facebook.png') }}" class="me-2" alt="google">
                                    Sign Up using Facebook
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="login-img">
                <img src="{{ asset('assets/img/login.jpg') }}" alt="img">
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script>

    async function submitLogin(){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if(email.length === 0){
            errorToast("Email is Required")
        }
        else if(password.length === 0){
            errorToast("Password is Required")
        }else{
            try {
                showLoader();
                let response = await axios.post("/user-login", {
                    email: email,
                    password: password
                });
                hideLoader();

                if (response.data['status'] === 'success' && response.status === 200) {
                    successToast(response.data['message']);
                    window.location.href = "/dashboard";
                } else {
                    errorToast(response.data['message']);
                }
            } catch (error) {
                // Handle the error here
                console.error("An error occurred:", error);
                errorToast("An error occurred. Please try again later.");
            }
        }
    }

</script>
@endpush


