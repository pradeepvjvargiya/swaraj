@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <!--
          <div class="section-full content-inner-2 bg-primary wow fadeIn " data-wow-duration="2s" data-wow-delay="0.2s" style="background-image: url(&quot;images/background/map-bg.png&quot;); visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeIn;height:350px;padding-top:150px">
           <div class="container">
            <div class="row">
             <div class="col-lg-12 text-center service-info">
              <h2 class="title text-white">Contact Us</h2>
             </div>
            </div>
           </div>
          </div>
          -->
        <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s"
            style="visibility: visible; animation-duration: 2s; animation-delay: 0.3s; animation-name: fadeIn;height:300px;padding-top:150px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 text-white">
                        <h2 class="title">Contact Us</h2>

                    </div>
                    <div class="col-lg-3 d-flex">
                        <a href="#"
                            class="site-button btnhover17 white align-self-center outline ml-auto outline-2">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="section-full content-inner bg-white contact-style-1">
            <div class="container">
                <div class="row">
                    <!-- right part start -->
                    <div class="col-lg-4 col-md-6 d-flex m-b30">
                        <div class="p-a30 border contact-area border-1 align-self-stretch radius-sm">
                            <h3 class="m-b5">Quick Contact</h3>
                            <p>If you have any questions simply use the following contact details.</p>
                            <ul class="no-margin">
                                <li class="icon-bx-wraper left m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="javascript:void(0);" class="icon-cell"><i
                                                class="ti-location-pin"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dlab-tilte">Address:</h6>
                                        <p>F-483 to F-487, RIICO Growth Centre, Hamirgarh, Bhilwara (Rajasthan) – 311 025
                                        </p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left  m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="javascript:void(0);" class="icon-cell"><i
                                                class="ti-email"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dlab-tilte">Email:</h6>
                                        <p>info@swarajsuiting.com</p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs border-1"> <a href="javascript:void(0);" class="icon-cell"><i
                                                class="ti-mobile"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dlab-tilte">PHONE</h6>
                                        <p>+91 88750-16161</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="m-t20">
                                <ul class="dlab-social-icon border dlab-social-icon-lg">
                                    <li><a href="javascript:void(0);" class="fa fa-facebook bg-primary"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-twitter bg-primary"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-linkedin bg-primary"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-pinterest-p bg-primary"></a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-google-plus bg-primary"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- right part END -->
                    <!-- Left part start -->
                    <div class="col-lg-4 col-md-6  mb-4 m-b30 mb-md-0">
                        <div class="p-a30 bg-gray clearfix radius-sm">
                            <h3 class="m-b10">Send Message Us</h3>
                            <div class="dzFormMsg"></div>
                            <form method="post" class="dzForm" action="script/contact.php">
                                <input type="hidden" value="Contact" name="dzToDo">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="dzName" type="text" required="" class="form-control"
                                                    placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="dzEmail" type="email" class="form-control" required=""
                                                    placeholder="Your Email Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea name="dzMessage" rows="4" class="form-control" required="" placeholder="Your Message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="g-recaptcha"
                                                    data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN"
                                                    data-callback="verifyRecaptchaCallback"
                                                    data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input class="form-control d-none" style="display:none;"
                                                    data-recaptcha="true" required=""
                                                    data-error="Please complete the Captcha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button name="submit" type="submit" value="Submit" class="site-button ">
                                            <span>Submit</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Left part END -->
                    <div class="col-lg-4 d-flex m-b30">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.3825624477!2d75.65046970649679!3d26.88544791796718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C+Rajasthan!5e0!3m2!1sen!2sin!4v1500819483219"
                            class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:100%;"
                            allowfullscreen=""></iframe>
                    </div>

                </div>
            </div>
        </div>
        <!-- contact area  END -->
    </div>
    <!-- Content END-->
@endsection
<!-- JAVASCRIPT FILES ========================================= -->
<script src="js\combining.js"></script><!-- CONTACT JS  -->
<script src='https://www.google.com/recaptcha/api.js'></script> <!-- Google API For Recaptcha  -->