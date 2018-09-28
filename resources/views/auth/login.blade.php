@extends('layouts.appAdminLayout')

@section('content')
  <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
<div class="bgtravel">
    <div class="logintravel">
        <div class="logincont">
            <div class="logoimg"><img src="{{ asset('frontend/img/logo.png') }}"></div>
            <ul class="loginform">
                <li><label>User Name</label>
                    <span>
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                    </span>
                </li>
                <li><label>Password</label>
                    <span>
                             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </span>
                </li>
                <li><button class="btn-sm btn-primary">Login</button><div class="forgetpass">Forget Password ?</div></li>
            </ul>
           <!--  <ul class="forgetpass_box">
                <li><label>Email</label><span>
                <input type="" name="" class="form-control">
                </span></li>          
                <li><button class="btn-sm btn-primary">Send</button><div class="login_txt">Click to Login</div></li>
            </ul> -->
        </div>
    </div>

</div>
</form>
@endsection
