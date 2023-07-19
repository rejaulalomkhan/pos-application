@extends('layouts.app')

@section('title', 'OTP')

@section('content')
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset ">
                    <div class="login-userheading">
                        <h3>Forgot password?</h3>
                        <h4>Don’t warry! it happens. Please enter the address <br>
                            associated with your account.</h4>
                    </div>
                    <div class="form-login">
                        <label>Email</label>
                        <div class="form-addons">
                            <input id="email" type="email" placeholder="Enter your email address" required>
                            <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                        </div>
                    </div>
                    <div class="form-login">
                        <a class="btn btn-login" type="button" onclick="VerifyEmail()">Submit</a>
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

    async function VerifyEmail(){
        let email = document.getElementById('email').value;

        if(email.length === 0){
            errorToast("Please Enter Your Email Address")
        }else{
            showLoader();
            let response = await axios.post("/send-otp", {
                email: email
            });
            hideLoader();

            if (response.data['status'] === 'success' && response.status === 200) {
                successToast(response.data['message']);
                sessionStorage.setItem('email',email);
                setTimeout(function(){
                    window.location.href = "/verifyOTP";
                },2000);
            } else {
                errorToast(response.data['message']);
            }
        }
    }

</script>
@endpush
