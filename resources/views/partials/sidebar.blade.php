<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->


    <!-- Start Financial Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-financial" data-bs-toggle="collapse" href="">
            <i class="bi bi-menu-button-wide"></i><span>Finance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-financial" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('reports/financial/list') }}">
                    <i class="bi bi-circle"></i><span>Financial</span>
                </a>
            </li>
            <li>
                <a href="{{ url('documents/annual-return/list') }}">
                    <i class="bi bi-circle"></i><span>Annual Return</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- End Financial Nav --}}

    <!-- Start Notices & Outcomes Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-notices" data-bs-toggle="collapse" href="">
            <i class="bi bi-menu-button-wide"></i><span>Notices & Outcomes</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-notices" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('documents/notices/list') }}">
                    <i class="bi bi-circle"></i><span>Notices</span>
                </a>
            </li>
            <li>
                <a href="{{ url('documents/outcomes/list') }}">
                    <i class="bi bi-circle"></i><span>Outcomes</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Notices & Outcomes Nav -->

    <!-- Start General Meetings / AGM/ Postal Ballot Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-general-meetings" data-bs-toggle="collapse"
            href="">
            <i class="bi bi-menu-button-wide"></i><span>General Meetings / AGM/ Postal Ballot</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-general-meetings" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('documents/general-meetings/list') }}">
                    <i class="bi bi-circle"></i><span>General Meetings</span>
                </a>
            </li>
            <li>
                <a href="{{ url('documents/voting-results/list') }}">
                    <i class="bi bi-circle"></i><span>Voting Results</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End General Meetings / AGM/ Postal Ballot Nav -->

    <!-- Start Shareholding Pattern Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-shareholding-pattern" data-bs-toggle="collapse"
            href="">
            <i class="bi bi-menu-button-wide"></i><span>Shareholding Pattern</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-shareholding-pattern" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('reports/shareholding-pattern/list') }}">
                    <i class="bi bi-circle"></i><span>Shareholding Pattern</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Shareholding Pattern Nav -->

    <!-- Start Policies Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-policy" data-bs-toggle="collapse" href="">
            <i class="bi bi-menu-button-wide"></i><span>Policies</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-policy" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('documents/policy/list') }}">
                    <i class="bi bi-circle"></i><span>Policies</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Policies Nav -->

    <!-- Start Prospectus Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-prospectus" data-bs-toggle="collapse" href="">
            <i class="bi bi-menu-button-wide"></i><span>Prospectus</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-prospectus" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('documents/prospectus/list') }}">
                    <i class="bi bi-circle"></i><span>Prospectus</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Prospectus Nav -->

    <!-- Start Listing Compliances Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-compliances" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Listing Compliances</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-compliances" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('documents/listing-compliances/list') }}">
                    <i class="bi bi-circle"></i><span>Listing Compliances</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Listing Compliances Nav -->
</ul>
