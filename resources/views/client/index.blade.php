@extends('client.layout')

@section('title', 'Trang Chủ')

@section('content')

<div class="properties section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <h6>| Căn hộ dành cho bạn</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="{{ asset('images/property-01.jpg') }}" alt=""></a>
                    <div class="info-content">
                        <span class="category">Luxury Villa</span>
                    <h6>$2.264.000</h6>
                    <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
                    <ul>
                        <li><i class="fa fa-bed" aria-hidden="true"></i> : <span>8</span></li>
                        <li><i class="fa fa-bath" aria-hidden="true"></i> : <span>8</span></li>
                        <li>Area: <span>545m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>6 spots</span></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item" style="    background-color:white !important;">
                    <a href="property-details.html"><img src="{{ asset('images/property-01.jpg') }}" alt=""></a>
                    <div class="info-content">
                        <span class="category">Luxury Villa</span>
                    <h6>$2.264.000</h6>
                    <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
                    <ul>
                        <li>Bedrooms: <span>8</span></li>
                        <li>Bathrooms: <span>8</span></li>
                        <li>Area: <span>545m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>6 spots</span></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item" style="    background-color:white !important;">
                    <a href="property-details.html"><img src="{{ asset('images/property-01.jpg') }}" alt=""></a>
                    <div class="info-content">
                        <span class="category">Luxury Villa</span>
                    <h6>$2.264.000</h6>
                    <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
                    <ul>
                        <li>Bedrooms: <span>8</span></li>
                        <li>Bathrooms: <span>8</span></li>
                        <li>Area: <span>545m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>6 spots</span></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="item" style="    background-color:white !important;">
                    <a href="property-details.html"><img src="{{ asset('images/property-01.jpg') }}" alt=""></a>
                    <div class="info-content">
                        <span class="category">Luxury Villa</span>
                    <h6>$2.264.000</h6>
                    <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
                    <ul>
                        <li>Bedrooms: <span>8</span></li>
                        <li>Bathrooms: <span>8</span></li>
                        <li>Area: <span>545m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>6 spots</span></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section best-deal">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>| Best Deal</h6>
                    <h2>Find Your Best Deal Right Now!</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tabs-content">
                    <div class="row">
                        <div class="nav-wrapper ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                        data-bs-target="#appartment" type="button" role="tab"
                                        aria-controls="appartment" aria-selected="true">Appartment</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa"
                                        type="button" role="tab" aria-controls="villa" aria-selected="false">Villa
                                        House</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab"
                                        data-bs-target="#penthouse" type="button" role="tab"
                                        aria-controls="penthouse" aria-selected="false">Penthouse</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="appartment" role="tabpanel"
                                aria-labelledby="appartment-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Total Flat Space <span>185 m2</span></li>
                                                <li>Floor number <span>26th</span></li>
                                                <li>Number of rooms <span>4</span></li>
                                                <li>Parking Available <span>Yes</span></li>
                                                <li>Payment Process <span>Bank</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-01.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Extra Info About Property</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor
                                            pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                                            <br><br>When you need free CSS templates, you can simply type TemplateMo in
                                            any search engine website. In addition, you can type TemplateMo Portfolio,
                                            TemplateMo One Page Layouts, etc.
                                        </p>
                                        <div class="icon-button">
                                            <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a
                                                visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Total Flat Space <span>250 m2</span></li>
                                                <li>Floor number <span>26th</span></li>
                                                <li>Number of rooms <span>5</span></li>
                                                <li>Parking Available <span>Yes</span></li>
                                                <li>Payment Process <span>Bank</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-02.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Detail Info About Villa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor
                                            pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                                            <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents
                                            typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger
                                            poutine next level humblebrag swag franzen.</p>
                                        <div class="icon-button">
                                            <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a
                                                visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="penthouse" role="tabpanel"
                                aria-labelledby="penthouse-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Total Flat Space <span>320 m2</span></li>
                                                <li>Floor number <span>34th</span></li>
                                                <li>Number of rooms <span>6</span></li>
                                                <li>Parking Available <span>Yes</span></li>
                                                <li>Payment Process <span>Bank</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-03.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Extra Info About Penthouse</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor
                                            pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse.
                                            <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents
                                            typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger
                                            poutine next level humblebrag swag franzen.</p>
                                        <div class="icon-button">
                                            <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a
                                                visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Contact Us</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1038664721837!2d106.7414359!3d10.8033564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752613fedc495b%3A0x1c0785bc13b115bb!2zTWFzdGVyaSBUaOG6o28gxJBp4buBbiAtIFQz!5e0!3m2!1svi!2s!4v1739762125353!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item phone">
                                <img src="{{ asset('images/phone-icon.png') }}" alt="" style="max-width: 52px;">
                                <h6>010-020-0340<br><span>Phone Number</span></h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item email">
                                <img src="{{ asset('images/email-icon.png') }}" alt="" style="max-width: 52px;">
                                <h6>info@villa.co<br><span>Business Email</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form id="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name">Full Name</label>
                                    <input type="name" name="name" id="name" placeholder="Your Name..."
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Your E-mail..." required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" placeholder="Subject..."
                                        autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
