<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('products.updatePostProduct')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$product1->id}}" name="idPro">
       name: <input type="text" id="name" name="name"value="{{$product1->name}}"><br>
       price: <input type="text" id="price" name="price"value="{{$product1->price}}"><br>
       view: <input type="text" id="view" name="view"value="{{$product1->view}}"><br>
       category: 
       <select name="category" id="category">
        @foreach($category as $value)
            @if($product1->category_id === $value->id)
                selected
            @endif
            <option 
                @if($product1->category_id === $value->id)
                    selected
                @endif
                    value="{{$value->id}}">{{$value->name_cate}}
            </option>
        @endforeach
       </select>
       <button type="submit">submit</button>
    </form>
</body>
</html>