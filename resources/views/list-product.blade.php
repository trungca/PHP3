<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>helo may con vo</h1>
    <table border="1">
    
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
    
    <tbody>
        
        <!-- @foreach($listProduct as $value)
            <tr>
                <td>{{$value ['id']}}</td>
                <td>{{$value['name']}}</td>
            </tr>
        @endforeach -->
        @foreach($data as $value)
            <tr>
                <td>{{$value ['id']}}</td>
                <td>{{$value['name']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>