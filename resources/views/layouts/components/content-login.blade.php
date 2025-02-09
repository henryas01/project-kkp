<!-- Session Status -->

{{--
<x-auth-session-status class="mb-4" :status="session('status')" /> --}}
<div class="row justify-content-center">

  <div class="col-xl-8 col-lg-12 col-md-9">


    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <div class="text-center">
                <img style="width: 50%; height: 50%; object-fit: contain" src="{{asset('img/logo.jpeg')}}" alt="">
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <x-input-label for="email" :value="__('Email')" />
                  <input type="email" name="email" :value="old('email')" class="form-control form-control-user"
                    id="email" placeholder="Enter Email Address...">
                  <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>
                {{-- Password --}}
                <div class="form-group">
                  <x-input-label for="password" :value="__('Password')" />
                  <input type="password" class="form-control form-control-user" id="password" type="password"
                    name="password" placeholder="Password" :value="__('Password')">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                {{-- Remember Me --}}
                {{-- <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck">Remember
                      Me</label>
                  </div>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  {{ __('Login') }}
                </button>

                <hr>


                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Login with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                </a> --}}


              </form>
              <hr>
              {{-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="register.html">Create an Account!</a>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

</div>