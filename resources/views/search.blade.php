@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-4">
        <a href="">Filter</a>

    </div>
    <div class="col-sm-4">
            <div class="trending-wrapper">
            @if(!empty($products))
            <h3>Product Not Found</h3>
            @else
                <h3>Result of searched product</h3>

                    @foreach($products as $item)
                        <div class="searched-item">
                            <a href="detail/{{$item['id']}}">
                            <img class="trending-image" src="{{$item['gallery']}}">
                                <div class="">
                                    <h2>{{$item['name']}}</h2>
                                    <p>{{$item['description']}}</p>
                                </div>
                            </a>    
                        </div>

                    @endforeach
                    @endif

            </div>
        </div>
</div>
@endsection
