<?php include( './header.php'); ?>

<div id="home">
    <nav id="home-navigation" class="container">
        <ul class="links">
            <li class="item logo">
                <a href="#">
                    <img src="<?php echo IMG; ?>/svg/logo.svg" class="logo">
                </a>
            </li>
            <li class="item shape1">
                <a href="#">
                    <span class="title">Pegue o trem</span>
                    <img src="img/svg/pegue-o-trem.svg" alt="">
                    <img src="img/svg/home-trem.svg" class="home-icon trem" />
                </a>
            </li>
            <li class="item shape2">
                <a href="#">
                    <span class="title">Sobre</span>
                    <img src="img/svg/sobre.svg" alt="">
                    <img src="img/svg/home-cadeira.svg" class="home-icon cadeira" />
                </a>
            </li>
            <li class="item shape3">
                <a href="#">
                    <span class="title">Busque um local</span>
                    <img src="img/svg/busque-um-local.svg" alt="">
                    <img src="img/svg/home-garrafa.svg" class="home-icon garrafa" />
                </a>
            </li>
            <li class="item shape4">
                <a href="#">
                    <span class="title">Adicione um local</span>
                    <img src="img/svg/adicione-um-local.svg" alt="">
                    <img src="img/svg/home-ventilador.svg" class="home-icon ventilador" />
                </a>
            </li>
            <li class="item shape5">
                <a href="javascript:Login.show();">
                    <span class="title">Login</span>
                    <img src="img/svg/login.svg" alt="">
                    <img src="img/svg/home-copo.svg" class="home-icon copo" />
                </a>
            </li>
        </ul>
        
        <ul class="images">        
            <li class="item home-img1">
                <img src="http://placehold.it/210x160" width="212"/>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="0" height="0">
                    <defs>
                        <clipPath id="svgPath1">
                            <polygon x="0" y="0" points="4.682,0 0,158.282 172.884,136.793 212.274,0 "/>
                        </clipPath>
                    </defs>
                </svg>
            </li>
            <li class="item home-img2">
                <img src="http://placehold.it/210x160" width="214" alt="">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0" height="0" xml:space="preserve">
                    <defs>
                        <clipPath id="svgPath2">
                            <polygon x="0" y="0" points="0,10.131 18,159 213,125 194,0 "/>
                        </clipPath>
                    </defs>
                </svg>
            </li>
            <li class="item home-img3">
                <img src="http://placehold.it/210x160" alt="">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0" height="0" xml:space="preserve">
                    <defs>
                        <clipPath id="svgPath3">
                            <polygon x="0" y="0" points="0,30 0,157.925 210.921,148.216 200.601,0 "/>
                        </clipPath>
                    </defs>
                </svg>
            </li>
        </ul>
    </nav>

</div>
<?php include( './footer.php'); ?>