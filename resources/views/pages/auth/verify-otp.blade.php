@extends('layouts.app')

@section('title', 'OTP Verify')

@section('content')
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset ">
                    <div class="login-userheading">
                        <h3>Verify OTP</h3>
                        <h4>Don’t warry! it happens. Please enter OTP code <br>
                            that has been sent to your email.</h4>
                    </div>
                    <div class="form-login">
                        <label>OTP</label>
                        <div class="form-addons">
                            <input id="otp" type="number" placeholder="Enter your OTP code" required>
                            <img src="{{ asset('assets/img/icons/otp.svg') }}" width="18" alt="img">
                        </div>
                    </div>
                    <div class="form-login">
                        <a class="btn btn-login" type="button" onclick="verifyOTP()">Submit</a>
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

    async function verifyOTP(){
        let otp = document.getElementById('otp').value;

        if(otp.length !== 6){
            errorToast("Invalid OTP")
        }
        else{
            showLoader();
            let response = await axios.post("/verify-otp", {
                otp: otp,
                email: sessionStorage.getItem('email')
            });
            hideLoader();

            if (response.data['status'] === 'success' && response.status === 200) {
                successToast(response.data['message']);
                sessionStorage.clear();
                setTimeout(function(){
                    window.location.href = "/resetPassword";
                },1000);
            } else {
                errorToast(response.data['message']);
            }
        }
    }

</script>
@endpush
