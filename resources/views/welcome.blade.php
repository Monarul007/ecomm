@extends('layouts.app')

@section('content')

            <section id="slide" class="mb-4">
                <div id="home-carousel">
                    <div class="owl-carousel owl-theme">
                        @foreach($products as $product)
                            <div class="item"><img src="images/products/{{$product->product_img}}" alt="" style="position: relative;"><h4 style="position: absolute; bottom: -10px; padding: 10px; background: #00000045; width: 100%; max-width: 250px; font-size: 16px;"><a href="#{{$product->slug}}" class="text-white">{{$product->product_name}}</a></h4></div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section id="sect" class="bg-warning p-1">
                <div class="section-title pl-4 text-white">
                    <h4><i class="fa fa-play mr-2"></i>Kitchenware And Utensils</h4>
                </div>
            </section>
            <section id="categories" class="mt-4">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="p-1 mb-3" style="background-color: #f0f8ff78;min-height: 54px;">
                                <div class="website-traffic-ctn pl-4">
                                    <h5><i class="fa fa-play"></i> <a href="/$category->url">{{$category->name}}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <h3>Welcome to RKHotelwares</h3>
            <section id="about-rk">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="p-1 mb-3">
                                    <div class="website-traffic-ctn pl-4 d-flex">
                                        <i class="fa fa-play" style="background: #fff;width: 25px;height: 25px;border-radius: 100%;text-align: center;padding: 5px;"></i>
                                        <h5 style="margin: 0 10px;">Nature of Business <br><span class="small text-black">Manufacturer</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="p-1 mb-3">
                                    <div class="website-traffic-ctn pl-4 d-flex">
                                        <i class="fa fa-play" style="background: #fff;width: 25px;height: 25px;border-radius: 100%;text-align: center;padding: 5px;"></i>
                                        <h5 style="margin: 0 10px;">Total Number of Employees<br><span class="small text-black">26 to 50 People</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="p-1 mb-3">
                                    <div class="website-traffic-ctn pl-4 d-flex">
                                        <i class="fa fa-play" style="background: #fff;width: 25px;height: 25px;border-radius: 100%;text-align: center;padding: 5px;"></i>
                                        <h5 style="margin: 0 10px;">Year of Establishment<br><span class="small text-black">1994</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="p-1 mb-3">
                                    <div class="website-traffic-ctn pl-4 d-flex">
                                        <i class="fa fa-play" style="background: #fff;width: 25px;height: 25px;border-radius: 100%;text-align: center;padding: 5px;"></i>
                                        <h5 style="margin: 0 10px;">Legal Status of Firm<br><span class="small text-black">Individual - Proprietor</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="p-1 mb-3">
                                    <div class="website-traffic-ctn pl-4 d-flex">
                                        <i class="fa fa-play" style="background: #fff;width: 25px;height: 25px;border-radius: 100%;text-align: center;padding: 5px;"></i>
                                        <h5 style="margin: 0 10px;">Annual Turnover<br><span class="small text-black">Rs. 5 - 10 Crore</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="p-1 mb-3">
                                    <div class="website-traffic-ctn pl-4 d-flex">
                                        <i class="fa fa-play" style="background: #fff;width: 25px;height: 25px;border-radius: 100%;text-align: center;padding: 5px;"></i>
                                        <h5 style="margin: 0 10px;">GST No.<br><span class="small text-black">07ADJPJ3379D1ZJ</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="images/CTS-logo-round-1.png" alt="" width="100px">
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-md-8">
                        <p style="text-align: justify;">With almost 25 years of serving hospitality industry, we have successfully set the bench marks in the industry offering world-class stainless steel restaurant supplies and hotel supplies like karahi stand, Lazy susies, chafing dishes, tableware, barware, flatware, trolleys, pots & pans, serveware, life style products, commercial tandoor and house keeping items. These are fabricated from food grade raw material and various metals in compliance with the international standards. We are one of the leading manufacturer and exporter of stainless steel restaurant supplies and hotel supplies like karahi stand.
                        <br><br>
                        Our success in the domestic market has enabled us in venturing our business in the foreign countries. Today, we enjoy almost double the share of domestic market, owing to our high quality products & services which we try to make available at industry leading prices.</p>
                        <button class="btn btn-warning btn-small">More..</button>
                    </div>
                    <div class="col-md-4">
                        <div class="widget-title bg-warning">
                            <h4 style="padding: 8px 10px">LATEST NEWS</h4>
                        </div>
                        <div id="latest-news-carousel" style="border: 1px solid; margin-top: -10px;">
                            <div class="owl-carousel owl-theme">
                                <div class="item p-4">
                                    <a href="" class="text-warning">News Headline here</a>
                                    <p>Year on year, we keep coming with new products that we showcase in popular Trade Fairs like AAHAR which commenced from 13th to 17th March 2018, EPCH,...</p>
                                    <a href="" class="text-warning text-right">Read More...</a>
                                </div>
                                <div class="item p-4">
                                    <a href="" class="text-warning">News Headline here</a>
                                    <p>Year on year, we keep coming with new products that we showcase in popular Trade Fairs like AAHAR which commenced from 13th to 17th March 2018, EPCH,...</p>
                                    <a href="" class="text-warning text-right">Read More...</a>
                                </div>
                                <div class="item p-4">
                                    <a href="" class="text-warning">News Headline here</a>
                                    <p>Year on year, we keep coming with new products that we showcase in popular Trade Fairs like AAHAR which commenced from 13th to 17th March 2018, EPCH,...</p>
                                    <a href="" class="text-warning text-right">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="home-contact">
                <div class="card">
                    <div class="card-header">Tell Us What Are You Looking For ?</div>
                    <div class="card-body">
                        <form action="{{ route('request.contact.create') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="description">Message</label>
                                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Describe your requirements in detail:"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="S_mobile">Phone Number</label>
                                <input type="text" name="S_mobile" class="form-control" id="S_mobile" placeholder="+91 XXXXXXXXXXX">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Your Name*</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter Your Name..">
                            </div>
                            <button type="submit" class="mt-3 btn btn-warning">SEND MESSAGE</button>
                        </form>
                    </div>
                </div>
            </section>
            <br><br>
@endsection