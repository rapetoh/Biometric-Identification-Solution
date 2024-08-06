<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connection</title>
    <link rel="stylesheet" href="{{ asset('css/AgentLogin.css') }}" />
    @notifyCss
  </head>
  <body>

  <div id="loader">
        <div class="spinner"></div>
    </div>

  @include('notify::components.notify')

    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form  method="POST" action="{{route('login.submit')}}" autocomplete="off" class="sign-in-form">
            @csrf
              <div class="heading">
                <h2 style="color: red">ID</h2><div></div><h2 style="color: #FFD700">   Togo</h2>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="mail"
                    required
                  />
                  <label>Mail</label>
                  @error('mail')
                    <span>{{ $message }}</span>
                  @enderror
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Password</label>
                  @error('password')
                    <span>{{ $message }}</span>
                  @enderror
                </div>

                <button style="background-color: green;" type="submit" value="Sign In" class="sign-btn">Se connecter</button>

              </div>
            </form>

            
          </div>

          <div class="carousel">

            <div>
              <img id = "imageLogin" src="{{ asset('img/Youngboy.png') }}">
            </div>
            
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="{{ asset('js/AgentLogin.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    <x-notify::notify />
    @notifyJs
  </body>
</html>
