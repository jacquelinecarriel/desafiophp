<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel= "stylesheet " href= "{{asset('css/app.css')}}" > -->
    <link rel="stylesheet" href="css/form.css">
</head>

<body>

<header>
@include('header')
</header> 


    <!-- login -->

    <section class="container-login">
    <div class="login">
    <div class="card">
     <div class="card-header">{{ __('Login') }}</div>

     <form method="POST" action="{{ route('login') }}">    
     @csrf

         
        <h1>{{ __('Login') }} </h1>
           
        <label for="email">{{ __('E-Mail Address') }}</label>
        <br>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        <br>
        <label for="password">{{ __('Senha') }}</label>
        <br>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <br>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembre-se de mim') }}
                                    </label>
        <button type="submit"class="btn btn-lg btn-block" style='color:white; background-color:rgb(3, 152, 158);'>{{ __('Entrar') }}</button>

    </div>   
    </form> 
    </section>

        <section class="base">
            @include('footer')
        </section>


</body>
</html>
