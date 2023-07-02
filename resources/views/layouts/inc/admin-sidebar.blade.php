
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav sb-sidenav-light accordion" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">មុខងារសំខាន់ៗ</div>
                <a class="font-semibold nav-link {{ Request::is('admin/dashboard') ? 'active':'' }}" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon" style="margin-top: 1px;">
                        <i class="fab fa-dashcube fa-xl"></i>
                    </div>
                    ផ្ទាំងគ្រប់គ្រងសង្ខេប
                </a>
                <a class="font-semibold nav-link {{ Request::is('admin/category') || Request::is('admin/add-category') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon" style="margin-top: 2px;">
                        <i class="far fa-compass fa-xl"></i>
                    </div>
                    ខេត្ត-ក្រុង
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-category/*') ? 'show':'' }}" id="collapseCategory" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="font-semibold nav-link {{ Request::is('admin/add-category') ? 'active':'' }}" href="{{ url('admin/add-category') }}">បង្កើតខេត្ត-ក្រុងថ្មី</a>
                        <a class="font-semibold nav-link {{ Request::is('admin/category') || Request::is('admin/edit-category/*') ? 'active':'' }}" href="{{ url('admin/category') }}">មើលខេត្ត-ក្រុងទាំងអស់</a>
                    </nav>
                </div>

                <a class="font-semibold nav-link {{ Request::is('admin/posts') || Request::is('admin/add-post') ? 'collapse active':'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="far fa-newspaper fa-xl"></i>
                    </div>
                    អត្ថបទ
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/posts') || Request::is('admin/add-post') || Request::is('admin/edit-post/*') ? 'show':'' }}" id="collapsePost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="font-semibold nav-link {{ Request::is('admin/add-post') ? 'active':'' }}" href="{{ url('admin/add-post') }}">បង្កើតអត្ថបទថ្មី</a>
                        <a class="font-semibold nav-link {{ Request::is('admin/posts') || Request::is('admin/edit-post/*') ? 'active':'' }}" href="{{ url('admin/posts') }}">មើលអត្ថបទទាំងអស់</a>
                    </nav>
                </div>

                <a class="font-semibold nav-link {{ Request::is('admin/users') ? 'active':'' }}" href="{{ url('admin/users') }}">
                    <div class="sb-nav-link-icon" style="margin-top: 2px;">
                        <i class="far fa-user-circle fa-xl"></i>
                    </div>
                    អ្នកប្រើប្រាស់
                </a>
            </div>
        </div>
    </nav>
</div>
