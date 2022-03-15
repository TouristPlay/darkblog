<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <link rel="stylesheet" href="{{ asset("/css/style.css")  }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset("favicon.png") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                <a href="" class="header__logo-link">
                    DarkBlog
                </a>
            </div>
            <div class="header__burger">
                <span></span>
            </div>
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__list-item">
                        <a href="{{ route('blog.posts.index') }}" class="header__item-link">
                            Blog
                        </a>
                    </li>
                    <li class="header__list-item">
                        <a href="{{ route('shop.product.index') }}" class="header__item-link">
                            Shop
                        </a>
                    </li>
                    <li class="header__list-item">
                        <a href="{{ route('forum.topic.index') }}" class="header__item-link">
                            Forum
                        </a>
                    </li>
                    <li class="header__list-item">
                        <a href="{{ route('profile.index', Auth::user()->nickname) }}" class="header__item-link">
                            {{ strip_tags(Auth::user()->nickname) }}
                        </a>
                    </li>
                    <li class="header__list-item" title="Logout">
                        <a href="{{ route('logout') }}" class="header__item-link-logout">
                            <img src="https://img.icons8.com/ios/50/ffffff/exit.png"/>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@yield('content')

<footer class="footer">
    <div class="container">
        <div class="footer__menu">
            <ul class="footer__list">
                <li class="footer__list-item" data-menuItem="1">
                    <a href="{{ route('blog.posts.index') }}" class="footer__item-link">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="20" height="20"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff9900"><path d="M33.755,6.88c-1.63937,0.30906 -2.82187,1.76031 -2.795,3.44v51.6h-17.2v6.88h-13.76v20.64h13.76v58.48c0,9.46 7.74,17.2 17.2,17.2h110.08c9.46,0 17.2,-7.74 17.2,-17.2v-58.48h13.76v-20.64h-13.76v-6.88h-17.2v-51.6c0,-1.89469 -1.54531,-3.44 -3.44,-3.44h-103.2c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM37.84,13.76h96.32v48.16h-29.24c-6.61125,0 -12.04,5.42875 -12.04,12.04c0,6.61125 5.42875,12.04 12.04,12.04h8.6c1.94844,0 3.44,1.49156 3.44,3.44c0,1.94844 -1.49156,3.44 -3.44,3.44h-55.04c-1.94844,0 -3.44,-1.49156 -3.44,-3.44c0,-1.94844 1.49156,-3.44 3.44,-3.44h8.6c6.61125,0 12.04,-5.42875 12.04,-12.04c0,-6.61125 -5.42875,-12.04 -12.04,-12.04h-29.025c-0.06719,0 -0.14781,0 -0.215,0zM54.395,27.52c-1.89469,0.17469 -3.29219,1.86781 -3.1175,3.7625c0.17469,1.89469 1.86781,3.29219 3.7625,3.1175h61.92c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-61.92c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM54.395,41.28c-1.89469,0.17469 -3.29219,1.86781 -3.1175,3.7625c0.17469,1.89469 1.86781,3.29219 3.7625,3.1175h44.72c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-44.72c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM20.64,68.8h46.44c2.88906,0 5.16,2.27094 5.16,5.16c0,2.88906 -2.27094,5.16 -5.16,5.16h-8.6c-5.65719,0 -10.32,4.66281 -10.32,10.32c0,5.65719 4.66281,10.32 10.32,10.32h55.04c5.65719,0 10.32,-4.66281 10.32,-10.32c0,-5.65719 -4.66281,-10.32 -10.32,-10.32h-8.6c-2.88906,0 -5.16,-2.27094 -5.16,-5.16c0,-2.88906 2.27094,-5.16 5.16,-5.16h46.44v79.12c0,5.73781 -4.58219,10.32 -10.32,10.32h-110.08c-5.73781,0 -10.32,-4.58219 -10.32,-10.32zM6.88,75.68h6.88v6.88h-6.88zM158.24,75.68h6.88v6.88h-6.88zM37.84,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM51.6,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM65.36,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM79.12,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM92.88,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM106.64,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM120.4,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM134.16,113.52c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM44.72,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM58.48,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM86,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM99.76,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM113.52,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM127.28,127.28c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM55.04,141.04c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44h61.92c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44z"></path></g></g></svg>
                        <img src="https://img.icons8.com/ios/20/ffffff/blog.png"/>
                        <span class="footer__link-text">
                            Blog
                        </span>
                    </a>
                </li>
                <li class="footer__list-item" data-menuItem="2">
                    <a href="{{ route('shop.product.index') }}" class="footer__item-link">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="20" height="20"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff9900"><path d="M28.66667,21.5v14.33333h114.66667v-14.33333zM28.66667,50.16667l-14.33333,43v14.33333h7.16667v43h71.66667v-43h43v43h14.33333v-43h7.16667v-14.33333l-14.33333,-43zM35.83333,107.5h43v28.66667h-43z"></path></g></g></svg>
                        <img src="https://img.icons8.com/material-rounded/20/ffffff/shop.png"/>
                        <span class="footer__link-text">
                            Shop
                        </span>
                    </a>
                </li>
                <li class="footer__list-item" data-menuItem="3">
                    <a href="{{ route('forum.topic.index') }}" class="footer__item-link">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="20" height="20"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff9900"><path d="M33.64974,20.35781c-9.05876,0 -16.44974,7.38958 -16.44974,16.50573v46.49375c0,9.05877 7.39097,16.46094 16.44974,16.46094h4.8151v11.98177c0,3.43986 2.00898,6.53118 5.16224,7.84974c3.23671,1.36309 6.81542,0.65042 9.29427,-1.65729l18.85729,-18.17422h22.65339c9.05876,0 16.44974,-7.40217 16.44974,-16.46094v-46.49375c0,-9.11615 -7.39098,-16.50573 -16.44974,-16.50573zM41.10755,53.08932c3.95601,0 7.16667,3.21065 7.16667,7.16667c0,3.95601 -3.21065,7.16667 -7.16667,7.16667c-3.95601,0 -7.16667,-3.21066 -7.16667,-7.16667c0,-3.95602 3.21065,-7.16667 7.16667,-7.16667zM64.04089,53.08932c3.95601,0 7.16667,3.21065 7.16667,7.16667c0,3.95601 -3.21066,7.16667 -7.16667,7.16667c-3.95602,0 -7.16667,-3.21066 -7.16667,-7.16667c0,-3.95602 3.21065,-7.16667 7.16667,-7.16667zM86.97422,53.08932c3.95601,0 7.16667,3.21065 7.16667,7.16667c0,3.95601 -3.21066,7.16667 -7.16667,7.16667c-3.95602,0 -7.16667,-3.21066 -7.16667,-7.16667c0,-3.95602 3.21065,-7.16667 7.16667,-7.16667zM122.34844,70.28933v24.53463c0,9.05877 -7.39098,16.46094 -16.44974,16.46094h-27.52448v9.92136c0,7.85464 6.36672,14.21016 14.22136,14.21016h17.36797c13.26662,11.91912 14.55441,16.22578 20.06667,16.22578c4.52488,0 7.97292,-3.62821 7.97291,-7.96172v-8.26406h2.51954c7.85464,-0.00001 14.27734,-6.35552 14.27734,-14.21016v-36.69558c0,-7.85464 -6.4227,-14.22135 -14.27734,-14.22135z"></path></g></g></svg>
                        <img src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/20/ffffff/external-forum-shopping-and-commerce-smashingstocks-glyph-smashing-stocks.png"/>
                        <span class="footer__link-text">
                            Forum
                        </span>
                    </a>
                </li>
                <li class="footer__list-item" data-menuItem="4">
                    <a href="{{ route('profile.index', Auth::getUser()->nickname) }}" class="footer__item-link">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="20" height="20"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff9900"><path d="M80.625,10.75c-38.50683,0 -69.875,31.36817 -69.875,69.875c0,38.50683 31.36817,69.875 69.875,69.875c38.50683,0 69.875,-31.36817 69.875,-69.875c0,-38.50683 -31.36817,-69.875 -69.875,-69.875zM80.625,21.5c32.71192,0 59.125,26.41308 59.125,59.125c0,14.40332 -5.12304,27.54688 -13.60547,37.79297c-4.61914,-13.10156 -14.61328,-23.6416 -27.37891,-28.84864c5.33301,-4.91308 8.73438,-11.92578 8.73438,-19.69433c0,-14.78125 -12.09375,-26.875 -26.875,-26.875c-14.78125,0 -26.875,12.09375 -26.875,26.875c0,7.76855 3.40136,14.78125 8.73438,19.69433c-12.76562,5.20703 -22.71777,15.74707 -27.33692,28.84864c-8.52441,-10.24609 -13.64746,-23.38965 -13.64746,-37.79297c0,-32.71192 26.41308,-59.125 59.125,-59.125zM80.625,53.75c8.98633,0 16.125,7.13868 16.125,16.125c0,8.98633 -7.13867,16.125 -16.125,16.125c-8.98632,0 -16.125,-7.13867 -16.125,-16.125c0,-8.98632 7.13868,-16.125 16.125,-16.125zM80.625,96.75c18.2666,0 33.25781,12.97558 36.74317,30.19239c-10.12011,8.02051 -22.84375,12.80761 -36.74317,12.80761c-13.89942,0 -26.62304,-4.7871 -36.70117,-12.80761c3.44335,-17.2168 18.43456,-30.19239 36.70117,-30.19239z"></path></g></g></svg>
                        <img src="https://img.icons8.com/small/20/ffffff/user-male-circle.png"/>
                        <span class="footer__link-text">
                           Profile
                        </span>
                    </a>
                </li>
                <li class="footer__list-item" >
                    <a href="{{ route('logout') }}" class="footer__item-link">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="20" height="20"
                             viewBox="0 0 172 172"
                             style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ff9900"><path d="M81.53878,0.00072c-0.19054,-0.0048 -0.38324,0.01341 -0.57569,0.05743l-72.65294,14.7066c-1.19959,0.24293 -2.06228,1.29642 -2.06228,2.51953v137.34173c0,1.22311 0.86269,2.2766 2.06228,2.51953l72.65294,14.7066c0.16979,0.03455 3.08447,1.00575 3.08374,-2.52025v-149.47639h42.64612v42.61884c0,1.4201 1.15181,2.57121 2.57265,2.57122c1.42084,0 2.57265,-1.15111 2.57265,-2.57122v-45.19005c-0.00037,-1.41974 -1.15253,-2.57121 -2.57337,-2.57121h-45.21877v-12.13538c0.03377,-1.37958 -1.17357,-2.54337 -2.50733,-2.57696zM78.90081,5.7217v160.46615l-67.50693,-13.66433v-133.13605zM142.51646,62.80237c-1.35722,-0.01475 -2.73064,1.0387 -2.6796,2.56332v7.3935h-34.19026c-1.42084,0 -2.57265,1.15111 -2.57265,2.57121v21.24948c0,1.4201 1.15181,2.57121 2.57265,2.57121h34.19026v7.39278c0.84052,3.32938 3.89232,2.31346 4.3837,1.82612l20.77573,-20.57115c1.00701,-0.95776 1.00771,-2.6923 0.00144,-3.65153l-20.77573,-20.60632c-0.47525,-0.50442 -1.08861,-0.73193 -1.70553,-0.73863zM58.39426,65.73823c-1.42084,0 -2.57265,1.15111 -2.57265,2.57121v21.4031c0,1.4201 1.15181,2.57122 2.57265,2.57122c1.42121,0 2.57302,-1.15111 2.57265,-2.57122v-21.4031c0,-1.4201 -1.15181,-2.57121 -2.57265,-2.57121zM144.98216,71.54033l14.5494,14.43096l-14.5494,14.40583v-3.79724c0,-1.4201 -1.15181,-2.57121 -2.57265,-2.57121h-34.19026v-16.10706h34.19026c1.42084,0 2.57265,-1.15111 2.57265,-2.57121zM58.39426,97.42546c-1.42084,0 -2.57265,1.15039 -2.57265,2.5705v3.60487c0,1.42011 1.15181,2.57122 2.57265,2.57122c1.42121,0 2.57302,-1.15075 2.57265,-2.57122v-3.60487c0,-1.4201 -1.15181,-2.5705 -2.57265,-2.5705zM129.26487,106.12969c-1.42084,0 -2.57265,1.15111 -2.57265,2.57122v43.3869l-18.75435,-0.0122h-0.00215c-1.4201,0 -2.57155,1.14969 -2.57265,2.56906c-0.0011,1.4201 1.15074,2.57227 2.57121,2.57337l21.32916,0.01364h0.00143c1.38151,0.0272 2.60021,-1.18897 2.57265,-2.57122v-45.95955c0,-1.4201 -1.15181,-2.57122 -2.57265,-2.57122zM95.62734,151.35492c-1.82681,0 -3.30774,1.4801 -3.30774,3.3059c0,1.8258 1.48092,3.3059 3.30774,3.3059c1.82681,0 3.30774,-1.4801 3.30774,-3.3059c0,-1.8258 -1.48092,-3.3059 -3.30774,-3.3059z"></path></g></g></svg>
                        <img src="https://img.icons8.com/external-sbts2018-outline-sbts2018/20/ffffff/external-logout-social-media-sbts2018-outline-sbts2018.png"/>
                        <span class="footer__link-text">
                            Log out
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
