<!-- header -->
<header class="site-header mo-left header-transparent header overlay">

    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container clearfix">
                <!-- website logo -->
                <div class="logo-header mostion logo-white" style="width:auto">
                    <a href="index.php"><img src="images/SSL_Logo_2.png" style="max-width:250px;" alt=""></a>
                </div>
                <!-- nav toggle button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- main nav -->
                <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                    <div class="logo-header d-md-block d-lg-none">
                        <a href="index.php"><img src="{{ asset('images/SSL_Logo_2.png') }}" alt=""></a>
                    </div>
                    <?php
                    // include_once('navbar.php');
                    ?>
                    {{--  navbar include start --}}
                    @include('frontends.partials.navbar')
                    {{--  navbar include end --}}
                </div>
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>
<!-- header END -->
