<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <form action="{{ route('users.updatePostUsers')}} " method="post">
            @csrf
            <input type="hidden" value="{{$user->id}}" name="idUser">
            ten: <input type="text" name="name" value="{{$user->name}}"><br>
            email : <input type="email" name="email"value="{{$user->email}}"><br>
            phong ban :
            <select name="phongban" id="phongban">
                @foreach($phongban as $value)
                    <option
                        @if($user->phongban_id === $value->id)
                            selected
                        @endif
                            value="{{$value->id}}">{{$value->ten_donvi}}
                    </option>
                @endforeach
            </select><br>
            tuoi : <input type="text" name="tuoi" value="{{$user->tuoi}}"><br>
            so ngay nghi :<input type="text" name="ngaynghi" value="{{$user->songaynghi}}"><br>
            <button
                type="submit"
                class="btn btn-primary"
            >
                update
            </button>
            
        </form>    


        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
