<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>


    <style>
        .selectColor{
            background-color: #17C1E8;
        }
   
    </style>


</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2"  src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2"  src="{{asset('images/logo.png')}}" alt="logo"/>
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                <span class="user_name"></span>
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <hr class="user-dropdown-divider  p-0"/>
                    </div>
                    <a href="{{url('/userProfile')}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <a href="{{url("/logout")}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sideNavRef" class="side-nav-open">

    <a href="{{url("/dashboard")}}" class="{{ request()->routeIs('dashboard') ? 'selectColor' : '' }} mt-3 side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>
    
    <a href="{{url('/salePage')}}" class="{{ request()->routeIs('salePage') ? 'selectColor' : '' }} side-bar-item">
        <i class="bi bi-currency-dollar"></i>
        <span class="side-bar-item-caption">Create Sale</span>
    </a>

    <a href="{{url("/customerPage")}}" class="{{ request()->routeIs('customerPage') ? 'selectColor' : '' }} side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Customer</span>
    </a>

    <a href="{{url("/categoryPage")}}" class="{{ request()->routeIs('categoryPage') ? 'selectColor' : '' }} side-bar-item">
        <i class="bi bi-list-nested"></i>
        <span class="side-bar-item-caption">Category</span>
    </a>

    <a href="{{url("/productPage")}}" class="{{ request()->routeIs('productPage') ? 'selectColor' : '' }} side-bar-item">
        <i class="bi bi-bag"></i>
        <span class="side-bar-item-caption">Product</span>
    </a>

    <a href="{{url('/invoicePage')}}" class="{{ request()->routeIs('invoicePage') ? 'selectColor' : '' }} side-bar-item">
        <i class="bi bi-receipt"></i>
        <span class="side-bar-item-caption">Invoice</span>
    </a>

    <a href="{{url('/reportPage')}}" class="{{ request()->routeIs('reportPage') ? 'selectColor' : '' }} side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Report</span>
    </a>

    <a href="{{url('/userProfile')}}" class="{{ request()->routeIs('userProfile') ? 'selectColor' : '' }} side-bar-item">
        <i class="fas fa-user"></i>
        <span class="side-bar-item-caption">Profile</span>
    </a>

    
    <a href="{{url("/logout")}}" class="side-bar-item">
        <i class="fas fa-sign-out-alt text-danger"></i>
        <span class="side-bar-item-caption text-danger">Logout</span>
    </a>

</div>


<div id="contentRef" class="content">
    @yield('content')
</div>



<script>
    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }

    getProfile()

    async function getProfile(){

        let res=await axios.get("/user-profile")

        if(res.status===200 && res.data['status']==='success'){
            let data=res.data['data'];
            document.querySelector('.user_name').innerHTML=data['firstName'];

        }
        else{
            errorToast(res.data['message'])
        }

    }
</script>

</body>
</html>
