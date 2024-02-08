<h1>Forget Password Email</h1>
You can reset password from bellow link:
@if ($details['user_type'] == 'admin') 
    <a href="{{ route('auth.reset_password.form_admin', $details['token']) }}">Reset Password</a>
@else
    <a href="{{ route('auth.reset_password.form_staff', $details['token']) }}">Reset Password</a>
@endif