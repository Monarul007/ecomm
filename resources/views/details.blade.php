@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            @if ($success = Session::get('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $success }}</strong>
                </div>
            @endif</div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-5">
            <section id="sect" class="bg-warning p-1">
                <div class="section-title pl-4 text-white">
                    <h5><i class="fa fa-play mr-2"></i>Kitchenware And Utensils</h5>
                </div>
            </section>
            <div class="nav-side-menu">
                    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
                    <div class="menu-list">
                        <ul id="menu-content" class="menu-content collapse out">
                            @foreach($categories as $cat)
                                <li  data-toggle="collapse" data-target="#catID{{$cat->id}}" class="collapsed">
                                <a href="{{$cat->url}}"><i class="fa fa-gift fa-lg"></i>{{$cat->name}}<span class="arrow"></span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: #2f2015;">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Products & Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$CatInfo->name}}</li>
                </ol>
            </nav>
            <div class="cat-title text-white"><h4>{{$CatInfo->name}}</h4></div>
            <div class="cat-desc">{!! $CatInfo->description !!}</div>
            @foreach($getProducts as $product)
            <div id="single-product" class="mt-5 mb-5">
                <div class="product-title">
                    <h4 style="float: left;">{{$product->product_name}}</h4>
                    <h5 style="margin-left: auto;"><i class="fa fa-phone"> </i> <a class="dropdown-item" href="#" data-toggle="modal" data-target="#getPrice" data-id="{{$product->id}}" onClick="open_container3(this);" style="color: #fff;display: contents;">REQUEST CALLBACK</a></h5>
                </div>
                <div class="row mt-2">
                    <br>
                    <div class="col-md-8">
                        <p class="mb15 p_glp"><span class="dspi mr10 ">Approx. <span class="fnt12_p">Rs {{$product->before_price}}</span> / Piece</span><span class="dspi"><a href="#" data-toggle="modal" data-target="#getPrice" data-id="{{$product->id}}" onClick="open_container3(this);" class="btn1 glp_gp ft3_p cu_p c1_p">Get Latest Price</a></span></p>
                        <div class="desc mb-3">
                            <p>Product Details</p>
                            {!! $product->product_desc !!}
                        </div>
                        <p><strong>Additional Information:</strong></p>
                        <div class="ct">{!! $product->main_feature !!}</div>
                    </div>
                    <div class="col-md-4">
                        <img src="/images/products/{{$product->product_img}}" alt="">
                        <div class="text-center mt-4"><span><span data-toggle="modal" data-target="#getPrice" data-id="{{$product->id}}" onClick="open_container3(this);" class="btn1 glp_gp ft3_p cu_p c1_p">Ask for Price</span></span></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="getPrice" tabindex="-1" role="dialog" aria-labelledby="getPrice" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 0;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="insertedImages" style="position: relative;"></div>
                        <div id="product_name"></div>
                    </div>
                    <div class="col-md-6 pr-5">
                        <div class="text-center">
                            <h3>Get Best Quote</h3>
                        </div>
                        <form method="POST" action="{{ route('request.products.price') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="pid" type="hidden" name="inputProduct">
                            <div class="form-group">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter your email...">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter your name...">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Enter your name...">
                            </div>
                            <button class="btn1 glp_gp ft3_p cu_p c1_p">SUBMIT REQUEST</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .section-title h5 i{
            background: #fff;
            width: 20px;
            padding: 4px 6px;
            font-size: 12px;
            height: 20px;
            border-radius: 30px;
            text-align: center;
            color: #111;
        }
        #insertedImages img{width: 100%; border: 2px solid #2f2015;}
        #product_name {
            position: absolute;
            background: #2125296b;
            max-width: 385px;
            width: 100%;
            padding: 10px;
            bottom: 0;
            color: #fff;
        }
        button.close {
            position: absolute;
            right: -5px;
            top: -10px;
            background: #00c292;
            opacity: 1;
            color: #fff;
            height: 26px;
            width: 25px;
            border-radius: 50%;
            font-size: 18px;
            outline: none;
        }
        .close span {
            position: relative;
            bottom: 6px;
            right: 2px;
        }
    </style>

<script type="text/javascript">
    $(document).ready(function(){
    
    });
    function open_container3(id){
        $.ajaxSetup({
                headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{ route("details.products.data") }}',
            method: 'POST',
            dataType: 'JSON',
            data: { id:id.getAttribute('data-id') },
            success: function(data){
                $("#insertedImages").html('<img src="/images/products/'+data.image+'">');
                $("#product_name").html(data.name);
                $("#pid").val(data.id);
            }
        });
    }
</script>

@endsection