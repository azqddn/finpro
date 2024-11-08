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
                <svg width="180" height="auto" viewBox="0 0 739 153" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M166.503 55.0909V68.017H124.585V55.0909H166.503ZM135.065 126V48.397C135.065 43.6267 136.049 39.6565 138.019 36.4865C140.02 33.3165 142.697 30.9467 146.052 29.3771C149.406 27.8075 153.13 27.0227 157.224 27.0227C160.117 27.0227 162.687 27.2535 164.933 27.7152C167.18 28.1768 168.842 28.5923 169.919 28.9616L166.595 41.8878C165.887 41.6723 164.995 41.4569 163.918 41.2415C162.84 40.9953 161.64 40.8722 160.317 40.8722C157.208 40.8722 155.008 41.6262 153.715 43.1342C152.453 44.6115 151.822 46.7351 151.822 49.505V126H135.065ZM179.591 126V55.0909H196.302V126H179.591ZM187.993 45.027C185.346 45.027 183.068 44.1499 181.16 42.3956C179.252 40.6106 178.298 38.4716 178.298 35.9787C178.298 33.455 179.252 31.316 181.16 29.5618C183.068 27.7767 185.346 26.8842 187.993 26.8842C190.67 26.8842 192.948 27.7767 194.825 29.5618C196.733 31.316 197.687 33.455 197.687 35.9787C197.687 38.4716 196.733 40.6106 194.825 42.3956C192.948 44.1499 190.67 45.027 187.993 45.027ZM230.199 84.4517V126H213.487V55.0909H229.46V67.1399H230.291C231.922 63.1697 234.523 60.0151 238.093 57.6761C241.694 55.3371 246.141 54.1676 251.434 54.1676C256.328 54.1676 260.59 55.214 264.222 57.3068C267.885 59.3996 270.716 62.4311 272.716 66.4013C274.748 70.3714 275.748 75.188 275.717 80.8508V126H259.006V83.4361C259.006 78.6965 257.774 74.9879 255.312 72.3104C252.881 69.6328 249.511 68.294 245.202 68.294C242.278 68.294 239.678 68.9403 237.4 70.233C235.154 71.4948 233.384 73.326 232.091 75.7266C230.83 78.1271 230.199 81.0355 230.199 84.4517ZM313.111 127.431C308.617 127.431 304.57 126.631 300.969 125.031C297.399 123.399 294.568 120.999 292.475 117.829C290.413 114.659 289.382 110.75 289.382 106.103C289.382 102.102 290.121 98.7936 291.598 96.1776C293.075 93.5616 295.091 91.4688 297.645 89.8991C300.2 88.3295 303.077 87.1446 306.278 86.3445C309.51 85.5135 312.849 84.9134 316.296 84.544C320.451 84.1132 323.821 83.7285 326.406 83.3899C328.991 83.0206 330.869 82.4666 332.038 81.728C333.238 80.9586 333.839 79.7737 333.839 78.1733V77.8963C333.839 74.4186 332.808 71.7256 330.746 69.8175C328.684 67.9093 325.714 66.9553 321.836 66.9553C317.742 66.9553 314.496 67.8478 312.095 69.6328C309.725 71.4178 308.125 73.526 307.294 75.9574L291.69 73.7415C292.921 69.4328 294.952 65.8319 297.784 62.9389C300.615 60.0151 304.078 57.83 308.171 56.3835C312.264 54.9062 316.788 54.1676 321.743 54.1676C325.16 54.1676 328.56 54.5677 331.946 55.3679C335.331 56.1681 338.424 57.4915 341.225 59.3381C344.026 61.1539 346.272 63.6314 347.965 66.7706C349.689 69.9098 350.55 73.8338 350.55 78.5426V126H334.485V116.259H333.931C332.915 118.229 331.484 120.076 329.638 121.799C327.822 123.492 325.529 124.861 322.759 125.908C320.02 126.923 316.804 127.431 313.111 127.431ZM317.45 115.151C320.805 115.151 323.713 114.49 326.175 113.166C328.637 111.812 330.53 110.027 331.854 107.811C333.208 105.595 333.885 103.179 333.885 100.563V92.2074C333.362 92.6383 332.469 93.0384 331.207 93.4077C329.976 93.777 328.591 94.1001 327.052 94.3771C325.514 94.6541 323.99 94.9003 322.482 95.1158C320.974 95.3312 319.666 95.5159 318.558 95.6697C316.065 96.0083 313.834 96.5623 311.864 97.3317C309.894 98.1011 308.34 99.1783 307.202 100.563C306.063 101.917 305.493 103.672 305.493 105.826C305.493 108.904 306.617 111.227 308.863 112.797C311.11 114.366 313.972 115.151 317.45 115.151ZM384.066 84.4517V126H367.354V55.0909H383.327V67.1399H384.158C385.789 63.1697 388.39 60.0151 391.96 57.6761C395.561 55.3371 400.008 54.1676 405.302 54.1676C410.195 54.1676 414.458 55.214 418.089 57.3068C421.752 59.3996 424.583 62.4311 426.584 66.4013C428.615 70.3714 429.615 75.188 429.584 80.8508V126H412.873V83.4361C412.873 78.6965 411.642 74.9879 409.18 72.3104C406.748 69.6328 403.378 68.294 399.069 68.294C396.146 68.294 393.545 68.9403 391.268 70.233C389.021 71.4948 387.251 73.326 385.959 75.7266C384.697 78.1271 384.066 81.0355 384.066 84.4517ZM446.573 152.591V55.0909H463.008V66.8168H463.977C464.839 65.0933 466.055 63.2621 467.624 61.3232C469.194 59.3535 471.317 57.6761 473.995 56.2912C476.672 54.8755 480.089 54.1676 484.243 54.1676C489.722 54.1676 494.661 55.5679 499.062 58.3686C503.494 61.1385 507.003 65.2472 509.588 70.6946C512.204 76.1113 513.512 82.759 513.512 90.6378C513.512 98.4242 512.235 105.041 509.68 110.489C507.126 115.936 503.648 120.091 499.247 122.953C494.846 125.815 489.86 127.246 484.29 127.246C480.227 127.246 476.857 126.569 474.18 125.215C471.502 123.861 469.348 122.23 467.716 120.322C466.116 118.383 464.87 116.552 463.977 114.828H463.285V152.591H446.573ZM462.961 90.5455C462.961 95.1312 463.608 99.1475 464.9 102.594C466.224 106.041 468.117 108.734 470.579 110.673C473.072 112.581 476.088 113.536 479.627 113.536C483.32 113.536 486.413 112.551 488.906 110.581C491.399 108.58 493.276 105.857 494.538 102.41C495.831 98.9321 496.477 94.9773 496.477 90.5455C496.477 86.1444 495.846 82.2358 494.584 78.8196C493.323 75.4034 491.445 72.7259 488.952 70.7869C486.459 68.848 483.351 67.8785 479.627 67.8785C476.057 67.8785 473.025 68.8172 470.532 70.6946C468.04 72.572 466.147 75.2034 464.854 78.5888C463.592 81.9742 462.961 85.9598 462.961 90.5455ZM527.823 126V55.0909H544.027V66.9091H544.765C546.058 62.8158 548.274 59.6612 551.413 57.4453C554.583 55.1986 558.199 54.0753 562.262 54.0753C563.185 54.0753 564.216 54.1214 565.355 54.2138C566.524 54.2753 567.494 54.383 568.263 54.5369V69.9098C567.555 69.6636 566.432 69.4482 564.893 69.2635C563.385 69.0481 561.923 68.9403 560.508 68.9403C557.461 68.9403 554.722 69.602 552.29 70.9254C549.89 72.218 547.997 74.0185 546.612 76.3267C545.227 78.6349 544.535 81.2971 544.535 84.3132V126H527.823ZM607.376 127.385C600.452 127.385 594.45 125.862 589.372 122.815C584.294 119.768 580.355 115.505 577.554 110.027C574.784 104.549 573.399 98.1473 573.399 90.8224C573.399 83.4976 574.784 77.0807 577.554 71.5717C580.355 66.0627 584.294 61.7848 589.372 58.7379C594.45 55.6911 600.452 54.1676 607.376 54.1676C614.301 54.1676 620.303 55.6911 625.381 58.7379C630.459 61.7848 634.383 66.0627 637.153 71.5717C639.953 77.0807 641.354 83.4976 641.354 90.8224C641.354 98.1473 639.953 104.549 637.153 110.027C634.383 115.505 630.459 119.768 625.381 122.815C620.303 125.862 614.301 127.385 607.376 127.385ZM607.469 113.997C611.223 113.997 614.363 112.966 616.886 110.904C619.41 108.811 621.287 106.011 622.518 102.502C623.78 98.9936 624.411 95.085 624.411 90.7763C624.411 86.4368 623.78 82.5128 622.518 79.0043C621.287 75.465 619.41 72.6489 616.886 70.5561C614.363 68.4633 611.223 67.4169 607.469 67.4169C603.622 67.4169 600.421 68.4633 597.866 70.5561C595.343 72.6489 593.45 75.465 592.188 79.0043C590.957 82.5128 590.342 86.4368 590.342 90.7763C590.342 95.085 590.957 98.9936 592.188 102.502C593.45 106.011 595.343 108.811 597.866 110.904C600.421 112.966 603.622 113.997 607.469 113.997ZM683.421 120.414V56.522H697.917V120.414H683.421ZM658.723 95.7159V81.2202H722.615V95.7159H658.723Z" fill="white"/>
                    <path d="M0.644669 77.0208L12.6655 65L60.0416 112.376L48.0208 124.397L0.644669 77.0208Z" fill="white"/>
                    <path d="M0.644669 77.0208L48.0208 29.6447L60.0416 41.6655L12.6654 89.0416L0.644669 77.0208Z" fill="white"/>
                    <path d="M35.9999 41.6654L48.0208 29.6447L95.3969 77.0207L83.376 89.0416L35.9999 41.6654Z" fill="white"/>
                    <path d="M35.9999 112.376L83.376 64.9998L95.3969 77.0207L48.0208 124.397L35.9999 112.376Z" fill="white"/>
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
                <li id="menu-list" style="margin-bottom: 10px">
                    <a href="#" class="nav-link link-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM4 8.23607V9H20V8.23607L12 4.23607L4 8.23607ZM12 8C11.4477 8 11 7.55228 11 7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7C13 7.55228 12.5523 8 12 8Z">
                            </path>
                        </svg>
                        <span id="menu">Budget</span>
                    </a>
                </li>
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
