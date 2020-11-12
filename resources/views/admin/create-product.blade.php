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
										<h2>Create Product</h2>
										<p>Welcome to RKHotelware <span class="bread-ntd">Admin Panel</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
                            <h2>Create New Product</h2>
                            <p>Please fill below fields and click "Create" button to create a new product</p>
                        </div>
                        @if ($success = Session::get('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $success }}</strong>
                        </div>
                        @endif

                        <form action="{{ url('/admin/create-product') }}" id="addProduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-body">
                                        <div class="form-group">
                                                    <label for="inputName">Product Title</label>
                                                    <input type="text" name="inputName" id="inputName" class="form-control" placeholder="Enter Title...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDescription">Product Description</label>
                                                    <textarea name="inputDescription" id="inputDescription" class="html-editor" rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFeature">Main Features</label>
                                                    <textarea name="inputFeature" id="inputFeature" class="html-editor" rows="8"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Approx. Price</label>
                                                            <input type="text" name="inputPrice" class="form-control" placeholder="Enter ...">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="inputCategory">Select Category</label>
                                                            <select id="inputCategory" name="inputCategory" class="form-control custom-select">
                                                                <option selected disabled>Select One</option>
                                                                <?php if($category != null){ 
                                                                    foreach($category as $cat){ ?>
                                                                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?> </option>
                                                                <?php } }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Code</label>
                                                    <input type="text" name="inputCode" class="form-control" placeholder="Enter ...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputImage">Product Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="inputImage" class="custom-file-input" id="inputImage">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStatus">Product Type</label>
                                                    <select id="inputStatus" name="inputStatus" class="form-control custom-select">
                                                        <option selected disabled>Select one</option>
                                                        <option value="0">Regular Product</option>
                                                        <option value="1">Featured Product</option>
                                                    </select>
                                                </div>
                                        </div>
                                    <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-5">
                                <div class="col-12">
                                    <a href="admin/create-product" class="btn btn-secondary">Cancel</a>
                                    <!-- <input type="submit" value="Create new Product" class="btn btn-success float-right"> -->
                                    <button type="submit" class="btn btn-success notika-btn-success waves-effect">Create new Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection