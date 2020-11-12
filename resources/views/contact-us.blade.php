@extends('layouts.app')

@section('content')

<section id="contact-details" class="bg-white p-4 mb-5">
    <div class="row">
        <div class="col-md-4">
            <h4>Contact Details</h4>
            <div class="c-person d-flex">
                <i class="fa fa-user" style="padding: 10px 15px; margin-left: -6px; font-size: 30px;"></i>
                <div class="cp-details">
                    <h5><strong>Contact Person:</strong></h5>
                    <p>Vineet Juneja (CEO) <br> Mr. P. C. Juneja</p>
                </div>
            </div>
            <div class="c-address d-flex">
                <div class="group-icons d-flex">
                    <i class="fa fa-map-marker float-left" style="padding: 10px 15px; margin-left: -6px; font-size: 30px;"></i>
                    <div class="ca-details">
                        <h5><strong>Address:</strong></strong></h5>
                        <h5><strong>RKHotelwares</strong></strong></h5>
                        <p>4623, 1st Floor, Deputy Ganj, Sadar Bazaar, New Delhi - 110006, Delhi, India</p>
                    </div>
                    <i class="fa fa-map-marker float-right" style="padding: 10px;font-size: 30px;"></i>
                    <div class="ca-details">
                        <h5><strong>Get Direction</strong></h5>
                    </div>
                </div>
            </div>
            <i class="fa fa-phone float-left" style="padding: 10px 15px; margin-left: -6px; font-size: 30px;"></i>
            <div class="ca-details">
                <h5><strong>Call Us:</strong></strong></h5>
                <h5><strong>+91-8048763677</strong></strong></h5>
            </div>
            <p><a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus" style="border: 1px solid;border-radius: 100%;width: 20px;height: 20px;text-align: center;padding-top: 2px"></i> Other Contact Details</a></p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <p>PC Juneja<br>Skype ID: metalkraftindia, India</p>
                    <hr>
                    <p>Factory<br>Vineet Juneja<br>Metal Kraft India, Lakri Industrial Estate, Delhi Road, Moradabad, Uttar Pradesh-244 001, India</p>
                    <hr>
                    <p>Branch Office<br>Vineet Juneja</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">Tell Us What Are You Looking For ?</div>
                    <div class="card-body">
                        <form action="{{ route('request.contact.create') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="description">Message</label>
                                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Describe your requirements in detail:" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="S_mobile">Phone Number</label>
                                <input type="text" name="S_mobile" class="form-control" id="S_mobile" placeholder="+91 XXXXXXXXXXX" required>
                            </div>
                            <div class="form-group">
                                <label for="fullname">Your Name*</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Your Name.." required>
                            </div>
                            <button type="submit" class="mt-3 btn btn-warning">SEND MESSAGE</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</section>

<style>
    hr{margin: 10px;}
</style>

@endsection