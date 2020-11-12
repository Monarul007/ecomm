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
										<h2>Create Category</h2>
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
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Create New Category</h2>
                            <p>Please fill below fields and click "Create" button to create a new category</p>
                        </div>
                        @if ($success = Session::get('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $success }}</strong>
                        </div>
                        @endif

                        <form action="{{ url('/admin/create-category') }}" id="addCategory" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-support"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" id="inputName" name="inputName" class="form-control" placeholder="Category Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-mail"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" name="inputURL" id="inputURL" class="form-control">
                                            <label class="nk-label">Category URL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group pl-2">
                                        <label for="inputImage">Upload Category Image</label>
                                        <input type="file" name="inputImage" class="form-control-file" id="inputImage">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="nk-int-mk sl-dp-mn">
                                        <h2>Select Status</h2>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="inputStatus">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cmp-tb-hd bsc-smp-sm">
                                        <label>Category Description</label>
                                    </div>
                                    <textarea name="InputDesc" id="InputDesc" class="html-editor"></textarea>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <button class="btn btn-success notika-btn-success waves-effect">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection