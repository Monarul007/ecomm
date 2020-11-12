@extends('layouts.admin.app')

@section('content')

<!-- Breadcomb area Start-->
    <div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Edit Product</h2>
										<p>Welcome to RKHotelware <span class="bread-ntd">Admin Panel</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Edit Product" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="flass-message-area">
        <div class="container">
            @if ($success = Session::get('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $success }}</strong>
                </div>
            @endif
            @foreach($products as $product)
                @php( $cat_id = $product->cat_id )
                @php( $brand_id = $product->brand_id )
                @php( $name = $product->product_name )
                @php( $desc = $product->product_desc)
                @php( $specs = $product->main_feature )
                @php( $price = $product->before_price )
                @php( $code = $product->product_code )
                @php( $featured = $product->is_featured )
                @php( $image = $product->product_img )
                                            
            @endforeach
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd">
                            <h2>Edit Product</h2>
                            <p>Please fill below fields and click "Update" button to update product</p>
                        </div>

                        <form action="{{ url('/admin/edit-product/'.$id) }}" id="editProduct" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-md-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">General</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="inputName">Product Title</label>
                                                <input type="text" name="inputName" id="inputName" class="form-control" value="{{$name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputDescription">Product Description</label>
                                                <textarea name="inputDescription" id="inputDescription" class="html-editor" rows="8">{{$desc}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSpecs">Product Main Feature</label>
                                                <textarea name="inputSpecs" id="inputSpecs" class="html-editor" rows="8">{{$specs}}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Approx. Price</label>
                                                        <input type="text" name="inputPrice" value="{{$price}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputCategory">Select Category</label>
                                                        <select id="inputCategory" name="inputCategory" class="form-control custom-select">
                                                            <?php if($categories != null){ 
                                                                
                                                                foreach($categories as $cat){ ?>
                                                                    <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?> </option>
                                                            <?php } }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Other Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="text" name="inputCode" class="form-control" value="{{$code}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputImage">Product Image</label> <br>
                                                <img src="/images/products/{{$image}}" alt="" width="70px" style="border-radius: 100%;">
                                                <div class="custom-file">
                                                    <input type="file" name="inputImage" class="custom-file-input" id="inputImage">
                                                    <label class="custom-file-label" for="inputImage">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStatus">Product Type</label>
                                                <select id="inputStatus" name="inputStatus" class="form-control custom-select">
                                                    <option selected value="{{$featured}}"><?php if($featured == 0){ echo 'Regular Product';}elseif($featured == 1){ echo 'Featured Product';} ?></option>
                                                    <option value="0">Regular Product</option>
                                                    <option value="1">Featured Product</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-12">
                                    <a href="" class="btn btn-secondary">Cancel</a>
                                    <button class="btn btn-success notika-btn-success waves-effect">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection