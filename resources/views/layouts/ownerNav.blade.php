<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Icon --}}
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="" style="background-color: #e6e6e6ec">
    <div style="width: 15%; height:100vh; position:fixed;">
        <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3"
            style="width:100%; height:100%; background-color:rgba(21, 36, 255, 0.959); border-radius:5px">
            <a href="{{ route('owner.home') }}" style="width: 100%; height:50px">
                <svg width="140" height="auto" viewBox="0 0 494 153" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M166.503 55.0909V68.017H124.585V55.0909H166.503ZM135.065 126V48.397C135.065 43.6267 136.049 39.6565 138.019 36.4865C140.02 33.3165 142.697 30.9467 146.052 29.3771C149.406 27.8075 153.13 27.0227 157.224 27.0227C160.117 27.0227 162.687 27.2535 164.933 27.7152C167.18 28.1768 168.842 28.5923 169.919 28.9616L166.595 41.8878C165.887 41.6723 164.995 41.4569 163.918 41.2415C162.84 40.9953 161.64 40.8722 160.317 40.8722C157.208 40.8722 155.008 41.6262 153.715 43.1342C152.453 44.6115 151.822 46.7351 151.822 49.505V126H135.065ZM179.591 126V55.0909H196.302V126H179.591ZM187.993 45.027C185.346 45.027 183.068 44.1499 181.16 42.3956C179.252 40.6106 178.298 38.4716 178.298 35.9787C178.298 33.455 179.252 31.316 181.16 29.5618C183.068 27.7767 185.346 26.8842 187.993 26.8842C190.67 26.8842 192.948 27.7767 194.825 29.5618C196.733 31.316 197.687 33.455 197.687 35.9787C197.687 38.4716 196.733 40.6106 194.825 42.3956C192.948 44.1499 190.67 45.027 187.993 45.027ZM230.199 84.4517V126H213.487V55.0909H229.46V67.1399H230.291C231.922 63.1697 234.523 60.0151 238.093 57.6761C241.694 55.3371 246.141 54.1676 251.434 54.1676C256.328 54.1676 260.59 55.214 264.222 57.3068C267.885 59.3996 270.716 62.4311 272.716 66.4013C274.748 70.3714 275.748 75.188 275.717 80.8508V126H259.006V83.4361C259.006 78.6965 257.774 74.9879 255.312 72.3104C252.881 69.6328 249.511 68.294 245.202 68.294C242.278 68.294 239.678 68.9403 237.4 70.233C235.154 71.4948 233.384 73.326 232.091 75.7266C230.83 78.1271 230.199 81.0355 230.199 84.4517ZM292.706 152.591V55.0909H309.14V66.8168H310.11C310.972 65.0933 312.187 63.2621 313.757 61.3232C315.327 59.3535 317.45 57.6761 320.128 56.2912C322.805 54.8755 326.221 54.1676 330.376 54.1676C335.854 54.1676 340.794 55.5679 345.195 58.3686C349.627 61.1385 353.135 65.2472 355.721 70.6946C358.337 76.1113 359.645 82.759 359.645 90.6378C359.645 98.4242 358.367 105.041 355.813 110.489C353.259 115.936 349.781 120.091 345.38 122.953C340.979 125.815 335.993 127.246 330.422 127.246C326.36 127.246 322.99 126.569 320.312 125.215C317.635 123.861 315.48 122.23 313.849 120.322C312.249 118.383 311.002 116.552 310.11 114.828H309.417V152.591H292.706ZM309.094 90.5455C309.094 95.1312 309.741 99.1475 311.033 102.594C312.357 106.041 314.249 108.734 316.711 110.673C319.204 112.581 322.22 113.536 325.76 113.536C329.453 113.536 332.546 112.551 335.039 110.581C337.532 108.58 339.409 105.857 340.671 102.41C341.964 98.9321 342.61 94.9773 342.61 90.5455C342.61 86.1444 341.979 82.2358 340.717 78.8196C339.455 75.4034 337.578 72.7259 335.085 70.7869C332.592 68.848 329.484 67.8785 325.76 67.8785C322.19 67.8785 319.158 68.8172 316.665 70.6946C314.172 72.572 312.28 75.2034 310.987 78.5888C309.725 81.9742 309.094 85.9598 309.094 90.5455ZM373.956 126V55.0909H390.16V66.9091H390.898C392.191 62.8158 394.407 59.6612 397.546 57.4453C400.716 55.1986 404.332 54.0753 408.395 54.0753C409.318 54.0753 410.349 54.1214 411.488 54.2138C412.657 54.2753 413.627 54.383 414.396 54.5369V69.9098C413.688 69.6636 412.565 69.4482 411.026 69.2635C409.518 69.0481 408.056 68.9403 406.64 68.9403C403.594 68.9403 400.854 69.602 398.423 70.9254C396.023 72.218 394.13 74.0185 392.745 76.3267C391.36 78.6349 390.667 81.2971 390.667 84.3132V126H373.956ZM453.509 127.385C446.585 127.385 440.583 125.862 435.505 122.815C430.427 119.768 426.487 115.505 423.687 110.027C420.917 104.549 419.532 98.1473 419.532 90.8224C419.532 83.4976 420.917 77.0807 423.687 71.5717C426.487 66.0627 430.427 61.7848 435.505 58.7379C440.583 55.6911 446.585 54.1676 453.509 54.1676C460.434 54.1676 466.435 55.6911 471.513 58.7379C476.592 61.7848 480.516 66.0627 483.286 71.5717C486.086 77.0807 487.487 83.4976 487.487 90.8224C487.487 98.1473 486.086 104.549 483.286 110.027C480.516 115.505 476.592 119.768 471.513 122.815C466.435 125.862 460.434 127.385 453.509 127.385ZM453.602 113.997C457.356 113.997 460.496 112.966 463.019 110.904C465.543 108.811 467.42 106.011 468.651 102.502C469.913 98.9936 470.544 95.085 470.544 90.7763C470.544 86.4368 469.913 82.5128 468.651 79.0043C467.42 75.465 465.543 72.6489 463.019 70.5561C460.496 68.4633 457.356 67.4169 453.602 67.4169C449.754 67.4169 446.554 68.4633 443.999 70.5561C441.476 72.6489 439.583 75.465 438.321 79.0043C437.09 82.5128 436.474 86.4368 436.474 90.7763C436.474 95.085 437.09 98.9936 438.321 102.502C439.583 106.011 441.476 108.811 443.999 110.904C446.554 112.966 449.754 113.997 453.602 113.997Z" fill="white"/>
                    <path d="M0.644638 77.0208L12.6655 65L60.0416 112.376L48.0208 124.397L0.644638 77.0208Z" fill="white"/>
                    <path d="M0.644638 77.0208L48.0208 29.6447L60.0416 41.6655L12.6654 89.0416L0.644638 77.0208Z" fill="white"/>
                    <path d="M35.9998 41.6654L48.0208 29.6447L95.3968 77.0207L83.376 89.0416L35.9998 41.6654Z" fill="white"/>
                    <path d="M35.9998 112.376L83.376 64.9998L95.3968 77.0207L48.0208 124.397L35.9998 112.376Z" fill="white"/>
                    <path d="M96 90V107.772V126H61L96 90Z" fill="white"/>
                    <path d="M35 126H17.7215H3.57628e-07V91L35 126Z" fill="white"/>
                    </svg>
                    
            </a>
            <hr style="color: white">
            <br>
            <ul class="nav nav-pills flex-column mb-auto">

                {{-- Dashboard --}}
                <li id="menu-list" class="{{ request()->routeIs('owner.home') ? 'active' : '' }}"
                    style="margin-bottom: 10px">
                    <a href="{{ route('owner.home') }}" class="nav-link" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20C20 20.5523 19.5523 21 19 21ZM13 19H18V9.15745L12 3.7029L6 9.15745V19H11V13H13V19Z">
                            </path>
                        </svg>
                        <span id="menu">Dashboard</span>
                    </a>
                </li>
                {{-- Inventory --}}
                <li id="menu-list" class="{{ request()->routeIs('display.product.owner', 'add.product.owner', 'display.product.history.owner', 'display.product.alert.owner', 'display.edit.history') ? 'active' : '' }}" style="margin-bottom: 10px">
                    <a href="{{route('display.product.owner')}}" class="nav-link" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M12 1L21.5 6.5V17.5L12 23L2.5 17.5V6.5L12 1ZM5.49388 7.0777L12.0001 10.8444L18.5062 7.07774L12 3.311L5.49388 7.0777ZM4.5 8.81329V16.3469L11.0001 20.1101V12.5765L4.5 8.81329ZM13.0001 20.11L19.5 16.3469V8.81337L13.0001 12.5765V20.11Z">
                            </path>
                        </svg>
                        <span id="menu">Inventory</span>
                    </a>
                </li>
                {{-- Bookkeeping --}}
                <li id="menu-list"  class="{{ request()->routeIs('display.record.owner') ? 'active' : '' }}" style="margin-bottom: 10px">
                    <a href="{{route('display.record.owner')}}" class="nav-link link-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M9 4L6 2L3 4V19C3 20.6569 4.34315 22 6 22H20C21.6569 22 23 20.6569 23 19V16H21V4L18 2L15 4L12 2L9 4ZM19 16H7V19C7 19.5523 6.55228 20 6 20C5.44772 20 5 19.5523 5 19V5.07037L6 4.4037L9 6.4037L12 4.4037L15 6.4037L18 4.4037L19 5.07037V16ZM20 20H8.82929C8.93985 19.6872 9 19.3506 9 19V18H21V19C21 19.5523 20.5523 20 20 20Z">
                            </path>
                        </svg>
                        <span id="menu">Bookkeeping</span>
                    </a>
                </li>
                {{-- Budget --}}
                {{-- <li id="menu-list" style="margin-bottom: 10px">
                    <a href="#" class="nav-link link-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM4 8.23607V9H20V8.23607L12 4.23607L4 8.23607ZM12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C13 7.55228 12.5523 8 12 8Z">
                            </path>
                        </svg>
                        <span id="menu">Budget</span>
                    </a>
                </li> --}}
                {{-- Report --}}
                <li id="menu-list" style="margin-bottom: 10px">
                    <a href="#" class="nav-link link-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M11 7H13V17H11V7ZM15 11H17V17H15V11ZM7 13H9V17H7V13ZM15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918Z">
                            </path>
                        </svg>
                        <span id="menu">Report</span>
                    </a>
                </li>
            </ul>
            <hr style="color: white">
            <div class="dropdown">
                <a href="#" id="dropdown-toggle"
                    class="d-flex align-items-center justify-content-start  link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">

                    {{-- Photo --}}
                    <img class="me-2"
                        style="width: 35px; height:35px; border-radius:50%; border:1px solid rgb(223, 223, 223)"
                        src="{{ url('uploads/' . Auth::user()->photo) }}" alt="">

                    {{-- User's Name --}}
                    <strong
                        style="color: rgb(255, 255, 255); width:auto; height:auto">{{ Auth::user()->name }}</strong>


                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="{{ route('display.profile.owner') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('display.company.owner') }}">Company</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        #sidebar #menu-list {
            border-radius: 10px;
        }

        /* background hover colour change */
        #sidebar #menu-list:hover {
            background-color: #dbdbdb;
        }

        /* svg(icon) and text colour change */
        #sidebar #menu-list:hover #menu,
        #sidebar #menu-list:hover svg {
            color: #2b2b2b;
        }

        /* change the default text css */
        #sidebar #menu {
            font-weight: bolder;
            margin-left: 10px;
            color: #ffffff;
        }

        /* change the default svg(icon) colour */
        #sidebar svg {
            color: #ffffff;
        }

        /* Dropdown toggle color change */
        #sidebar #dropdown-toggle::after {
            border-top-color: white;
        }

        /* ACTIVE MENU */
        /* Styling for the active menu item */
        #sidebar #menu-list.active {
            background-color: #dddddd;
            /* Change this color as needed */
        }

        /* Color changes for text and SVG when active */
        #sidebar #menu-list.active #menu,
        #sidebar #menu-list.active svg {
            color: #001aff;
            /* Change this color as needed */
        }
    </style>

    @yield('content')

</body>

</html>
