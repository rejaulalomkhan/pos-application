@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-userheading">
                        <h3>Reset Password</h3>
                        <h4>Don’t warry! it happens. Reset Password with strong one <br>
                    </div>
                    <div class="form-login">
                        <label>New Password</label>
                        <div class="pass-group">
                            <input id="password" type="password" class="pass-input" placeholder="Enter your password" required>
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>
                    </div>
                    <div class="form-login">
                        <label>Retype New Password</label>
                        <div class="pass-group">
                            <input id="cpassword" type="password" class="pass-input" placeholder="Enter your password" required>
                            <span class="fas toggle-password fa-eye-slash"></span>
                        </div>
                    </div>
                    <div class="form-login">
                        <a class="btn btn-login" type="button" onclick="ResetPassword()">Submit</a>
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

    async function ResetPassword(){
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('cpassword').value;

        if(password.length === 0){
            errorToast("Password is Required!")
        }else if(cpassword.length === 0){
            errorToast("Confirm Password is Required!")
        }if(password !== cpassword){
            errorToast("Password not match!")
        }else{
            showLoader();
            let response = await axios.post("/reset-password", {
                password: password
            });
            hideLoader();

            if (response.data['status'] === 'success' && response.status === 200) {
                successToast(response.data['message']);
                setTimeout(function(){
                    window.location.href = "/login";
                },1000);
            } else {
                errorToast(response.data['message']);
            }
        }
    }

</script>
@endpush
