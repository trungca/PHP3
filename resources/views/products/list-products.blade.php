<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('products.addProduct')}}">themmoi</a>

    <table border="1" id="productTable">
        <thead>
            <tr>
                <th>stt</th>
                <th>name</th>
                <th>price</th>
                <th>view</th>
                <th>category</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($product1 as $key => $value)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->view}}</td>
                <td>{{$value->name_cate}}</td>
                <td>
                <a href="{{ route('products.deleteProduct',  $value->id) }}">delete</a>
                <a href="{{ route('products.updateProduct',  $value->id) }}">update</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<script>
        function searchProduct() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productTable");
            tr = table.getElementsByTagName("tr");

            // Duyệt qua từng dòng của bảng
            for (i = 0; i < tr.length; i++) {
                // Lấy cột tên sản phẩm (cột thứ 2)
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    // So sánh giá trị tìm kiếm với tên sản phẩm
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</html>
