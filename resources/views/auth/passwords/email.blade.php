

@extends('layouts.template2')

@section('title')
คำถามที่พบบ่อย | AcmeTrader
@stop



@section('stylesheet')

@stop('stylesheet')



@section('content')




<div class="theme-page-section theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="theme-login">
          <div class="theme-login-header">
            <h1 class="theme-login-title">Password Reset</h1>
            <p class="theme-login-subtitle">Restore your forgotten password</p>
          </div>

          <form method="POST" action="{{ route('password.email') }}">
              @csrf
          <div class="theme-login-box">
            <div class="theme-login-box-inner">
              <p class="theme-login-pwd-reset-text">ป้อนอีเมลที่เกี่ยวข้องกับบัญชีของคุณในฟิลด์ด้านล่างและเราจะส่งลิงก์ให้คุณเพื่อตั้งรหัสผ่านใหม่</p>
              <div class="form-group theme-login-form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-uc btn-dark btn-block btn-lg">
                  Reset Password
              </button>
            </div>
          </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>







@endsection

@section('scripts')

<script>



</script>

@stop('scripts')
