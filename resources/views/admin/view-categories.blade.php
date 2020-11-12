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
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Data Table</h2>
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
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>All Categories</h2>
                            <p>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>{{$category->description}}</td>
                                        <td class="text-center"><?php
                                            if($category->status == 1){
                                                echo '<span class="badge badge-success">Active</span>';
                                            }elseif($category->status == 0){echo '<span class="badge badge-danger">Inactive</span>';}
                                        ?></td>
                                        <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{url('/admin/edit-category/'.$category->id)}}"><i class="fa fa-pencil-alt"></i>Edit</a><button class="btn btn-danger btn-sm" onclick="deleteConfirmation({{$category->id}})"><i class="fa fa-trash"></i>Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

<script type="text/javascript">
    function deleteConfirmation(id) {
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/delete-category')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal.fire("Done!", results.message, "success");
                        } else {
                            swal.fire("Error!", results.message, "error");
                        }
                        window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>
@endsection