

@if($var1=='1')
    <h1>1</h1>
@elseif($var1 != '1')
    <h1>2</h1>
@endif

@switch($var1)
    @case '1':
        <h1>1</h1>
    @break;

@include('viewCon')
