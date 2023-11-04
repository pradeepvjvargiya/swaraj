@extends('frontends.layout')
@section('content')
<!-- Content -->
<div class="page-content bg-white" style="padding-bottom:0px">
    <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
        style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">About Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li>Company Profile</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 m-b30">
                    <div class="our-story">
                        <h2 class="title">Running a <br>successful business <br><span class="text-primary">since
                                2003</span></h2>
                        <h4 class="title">The company was incorporated in year 2003, with the main object of
                            manufacturing, trading and dealing in textiles. At present the company has a manufacturing
                            unit at Bhilwara (Rajasthan), which is a weaving unit. </h4>
                        <p>
                            The company under its Bhilwara unit was engaged in manufacturing of cotton & synthetic
                            fabric. Major production under the existing unit was done for big market players like Arvind
                            Limited on job work basis, which were thereby converting the company’s products into denim
                            fabric. The company now strategically wants to expand its operations to the next level of
                            supply chain, which shall result in higher operating margins.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 m-b30 our-story-thum">
                    <img src="images/about/swaraj_about2.jpg" class="radius-sm" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="section-full content-inner-2 bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s"
        style="background-image:url(images/background/map-bg.png);">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
                    <div class="exhibition-carousel owl-carousel owl-none m-b30">
                        <div class="item"><img src="images/about/swaraj_expansion1.jpg" alt=""></div>
                        <div class="item"><img src="images/about/swaraj_expansion2.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-lg-6 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">
                    <div class="our-story text-white">
                        <h2 class="title text-white">
                            Business Expansion
                        </h2>
                        <div style="text-align:justify text-white">The company is coming up with an expansion project in
                            Madhya Pradesh under which it shall set-up a processing plant for denim fabric, which will
                            be forward integration of its existing business. The company shall purchase equipments for
                            denim fabric processing, which shall enable the company to process approx. 15 million meters
                            of denim fabric per annum.
                        </div>
                        <br />
                        <div style="text-align:justify text-white">
                            The project is proposed to be situated at Jhanjarwada Industrial Area in Neemuch district of
                            Madhya Pradesh being developed by M.P. Industrial Development Corporation Limited (MPIDC).
                            Land admeasuring 29653 sq. mtrs. (Plot No. B-24 to B-41) has been booked by the company for
                            the project. The registration of the same in favour of the company shall be done in
                            September / October 2020. The site has been selected considering proximity to all necessary
                            infrastructural facilities.
                        </div>

                    </div>
                    <!--
       <div class="content-bx1">
        <div class="section-head">
         <h2 class="title text-center">Welcome to Swaraj Suiting Limited </h2>
         <p>The company was incorporated in year 2003, with the main object of manufacturing, trading and dealing in textiles. At present the company has a manufacturing unit at Bhilwara (Rajasthan), which is a weaving unit. </p>
        </div>
        <a href="portfolio-details.html" class="site-button btnhover21 black m-b10">Company Profile</a>
        <a href="contact-1.html" class="site-button btnhover21 black m-r10 m-b10">Contact us</a>
       </div>
       -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us End -->
    <!--
   <div class="section-full content-inner-2 bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s" style="background-image:url(images/background/map-bg.png);">
    <div class="container">
     <div class="row">
      <div class="col-lg-12 text-center service-info">
       <h2 class="title text-white">
       Business Expansion
       </h2>
       <p style="text-align:justify">The company is coming up with an expansion project in Madhya Pradesh under which it shall set-up a processing plant for denim fabric, which will be forward integration of its existing business. The company shall purchase equipments for denim fabric processing, which shall enable the company to process approx. 15 million meters of denim fabric per annum. </p>
       <br/>
       <p style="text-align:justify">
       The project is proposed to be situated at Jhanjarwada Industrial Area in Neemuch district of Madhya Pradesh being developed by M.P. Industrial Development Corporation Limited (MPIDC). Land admeasuring 29653 sq. mtrs. (Plot No. B-24 to B-41) has been booked by the company for the project. The registration of the same in favour of the company shall be done in September / October 2020. The site has been selected considering proximity to all necessary infrastructural facilities.
       </p>
      </div>
     </div>
    </div>
   </div>
   -->

    <div class="section-full">
        <div class="row spno about-industry">
            <div class="col-lg-8 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="dlab-post-media dlab-img-effect zoom">
                    <img src="images/about/swaraj_about1.jpg" alt="" class="img-cover">
                </div>
            </div>
            <div class="col-lg-4 bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="service-box style2">
                    <div>
                        <h2 class="title text-black"><span>Installed</span> Capacity</h2>
                        <p>
                            The installed capacity of the company is 125 Looms with an annual Production Capacity of
                            approx. 22 million meters of cotton & synthetic fabric or approx. 15 million meters of denim
                            fabric per annum. The installed capacity (in meters) is less in terms of denim fabric due to
                            shrinkages in conversion process of denim fabric. The existing 125 looms of the company
                            shall cater to the requirements of both the existing as well as proposed project. However,
                            with the increase in volume of operations, additional looms shall be set-up by the company
                            in the near future on need basis.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call To Action End -->

    <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-white">

                    <h2 class="title">Contact us if you have any query or want to explore more opporunities with us!
                    </h2>
                </div>
                <div class="col-lg-3 d-flex">
                    <a href="/contact"
                        class="site-button white align-self-center outline ml-auto radius-xl outline-2 btnhover16 btnhover16">Contact
                        Us</a>
                </div>
            </div>
        </div>
    </div>

    <div id="rev_slider_11_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home10"
        data-source="gallery"
        style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.7 auto mode -->
        <div id="rev_slider_11_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
            <ul>
                <!-- SLIDE  -->
                <li data-index="rs-29" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="images/about/swaraj_about3.jpg" alt="" data-bgposition="center center"
                        data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="9" class="rev-slidebg"
                        data-no-retina>
                    <!-- LAYERS -->
                    <div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer"
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                        data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                        data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                        data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
                        data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 2;background-color:rgba(0, 0, 0, 0.2);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                    </div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption rev_group" id="slide-29-layer-8"
                        data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']"
                        data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                        data-width="['1018','1018','690','690']" data-height="['555','555','457','457']"
                        data-whitespace="nowrap" data-type="group" data-responsive_offset="on"
                        data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                        data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        style="z-index: 7; min-width: 1018px; max-width: 1018px; max-width: 555px; max-width: 555px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-resizeme" id="slide-29-layer-5"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','top','top']" data-voffset="['160','148','130','117']"
                            data-fontsize="['80','80','80','50']" data-lineheight="['94','94','94','64']"
                            data-width="['936','936','500','500']" data-height="none" data-whitespace="normal"
                            data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":"+290","speed":1660,"sfxcolor":"#ffffff","sfx_effect":"blockfromtop","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                            data-marginleft="[0,0,0,0]" data-textAlign="['center','center','center','center']"
                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]"
                            style="z-index: 8; min-width: 936px; max-width: 936px; white-space: normal; font-size: 80px; line-height: 94px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family:Roboto;">
                            Swaraj Suiting Limited
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-resizeme" id="slide-29-layer-3"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','top','top']" data-voffset="['100','95','70','64']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+1360","speed":570,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                            data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[2,2,2,2]"
                            data-paddingleft="[0,0,0,0]" data-fontsize="[20, 20, 20, 20]"
                            style="z-index: 9; white-space: nowrap; font-size: 12px; line-height: 22px; font-weight: 700; color: #ffffff; letter-spacing: 2px;font-family:Roboto;text-transform:uppercase;border-color:rgb(246,115,46);border-style:solid;border-width:0px 0px 2px 0px;">
                            Building up vision leading future
                        </div>
                        <!-- LAYER NR. 5 -->
                        <a class="tp-caption TM-Button-flat-01 rev-btn bg-primary" href="/products" target="_self"
                            id="slide-29-layer-7" data-x="['center','center','center','center']"
                            data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                            data-voffset="['440','451','420','460']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on"
                            data-frames='[{"delay":"+2090","speed":630,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(34,34,34);bg:rgb(255,255,255);bs:solid;bw:0 0 0 0;"}]'
                            data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                            data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                            data-paddingtop="[12,12,12,12]" data-paddingright="[30,30,30,30]"
                            data-paddingbottom="[12,12,12,12]" data-paddingleft="[30,30,30,30]"
                            data-fontsize="[18, 18, 18, 18]"
                            style="z-index: 11; white-space: nowrap; color: #ffffff; letter-spacing: 0.5px;text-transform:uppercase;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;text-decoration: none;">
                            our products
                        </a>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>


    <!-- Call To Action End -->

</div>
<!-- Content END-->
@endsection

<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_11();
        $('.lazy').Lazy();
    }); /*ready*/
</script>
