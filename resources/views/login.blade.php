<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{secure_asset('css/style_login.css')}}">
</head>
<body>
    <div class="login">
        <div class="login__content">

            <div class="login__img">
                    <img src="{{secure_asset('img/img_login1.svg')}}" alt="">
             </div>
            <div class="login__forms">
                <form  class="form" action="{{ route ('identificacion') }}" method="POST">
                    @csrf
                    <h2 class="form__title">Iniciar Sesión</h2>
                    <div class="form__container">
                        <div class="form__group">
                            <input type="text" id="name" name="email" class="form__input  @error('usuario') is-invalid @enderror" placeholder=" ">
                            <label for="user" class="form__label">Usuario: </label>
                            @error('name')
                            <span class="invalid-feedback " role="alert">
                                {{$message}}
                            </span>
                            @enderror
                            <span class="form__line"></span>
                        </div>
                        <div class="form__group">
                            <input type="password" id="password" name="password" class="form__input @error('contraseña') is-invalid @enderror" placeholder=" ">
                            <label for="password" class="form__label">Contraseña: </label>
                            @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                        @enderror

                            <span class="form__line"></span>
                        </div>
                        <input type="submit" class="form__submit" value="Entrar">
                        <a href="{{route('inicio')}}">Volver</a>
                        <div>
                     </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
