@extends('layouts.template-login')
@section('content')

<section class="body-sign body-locked">


            <div class="center-sign">
                <div id="showalert"></div>
                <!--
                <a href="#" class="logo pull-left" >
                    <img src="assets/images/logo.png" height="100" alt="Porto Admin" />
                </a> -->

                <div class="panel panel-sign">


                    <div class="panel-body">


                        <div class="current-user text-center">
                            <img id="LockUserPicture" src="{{asset('./assets/images/Acmelogo.png')}}" height="30px;">

                        </div>

                        <form  role="form" method="POST" action="{{ url('/login') }}">
                             {{ csrf_field() }}



                            <div class="form-group mb-lg">
                                <label>Email</label>
                                <div class="input-group input-group-icon">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
                                    <a href="#" class="pull-right">Lost Password?</a>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input id="password" type="password" class="form-control" name="password">
                                     @error('password')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom ">
                                        <input  name="rememberme" id="remember" value=""  type="checkbox">

                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">

                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>

                            </div>
                            <br />
                            <span class="mt-3 mb-3 line-thru text-center text-uppercase">

                              <span>or</span>
                            </span>
                            <br />
                              <div class="mb-1 text-center">
                  								<a class="btn btn-facebook mb-3 ml-1 mr-1" href="{{ route('social.oauth', 'facebook') }}">Connect with <i class="fa fa-facebook"></i></a>
                  								<a class="btn btn-danger mb-3 ml-1 mr-1" style="padding-left: 30px; padding-right: 30px;" href="{{ route('social.oauth', 'google') }}">Connect with <i class="fa fa-google"></i></a>
                  							</div>
                                <br />
                              <p class="text-center" style="color: #777;">Don't have an account yet? <a href="{{url('register')}}">Sign Up!</a></p>




                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2019. All Rights Reserved. </p>
            </div>
        </section>
@stop
