<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('users.addUsers') }}">themmoi</a>
    <table>
        <thead>
            <tr>
                <th>stt</th>
                <th>ten</th>
                <th>email</th>
                <th>phong ban</th>
                <th>hanh dong</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUsers as $key => $users)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->ten_donvi}}</td>
                <td>
                <a href="{{ route('users.deleteUsers',  $users->id) }}">delete</a>
                <a href="{{ route('users.updateUsers',  $users->id) }}">update</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>