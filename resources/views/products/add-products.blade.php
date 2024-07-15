<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('products.addPostProduct')}}"method="POST">
        @csrf
       name: <input type="text" id="name" name="name"><br>
       price: <input type="text" id="price" name="price"><br>
       view: <input type="text" id="view" name="view"><br>
       category:
       <select name="category" id="category">
        @foreach($category as $value)
            <option value="{{$value->id}}">{{$value->name_cate}}</option>
        @endforeach
       </select>
       <button type="submit">submit</button>
    </form>
</body>
</html>
