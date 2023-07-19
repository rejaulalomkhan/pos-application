@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-userheading text-center">
                        <h3>Create an Account</h3>
                        <h4>Continue where you left off</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-login">
                                <label>First Name</label>
                                <div class="form-addons">
                                    <input id="fname" type="text" placeholder="Enter your first name" required>
                                    <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-login">
                                <label>Last Name</label>
                                <div class="form-addons">
                                    <input id="lname" type="text" placeholder="Enter your last name" required>
                                    <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input id="email" type="email" placeholder="Enter your email address" required>
                                    <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-login">
                                <label>Phone</label>
                                <div class="form-addons">
                                    <input id="mobile" type="number" placeholder="Enter your phone number" required>
                                    <img src="{{ asset('assets/img/icons/phone-call.svg') }}" width="16" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input id="password" type="password" class="pass-input" placeholder="Enter your password" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-login">
                                <a class="btn btn-login" type="button" onclick="Registration()">Sign Up</a>
                            </div>
                        </div>
                    </div>
                    <div class="signinform text-center">
                        <h4>Already a user? <a href="{{ url('/login') }}" class="hover-a">Sign In</a></h4>
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

    async function Registration(){
        let fname = document.getElementById('fname').value;
        let lname = document.getElementById('lname').value;
        let email = document.getElementById('email').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;

        if(fname.length === 0){
            errorToast("First Name is Required")
        }
        else if(lname.length === 0){
            errorToast("Last Name is Required")
        }else if(email.length === 0){
            errorToast("Email is Required")
        }else if(mobile.length === 0){
            errorToast("Mobile number is Required")
        }else if(password.length === 0){
            errorToast("Password is Required")
        }else{
            showLoader();
            let response = await axios.post("/user-registration", {
                firstName: fname,
                lastName: lname,
                email: email,
                mobile: mobile,
                password: password
            });
            showLoader();

            if (response.data['status'] === 'success' && response.status === 201) {
                successToast(response.data['message']);
                setTimeout(function(){
                    window.location.href = "/login";
                },2000);
            } else {
                errorToast(response.data['message']);
            }
        }
    }

</script>
@endpush
