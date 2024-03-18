@extends('layout.layout')
@section('content')

    <!-- Slider Section Start-->
        <section class="slider hidden" >
            <div class="slider-container home">
                <div id="carousel" class="carousel  slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators"></ol>
                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active">
                            <div class="carousel-background"><img src="img/slide-1.png" alt=""></div>
                            <div class="carousel-container" >
                                <div class="carousel-content">
                                    <h2 data-aos="zoom-out-down" data-aos-duration="1000">Web Development</h2>
                                    <p data-aos="zoom-out-down" data-aos-duration="1000">
                                        Elevate your online presence with our expert web development services. From 
                                            sleek designs to seamless functionality, our tech company specializes in crafting 
                                            dynamic websites tailored to your needs. Experience innovation and reliability as we 
                                            bring your vision to life on the digital frontier.
                                    </p>
                                    <a href="" class="btn-get-started" data-aos="flip-left" data-aos-duration="2000">Get Started</a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-background"><img src="img/slide-2.png" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>App Development</h2>
                                    <p>
                                        Transform your ideas into powerful digital solutions with our cutting-edge app development 
                                            services. Whether it's iOS, Android, or cross-platform, our tech company delivers tailored 
                                            applications that captivate users and drive engagement. From concept to launch, trust us to 
                                            craft intuitive and impactful mobile experiences for your business
                                    </p>
                                    <a href="" class="btn-get-started">Get Started</a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-background"><img src="img/slide-3.png" alt=""></div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2>Embedded Systems Development</h2>
                                    <p>
                                        Harness the power of embedded technology with our specialized development solutions. From 
                                            IoT devices to industrial automation, our tech company delivers robust and efficient 
                                            systems tailored to your requirements. Experience seamless integration and optimized 
                                            performance as we bring innovation to the heart of your hardware projects.
                                    </p>
                                    <a href="" class="btn-get-started">Get Started</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon ion-md-arrow-back" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon ion-md-arrow-forward" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </section>
    <!-- Slider Section End-->

    <!-- About Us Section Start-->
        <section class="about hidden" >
            <div class="container">
                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3>About Us</h3>
                    <p>
                        Stardena Tech Solutions is a dynamic portfolio tech company specializing in the 
                            development of innovative solutions across web, mobile apps, and embedded 
                            systems. Founded in January 2024 by software engineers Ogire Kenneth and 
                            Eluk Samuel Kiira, Stardena brings a wealth of expertise and passion for 
                            technology to every project.
                    </p>
                </header>

                <div class="row align-items-center about-row">
                    <div class="col-md-6" data-aos="fade-right" data-aos-duration=2000">
                        <img src="img/about.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="2000">
                        <h2 class="title">Welcome to Our Site</h2>
                        <p>
                            At Stardena, we pioneer technology to revolutionize experiences. Our 
                                adept developers specialize in crafting tailored web solutions, leveraging 
                                cutting-edge tools to captivate audiences and yield tangible results. 
                                In mobile app development, we excel in creating intuitive, feature-rich 
                                experiences across platforms, while our expertise in embedded systems 
                                ensures efficient solutions for diverse industry requirements, empowering 
                                businesses to thrive in the digital era.
                        </p>
                        {{--                    <div class="read-more">--}}
                        {{--                        <a href="#">Read More</a>--}}
                        {{--                    </div>--}}
                    </div>
                </div>

                <div class="row about-cols" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-md-4" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="about-col">
                            <div class="img">
                                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-disc"></i></div>
                            </div>
                            <h2 class="title">Our Mission</h2>
                            <p>
                                Our mission is to catalyze progress by delivering transformative tech 
                                    solutions that resonate with the spirit of Africa. Stardena commits to 
                                    pioneering user-centric experiences, ensuring accessibility and 
                                    inclusivity in every line of code we write. We embark on a journey to 
                                    bridge gaps and empower communities through cutting-edge technology.
                            </p>
                            {{--                        <div class="read-more">--}}
                            {{--                            <a href="#">Read More</a>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="about-col">
                            <div class="img">
                                <img src="img/about-vision.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-eye"></i></div>
                            </div>
                            <h2 class="title">Our Vision</h2>
                            <p>
                                In the vibrant tapestry of Africa, we envision a digital landscape 
                                    where innovation knows no bounds. Stardena's vision is to be a beacon 
                                    of technological empowerment, weaving solutions that harmonize seamlessly 
                                    with the diverse rhythms of the continent.
                            </p>
                            {{--                        <div class="read-more">--}}
                            {{--                            <a href="#">Read More</a>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>

                    <div class="col-md-4" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="about-col">
                            <div class="img">
                                <img src="img/about-objective.jpg" alt="" class="img-fluid">
                                <div class="icon"><i class="ion-ios-options"></i></div>
                            </div>
                            <h2 class="title">Our Objective</h2>
                            <p>
                                At Stardena, our objective is to redefine possibilities for Africa through 
                                    purposeful innovation. By crafting solutions that transcend boundaries, 
                                    we strive to elevate user experiences, foster sustainable growth, and 
                                    contribute to the collective advancement of the continent. Our passion for 
                                    technology aligns with the richness of Africa's potential, driving us to create solutions that inspire change and shape a brighter future.
                            </p>
                            {{--                        <div class="read-more">--}}
                            {{--                            <a href="#">Read More</a>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- About Us Section End -->

    <!-- Services Section Start -->
        <section class="services hidden">
            <div class="container">
                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3>Services</h3>
                    <p>
                        Stardena offers comprehensive tech solutions tailored to your needs, spanning 
                            web development, mobile app creation, embedded systems integration, and AI 
                            integration. With expertise and innovation, we ensure excellence and deliver 
                            impactful results for every project.
                    </p>
                </header>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-right" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-ios-desktop"></i>
                            <h4><a href="">Web Design</a></h4>
                            <p>
                                Web design involves crafting website visuals, including layout, colors, 
                                    typography, and graphics.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up-right" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-ios-laptop"></i>
                            <h4><a href="">Web Development</a></h4>
                            <p>
                                Involves building and maintaining websites and web applications using 
                                    programming languages, frameworks, and tools
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up-left" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-ios-tablet-portrait"></i>
                            <h4><a href="">App Design</a></h4>
                            <p>
                                Entails the creation of user interfaces and experiences for mobile 
                                    applications, focusing on layout, navigation, visual elements, and overall usability.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-left" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-ios-phone-portrait"></i>
                            <h4><a href="">App Development</a></h4>
                            <p>
                                Crafting software for mobile devices, involving design, 
                                coding, testing, and deployment for platforms like iOS, Android, or cross-platform solutions
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-left" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-md-nuclear"></i>
                            <h4><a href="">Embedded System Development</a></h4>
                            <p>
                                Specialized computing systems within larger electronics, encompassing hardware and 
                                    software design, programming, and testing to meet specific application needs
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-left" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-md-pulse"></i>
                            <h4><a href="">PCB Design</a></h4>
                            <p>
                                Involves creating layouts and schematics for printed circuit boards, 
                                    facilitating the connections between electronic components.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-left" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-ios-ribbon"></i>
                            <h4><a href="">UX/UI Design</a></h4>
                            <p>
                                UX/UI design focuses on creating intuitive and visually appealing interfaces 
                                    for digital products, prioritizing user experience and interface aesthetics.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-left" data-aos-duration="1000">
                        <div class="single-service">
                            <i class="ion-logo-vimeo"></i>
                            <h4><a href="">Video/Annimation</a></h4>
                            <p>
                                involves creating dynamic visual content through the combination of images, 
                                graphics, and motion effects, often used for entertainment, marketing, or 
                                educational purposes.                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Services Section End -->

    <!-- Call To Action Start -->
    <div class="call-to-action hidden">
        <div class="container text-center">
            <header class="section-header">
                <h3 data-aos="zoom-out-down" data-aos-duration="1000">Call to Action</h3>
                <p data-aos="zoom-out-down" data-aos-duration="1000">
                    If you are interested in any of the above services, kindly contact us now at +256776263482.
                </p>
            </header>
            <a class="cta-btn" data-aos="flip-left" data-aos-duration="2000" href="tel:+256776263482">Call To Action</a>
        </div>
    </div>
    <!-- Call To Action End -->

    {{--
    <!--Pricing Section start-->
    <section class="pricing">
        <div class="container">
            <header class="section-header">
                <h3>Our Pricing</h3>
               <p>
                  Nulla in est tincidunt, volutpat mi quis, gravida tortor. Suspendisse potenti. Nullam ornare, dui a vulputate mollis, est lorem ultrices neque.
              </p>
           </header>
            <div class="row">
                <div class="col-md-4">
                    <div class="price-content">
                        <div class="price-plan">
                            <p class="price-title">Silver</p>
                            <h2 class="price-amount">9.<span>99</span></h2>
                            <p class="price-date">Per Month</p>
                        </div>
                        <ul class="price-details">
                            <li><i class="ion-md-checkmark"></i><strong>HTML5</strong> and <strong>CSS3</strong></li>
                            <li><i class="ion-md-checkmark"></i><strong>Bootstrap 4</strong></li>
                            <li><i class="ion-md-checkmark"></i><strong>Well-commented</strong> code</li>
                            <li><i class="ion-md-close"></i><strong>IonIcons</strong> integrated</li>
                            <li><i class="ion-md-close"></i>Free <strong>Google Font</strong> integrated</li>
                            <li><i class="ion-md-close"></i><strong>Responsive</strong> design</li>
                        </ul>
                        <a href="#" class="btn mian-btn price-btn">Buy Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-content features-price">
                        <div class="price-plan">
                           <p class="price-title">Gold</p>
                           <h2 class="price-amount">19.<span>99</span></h2>
                           <p class="price-date">Per Month</p>
                        </div>
                       <ul class="price-details">
                           <li><i class="ion-md-checkmark"></i><strong>HTML5</strong> and <strong>CSS3</strong></li>
                           <li><i class="ion-md-checkmark"></i><strong>Bootstrap 4</strong></li>
                            <li><i class="ion-md-checkmark"></i><strong>Well-commented</strong> code</li>
                            <li><i class="ion-md-checkmark"></i><strong>IonIcons</strong> integrated</li>
                            <li><i class="ion-md-checkmark"></i>Free <strong>Google Font</strong> integrated</li>
                            <li><i class="ion-md-close"></i><strong>Responsive</strong> design</li>
                        </ul>
                        <a href="#" class="btn mian-btn price-btn features-price-btn">Buy Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-content">
                        <div class="price-plan">                 
                            <p class="price-title">Platinum</p>
                            <h2 class="price-amount">29.<span>99</span></h2>
                            <p class="price-date">Per Month</p>
                        </div>
                        <ul class="price-details">
                           <li><i class="ion-md-checkmark"></i><strong>HTML5</strong> and <strong>CSS3</strong></li>
                           <li><i class="ion-md-checkmark"></i><strong>Bootstrap 4</strong></li>
                            <li><i class="ion-md-checkmark"></i><strong>Well-commented</strong> code</li>
                            <li><i class="ion-md-checkmark"></i><strong>IonIcons</strong> integrated</li>
                            <li><i class="ion-md-checkmark"></i>Free <strong>Google Font</strong> integrated</li>
                            <li><i class="ion-md-checkmark"></i><strong>Responsive</strong> design</li>
                        </ul>
                        <a href="#" class="btn mian-btn price-btn">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Pricing Section End-->
    --}}

    <!-- Skills Section Start-->
        <section class="skills hidden">
            <div class="container">
                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3>Our Skills & Expertize</h3>
                    <p>
                        We leverage cutting-edge tools and frameworks to deliver innovative solutions 
                            tailored to our clients' needs, ensuring excellence in every project.
                    </p>
                </header>

                <div class="row">
                    <div class="skills-content col-md-6" data-aos="fade-right" data-aos-duration="1000">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">HTML <i class="val">100%</i></span>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">CSS <i class="val">95%</i></span>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">JavaScript <i class="val">90%</i></span>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">PHP <i class="val">90%</i></span>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">Java <i class="val">80%</i></span>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">C <i class="val">70%</i></span>
                            </div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                <span class="skill">Dart <i class="val">70%</i></span>
                            </div>
                        </div>

                        <div class="row counters">
                            <div class="col-lg-6 col-6 text-center">
                                <h2 data-toggle="counter-up">15</h2>
                                <p>Our Clients</p>
                            </div>

                            <div class="col-lg-6 col-6 text-center">
                                <h2 data-toggle="counter-up">20</h2>
                                <p>Completed Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="skills-content col-md-6" data-aos="fade-left" data-aos-duration="1000">
                        <ul class="skills-list">
                            <li>Laravel</li>
                            <li>Flutter</li>
                            <li>Node.js</li>
                            <li>React.js</li>
                            <li>React Native</li>
                            <li>SpringBoot, Maven, Kotlin</li>
                            <li>Adobe</li>
                            <li>Codeigniter</li>
                            <li>Arduino IDE</li>
                            <li>Tailwind</li>
                            <li>Bootstrap</li>
                            <li>Version Control (Git)</li>
                            <li>Problem Solving</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <!-- Skills Section End-->

    <!-- Ongoing Projects Section Start-->
    <section class="about hidden" >
        <div class="container">
            <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                <h3>Ongoing Projects</h3>
            </header>

            <div class="row about-cols" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="about-col">
                        <div class="img">
                            <img src="img/yorentos.png" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-ios-disc"></i></div>
                        </div>
                        <h2 class="title">YoRentos</h2>
                        <p>
                            This project aims to facilitate and easen connections between tenants and landlords in Uganda,
                                fostering a seamless and secure rental experience. We aim to bridge the gap 
                                between those seeking rental accommodations and property owners, ensuring 
                                satisfaction and trust among all parties
                        </p>
                        {{--                        <div class="read-more">--}}
                        {{--                            <a href="#">Read More</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="about-col">
                        <div class="img">
                            <img src="img/project K1.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-ios-eye"></i></div>
                        </div>
                        <h2 class="title">Project K1</h2>
                        <p>
                            Project K1 employs AI to evaluate water purity and chemical compositions, 
                                determining the safety of water for consumption. It conducts comprehensive 
                                tests for contaminants, analyzes chemical combinations, and generates 
                                user-friendly reports indicating safety levels. With real-time updates and 
                                intuitive interfaces, K1 empowers users to make informed decisions about water 
                                quality, promoting health and well-being
                        </p>
                        {{--                        <div class="read-more">--}}
                        {{--                            <a href="#">Read More</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="about-col">
                        <div class="img">
                            <img src="img/about-objective.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="ion-ios-options"></i></div>
                        </div>
                        <h2 class="title">Project K2</h2>
                        <p>
                            Not Decided yet
                        </p>
                        {{--                        <div class="read-more">--}}
                        {{--                            <a href="#">Read More</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ongoing Projects Section End -->

    {{--
    <!-- Portfolio Section Start -->
        <section class="portfolio hidden">
            <div class="container">

                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3 class="section-title">Our Portfolio</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ullamcorper pharetra ligula nec hendrerit. Ut eu libero nec magna placerat fringilla.
                    </p>
                </header>

                <div class="row" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".web-des">Web Design</li>
                            <li data-filter=".web-dev">Web Development</li>
                            <li data-filter=".app-des">App Design</li>
                            <li data-filter=".app-dev">App Development</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item web-des" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/portfolio-1.jpg" class="img-fluid" alt="Portfolio">
                                <a href="img/portfolio-1.jpg" data-lightbox="portfolio" data-title="Lorem ipsum dolor" class="link-preview" title="Preview"><i class="ion-md-eye"></i></a>
                                <a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4>Lorem ipsum dolor</h4>
                                <p>Web Design</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item web-dev" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/portfolio-2.jpg" class="img-fluid" alt="Portfolio">
                                <a href="img/portfolio-2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Nulla ullamcorper pharetra" title="Preview"><i class="ion-md-eye"></i></a>
                                <a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4>Nulla ullamcorper pharetra</h4>
                                <p>Web Development</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item app-des" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/portfolio-3.jpg" class="img-fluid" alt="Portfolio">
                                <a href="img/portfolio-3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Phasellus eget dictum" title="Preview"><i class="ion-md-eye"></i></a>
                                <a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4>Phasellus eget dictum</h4>
                                <p>App Design</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item app-dev" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/portfolio-4.jpg" class="img-fluid" alt="Portfolio">
                                <a href="img/portfolio-4.jpg" data-lightbox="portfolio" data-title="Lorem ipsum dolor" class="link-preview" title="Preview"><i class="ion-md-eye"></i></a>
                                <a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4>Donec mattis vestibulum</h4>
                                <p>App Development</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item web-des" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/portfolio-5.jpg" class="img-fluid" alt="Portfolio">
                                <a href="img/portfolio-5.jpg" class="link-preview" data-lightbox="portfolio" data-title="Nulla ullamcorper pharetra" title="Preview"><i class="ion-md-eye"></i></a>
                                <a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4>Pellentesque ullamcorper</h4>
                                <p>Web Design</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item web-dev" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="img/portfolio-6.jpg" class="img-fluid" alt="Portfolio">
                                <a href="img/portfolio-6.jpg" class="link-preview" data-lightbox="portfolio" data-title="Phasellus eget dictum" title="Preview"><i class="ion-md-eye"></i></a>
                                <a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4>Sed pretium sapien</h4>
                                <p>Web Development</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <!-- Portfolio Section End -->
    --}}

    <!-- Team Section Start -->
        <section class="team hidden">
            <div class="container">
                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3 class="section-title">Meet our team</h3>
                </header>

                <div class="row">
                    @foreach($developers as $developer)
                        <div class="col-md-3 col-sm-6 team" data-aos="flip-left" data-aos-duration="2000">
                            <div class="card card-block">
                                <img alt="" class="team-img" src="{{ asset('storage/profile-photos')}}/{{$developer->profile_photo }}">
                                <div class="card-title-wrap">
                                    <span class="card-title">{{ $developer->name }}</span> <span class="card-text">{{ $developer->staff }}</span>
                                    <div class="social-nav">
                                        <a href="mailto:{{ $developer->email }}"><i class="ion-logo-linkedin"></i></a>        
                                        <!-- <a href="https://freewebsitecode.com/"><i class="ion-logo-linkedin"></i></a>
                                        <a href="https://freewebsitecode.com/"><i class="ion-logo-instagram"></i></a>
                                        <a href="https://www.youtube.com/channel/UC9HlQRmKgG3jeVD_fBxj1Pw/videos"><i class="ion-logo-youtube"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    <!-- Team Section End -->

    {{--
    <!-- Testimonials Section Start -->
        <section class="testimonials hidden">
            <div class="container">
                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3 class="section-title">Testimonials</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ullamcorper pharetra ligula nec hendrerit. Ut eu libero nec magna placerat fringilla.
                    </p>
                </header>

                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item row align-items-center">
                        <div class="col-sm-3">
                            <div class="testimonial-img">
                                <img src="img/testimonial-1.jpg" alt="Testimonial image">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="testimonial-text">
                                <h3>Anna M. Brzezinski</h3>
                                <h4>businesswoman</h4>
                                <p>
                                    Nullam vulputate nunc diam, non congue est vestibulum ut. Curabitur placerat mauris non nisi cursus commodo. Integer dolor augue, maximus interdum pretium a, mattis ut mi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item row align-items-center">
                        <div class="col-sm-3">
                            <div class="testimonial-img">
                                <img src="img/testimonial-2.jpg" alt="Testimonial image">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="testimonial-text">
                                <h3>Shirley H. Lee</h3>
                                <h4>businesswoman</h4>
                                <p>
                                    Nullam vulputate nunc diam, non congue est vestibulum ut. Curabitur placerat mauris non nisi cursus commodo. Integer dolor augue, maximus interdum pretium a, mattis ut mi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item row align-items-center">
                        <div class="col-sm-3">
                            <div class="testimonial-img">
                                <img src="img/testimonial-3.jpg" alt="Testimonial image">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="testimonial-text">
                                <h3>Kerry E. Thomas</h3>
                                <h4>businesswoman</h4>
                                <p>
                                    Nullam vulputate nunc diam, non congue est vestibulum ut. Curabitur placerat mauris non nisi cursus commodo. Integer dolor augue, maximus interdum pretium a, mattis ut mi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Testimonials Section End -->
    --}}

    <!-- Clients Section Start -->
        <section class="clients hidden">
            <div class="container">
                <header class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3 class="section-title">Our Clients</h3>
                    <p>
                        Our clients are customers to whom we have provided services, and they have appreciated our work
                    </p>
                </header>

                <div class="owl-carousel clients-carousel">
                    <img src="img/mytreeuganda.png" alt="Client Logo">
                    <img src="img/client-4.jpg" alt="Client Logo">
                    <img src="img/thesealed.png" alt="Client Logo">
                    <img src="img/client-5.jpg" alt="Client Logo">
                    <img src="img/client-6.jpg" alt="Client Logo">
                    <img src="img/yorentos.png" alt="Client Logo">
                    <img src="img/client-7.jpg" alt="Client Logo">
                </div>

            </div>
        </section>
    <!-- Clients Section End -->

    <!-- Contact Section Start -->
        <section class="contact hidden">
            <div class="container">
                <div class="section-header" data-aos="zoom-in" data-aos-duration="2000">
                    <h3 class="section-title">Contact Us</h3>
                    <p>
                        We are just a call or text away from making your dreams come to reality
                    </p>
                </div>

                <div class="row contact-info" data-aos="zoom-in" data-aos-duration="2000"data-aos="zoom-in" data-aos-duration="2000">
                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="ion-md-pin"></i>
                            <h3>Address</h3>
                            <address>Namanve, Mukono, Uganda</address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="ion-md-call"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+123-456-789">+256 776263482</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="ion-md-mail"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:samueleluk11@gmail.com"></a>samueleluk11@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{--
                    <div class="col-md-6">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26361250.667320687!2d-113.75533773453304!3d36.24128894212527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1574923227698!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                       </div>
                    </div>
                    --}}
                    <div class="col-md-12">
                        <h4>
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </h4>
                        <div class="form">
                            <form class="contactForm" method="POST" action="{{ route('contact-us') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required ></textarea>
                                </div>
                                <div><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Contact Section End -->
@endsection
