<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Aryaddinata | Profile</title>
</head>

<body>
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <a href="#" class="nav__logo">AGIL ARYADDINATA ABBAS</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active">HOME</li>
                    <li class="nav__item"><a href="#about" class="nav__link">ABOUT</a></li>
                    <li class="nav__item"><a href="#skills" class="nav__link">SKILLS</a></li>
                    <li class="nav__item"><a href="#portfolio" class="nav__link">PORTOFOLIO</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">CONTACT</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home" id="home">
            <div class="home__container bd-grid">
                <h1 class="home__title"><span>HE</span><br>LLO.</h1>

                <div class="home__scroll">
                    <a href="#portfolio" class="home__scroll-link"><i class='bx bx-up-arrow-alt'></i>MY PORTOFOLIO</a>
                </div>

                <div class="home__img">
                    <img src="{{ asset('img/shape.png') }}" class="shape">
                    <img src="{{ asset('img/IMG.png') }}" class="boy">
                </div>
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section" id="about">
            <h2 class="section-title">About</h2>
            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="{{ asset('img/IMG.png') }}">
                </div>
                <div>
                    <h2 class="about__subtitle">I'AM </h2>
                    <span class="about__profession">Beginner WEB Developer </span>
                    <p class="about__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem, itaque!
                        Quibusdam eligendi doloribus asperiores doloremque molestias porro odio eum obcaecati. Sint nisi
                        suscipit temporibus ad beatae dolores alias quisquam enim!</p>

                    <div class="about__sosial">
                        <a href="#" class="about__sosial-icon"><i class="bx bxl-linkedin"></i></a>
                        <a href="#" class="about__sosial-icon"><i class="bx bxl-youtube"></i></a>
                        <a href="https://github.com/aryddntaabbss" class="about__sosial-icon"><i
                                class="bx bxl-github"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Skills</h2>

            <div class="skills__container bd-grid">
                <div class="skill__box">
                    <h3 class="skills__subtitle">Development</h3>
                    <span class="skills__name">HTML</span>
                    <span class="skills__name">CSS</span>
                    <span class="skills__name">JavaScipt</span>
                    <span class="skills__name">PHP</span>

                    <h3 class="skills__subtitle">Framework</h3>
                    <span class="skills__name">Laravel 8</span>
                    <span class="skills__name">Codeigniter 3</span>

                    <h3 class="skills__subtitle">Design</h3>
                    <span class="skills__name">Figma</span>
                    <span class="skills__name">Canva</span>
                </div>
                <div class="skills__img">
                    <img src="{{ asset('img/IMG1.jpg') }}" alt="">
                </div>
            </div>
        </section>

        <!--===== PORTFOLIO =====-->
        <section class="portofolio section" id="portfolio">
            <h2 class="section-title">Portofolio</h2>

            <div class="portofolio__container bd-grid">
                <div class="portofolio__img">
                    <img src="{{ asset('img/Portofolio1.jpg') }}" alt="">
                    <div class="portofolio__link">
                        <a href="#" class="portofolio__link-name">WEBSITE KELURAHAN</a>
                    </div>
                </div>
{{-- 
                <div class="portofolio__img">
                    <img src="{{ asset('img/IMG.png') }}" alt="">
                    <div class="portofolio__link">
                        <a href="#" class="portofolio__link-name">#</a>
                    </div>
                </div>

                <div class="portofolio__img">
                    <img src="{{ asset('img/IMG.png') }}" alt="">
                    <div class="portofolio__link">
                        <a href="#" class="portofolio__link-name">#</a>
                    </div>
                </div>

                <div class="portofolio__img">
                    <img src="{{ asset('img/IMG.png') }}" alt="">
                    <div class="portofolio__link">
                        <a href="#" class="portofolio__link-name">#</a>
                    </div>
                </div>

                <div class="portofolio__img">
                    <img src="{{ asset('img/IMG.png') }}" alt="">
                    <div class="portofolio__link">
                        <a href="#" class="portofolio__link-name">#</a>
                    </div>
                </div>

                <div class="portofolio__img">
                    <img src="{{ asset('img/IMG.png') }}" alt="">
                    <div class="portofolio__link">
                        <a href="#" class="portofolio__link-name">#</a>
                    </div>
                </div> --}}
            </div>
        </section>
        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact__container bd-grid">
                <div class="contact__info">
                    <h3 class="contact__subtitle">Email</h3>
                    <span class="contact__text">aryadinataabbas017@gmail.com</span>

                    <h3 class="contact__subtitle">Phone</h3>
                    <span class="contact__text">+628 2189336383</span>

                    <h3 class="contact__subtitle">Address</h3>
                    <span class="contact__text">Ternate, Maluku Utara</span>
                </div>

                <form action="" class="contact__form">
                    <div class="contact__inputs">
                        <input type="text" placeholder="Name" class="contact__input">
                        <input type="main" placeholder="Email" class="contact__input">
                    </div>

                    <textarea name="" id="" cols="0" rows="10" class="contact__input"></textarea>

                    <input type="submit" value="submit" class="contact__button">
                </form>
            </div>
        </section>
    </main>
    <!--===== FOOTER =====-->
    <footer class="footer section">
        <div class="footer__container bd-grid">
            <div class="footer__data">
                <h2 class="footer__title">@Aryddnta</h2>
                <p class="footer__text">I AM Beginner WEB Developer</p>
            </div>

            <div class="footer__data">
                <h2 class="footer__title">Explore</h2>
                <ul>
                    <li><a href="#home" class="footer__link">Home</a></li>
                    <li><a href="#about" class="footer__link">About</a></li>
                    <li><a href="#skills" class="footer__link">Skills</a></li>
                    <li><a href="#portfolio" class="footer__link">Portofolio</a></li>
                    <li><a href="#contact" class="footer__link">Contact</a></li>
                </ul>
            </div>

            <div class="footer__data">
                <h2 class="footer__title">Follow</h2>
                <a href="https://www.facebook.com/Aryaddinata1705?mibextid=ZbWKwL" class="footer__social"><i
                        class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/aryddntaabbss17_" class="footer__social"><i
                        class="bx bxl-instagram"></i></a>
                <a href="https://www.twitter.com/Aryddntaaa?t=z9o4S0f1AQKkt0SePSmhcw&s=09" class="footer__social"><i
                        class="bx bxl-twitter"></i></a>
                <a href="https://github.com/aryddntaabbss" class="footer__social"><i class="bx bxl-github"></i></a>
            </div>
        </div>
    </footer>
    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!--===== MAIN JS =====-->
    <script src="{{ asset('JavaScript/main.js') }}"></script>
</body>

</html>
