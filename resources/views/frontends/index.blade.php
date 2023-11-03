@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Slider -->
        <div class="main-slider style-two default-banner" id="home">
            <div id="rev_slider_1061_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="creative-freedom"
                data-source="gallery" style="background-color:#1f1d24;padding:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                <div id="rev_slider_1061_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-index="rs-100" data-transition="fadethroughdark" data-slotamount="default"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="2000" data-thumb="images/main-slider/slide25.jpg" data-rotate="0"
                            data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('images/about/swaraj_about3.jpg') }}" alt=""
                                data-bgposition="center center" data-bgfit="cover" data-bgparallax="3" class="rev-slidebg"
                                data-no-retina="">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-tobggroup"
                                id="slide-100-layer-1" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0']" data-fontweight="['100','100','400','400']"
                                data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                                data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                                data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
                                data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 5; background-color:rgba(18, 12, 20, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-shape tp-shapewrapper bg-primary rs-parallaxlevel-3"
                                id="slide-100-layer-2" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['-150','-178','-120','-141']" data-width="5" data-height="100"
                                data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-responsive="off"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 6;border-color:rgba(0, 0, 0, 0);border-width:0px;">
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption Creative-SubTitle tp-resizeme rs-parallaxlevel-2 text-primary"
                                id="slide-100-layer-3" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['-60','-91','-20','-30']" data-fontsize="['14','14','14','14']"
                                data-lineheight="['14','14','14','14']" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 7; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif;">
                                Weaving The Future
                            </div>
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption Creative-Title tp-resizeme rs-parallaxlevel-1" id="slide-100-layer-4"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['40','-10','60','40']"
                                data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']"
                                data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap"
                                data-type="text" data-responsive_offset="on"
                                data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 8; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif;">
                                Welcome to<Br />Swaraj Suiting
                            </div>
                            <!-- LAYER NR. 5 -->
                            <div class="tp-caption tp-shape tp-shapewrapper bg-primary rs-parallaxlevel-3"
                                id="slide-100-layer-5" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['200','137','210','180']" data-width="5" data-height="100"
                                data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                                data-responsive="off"
                                data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                                data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                style="z-index: 9; border-color:rgba(0, 0, 0, 0);border-width:0px;">
                            </div>
                            <!-- LAYER NR. 6 -->
                            <div class="tp-caption Creative-Button rev-btn text-primary rs-parallaxlevel-15"
                                id="slide-100-layer-6" data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                data-voffset="['720','611','800','650']" data-fontweight="['400','500','500','500']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                                data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]'
                                data-responsive_offset="on" data-responsive="off"
                                data-frames='[{"from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3850,"ease":"Power2.easeOut"},{"delay":"wait","speed":500,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","ease":"Power1.easeIn"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#e87800;bc:#e87800;bw:1px 1px 1px 1px;"}]'
                                data-textalign="['left','left','left','left']" data-paddingtop="[15,15,15,15]"
                                data-paddingright="[50,50,50,30]" data-paddingbottom="[15,15,15,15]"
                                data-paddingleft="[50,50,50,30]"
                                style="z-index: 10; white-space: nowrap; outline:none; box-shadow:none; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; cursor:pointer;font-family: 'Roboto Condensed', sans-serif; border-color: var(--color-primary);">
                                CONTINUE THE JOURNEY
                            </div>
                        </li>

                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div><!-- END REVOLUTION SLIDER -->
        </div>
        <!-- Slider END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- About Me -->
            <div class="section-full content-inner exhibition-bx">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="exhibition-carousel owl-carousel owl-none m-b30">
                                <div class="item"><img src="{{ asset('images/home/pic1.jpg') }}" alt=""></div>
                                <div class="item"><img src="{{ asset('images/home/pic3.jpg') }}" alt=""></div>
                                <div class="item"><img src="{{ asset('images/home/pic2.jpg') }}" alt=""></div>

                            </div>
                        </div>
                        <div class="col-lg-6 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="our-story">
                                <span>OUR STORY</span>
                                <h2 class="title">We Help You to Turn<br /> Vision Into <span class="text-primary">
                                        Reality</span></h2>
                                <h4 class="title">We are engaged into production of grey and finished fabric which are
                                    used into home textiles, bottom wears etc.</h4>
                                <p>
                                    The company under its Bhilwara unit is engage in manufacturing of cotton & synthetic
                                    fabric. Major production under the existing unit was done for big market players like
                                    Arvind Limited on job work basis, which were thereby converting the company’s products
                                    into denim fabric. The company now strategically wants to expand its operations to the
                                    next level of supply chain, which shall result in higher operating margins.
                                </p>
                                <a href="/company-profile" class="site-button btnhover16">Read More</a>
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
            <!-- Our Project and Gallery -->
            <div class="section-full">
                <div class="row spno about-industry">
                    <div class="col-lg-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
                        <div class="dlab-img-effect zoom">
                            <img src="{{ asset('images/about/denim3.jpg') }}" alt="" class="img-cover">
                        </div>
                    </div>
                    <div class="col-lg-4 bg-secondry text-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="service-box style2">
                            <div>
                                <h2 class="title"><span>Our Vision </span> & Mission</h2>
                                <p>
                                    The Company, <strong>Swaraj Suiting Limited</strong> has strategically planned the
                                    vertical integration of its operations to the next level of supply chain, aiming to
                                    lower production costs and increase the efficiency of the company.
                                </p>
                                <a href="/vision-mission" class="site-button btnhover21 outline white outline-2">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
                        <div class="dlab-img-effect zoom">
                            <img src="{{ asset('images/about/denim4.jpg') }}" alt="" class="img-cover">
                        </div>
                    </div>
                    <div class="col-lg-4 bg-primary text-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
                        <div class="service-box style2">
                            <div>
                                <h2 class="title"><span>Group of </span> Companies.</h2>
                                <p>
                                    The company is coming up with an expansion project in Madhya Pradesh under which it
                                    shall set-up a processing plant for denim fabric, which will be forward integration of
                                    its existing business. The company shall purchase equipments for denim fabric
                                    processing, which shall enable the company to process approx. 15 million meters of denim
                                    fabric per annum.
                                </p>
                                <a href="/group-of-companies" class="site-button btnhover21 outline white outline-2">Know
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="dlab-img-effect zoom">
                            <img src="{{ 'images/about/denim2.jpg' }}" alt="" class="img-cover">
                        </div>
                    </div>
                    <div class="col-lg-4 bg-primary text-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="service-box style2">
                            <div>
                                <h2 class="title text-black"><span>Board of </span> <br>Directors</h2>
                                <p>
                                    The promoters are engaged in the field of manufacturing cotton & synthetic fabrics since
                                    last 25 years and have earned wide experience in the textile industry over the years.

                                </p>
                                <a href="/board-of-directors" class="site-button btnhover21 outline white outline-2">Know
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Client logo -->
            <div class="section-full content-inner-2 bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title text-capitalize"><br /><span class="text-primary">Clientele</span></h2>
                    </div>
                    <div
                        class="client-logo-carousel owl-loaded owl-theme owl-carousel owl-dots-none owl-btn-center-lr owl-btn-3">
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo border">
                                    <a href="javascript:void(0);"><img src="{{ asset('images/client-logo/arvind.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo border">
                                    <a href="javascript:void(0);"><img src="{{ asset('images/client-logo/ginni.jpg') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo border">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('images/client-logo/mafatlal.jpg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo border">
                                    <a href="javascript:void(0);"><img src="{{ asset('images/client-logo/rswm.jpg') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo border">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('images/client-logo/saam_textile.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo border">
                                    <a href="javascript:void(0);"><img
                                            src="{{ asset('images/client-logo/siyaram.jpg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Client logo End -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END -->
@endsection
