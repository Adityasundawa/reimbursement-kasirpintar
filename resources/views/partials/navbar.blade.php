<div class="nav-header">
    <a href="index.html" class="brand-logo">


        <img class="logo-compact" src="https://kasirpintar.co.id/design_v2/images/home_v2/logokaspinoriginal_homenew.svg" alt="">
        <img class="brand-title" src="https://kasirpintar.co.id/design_v2/images/home_v2/logokaspinoriginal_homenew.svg" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Dashboard
                    </div>
                </div>
                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgF2suM5kFwk9AdFjesEr8EP1qcyUvah8G7w&usqp=CAU" width="20" alt=""/>
                            <!-- <div class="header-info">
                                <span class="text-black"><strong>Brian Lee</strong></span>
                                <p class="fs-12 mb-0">Admin</p>
                            </div> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a href="{{route('auth.logout')}}" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="deznav">
    <div class="deznav-scroll">

       @if (auth()->user()->role->name == "direktur")
       <ul class="metismenu" id="menu">
        <li><a href="{{route('direktur.dashboard')}}" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        </li>
        <li><a href="{{route('direktur.reimbursement')}}" aria-expanded="false">
            <i class="flaticon-381-notepad"></i>
            <span class="nav-text">Reimbursement</span>
        </a>
        </li>
    </ul>
       @endif

       @if (auth()->user()->role->name == "staff")
       <ul class="metismenu" id="menu">
        <li><a href="{{route('staff.dashboard')}}" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        </li>

    </ul>
       @endif

       @if (auth()->user()->role->name == "finance")
       <ul class="metismenu" id="menu">
        <li><a href="{{route('finance.dashboard')}}" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
        </a>
        </li>

    </ul>
       @endif
     
    </div>
</div>
