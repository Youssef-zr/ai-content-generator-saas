<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $siteSetting->site_title }}</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url($siteSetting->favicon) }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />

    <!-- google font roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- swiper plugin -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- custom style -->
    <link rel="stylesheet" href="{{ url('css/site.css') }}">
</head>

<body>

    <!-- start navigation -->
    <div class="navigation">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ url($setting->logo) }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">tools</a>
                            <ul class="dropdown-menu tools-dropdown">
                                @foreach ($tools as $tool)
                                    <li>
                                        <a class="dropdown-item" href="{{ url('user') }}">{{ $tool }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">use cases</a>
                            <ul class="dropdown-menu tools-dropdown">
                                @foreach ($prompts as $prompt)
                                    <li>
                                        <a class="dropdown-item" href="{{ url('user') }}">{{ $prompt }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('register') }}">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}">Sign in</a>
                            </li>
                        @endauth
                        <li class="nav-item ms-md-4">
                            <a class="nav-link btn btn-success text-white" target="_blank"
                                href="https://www.fiverr.com/dev_youssef/create-your-own-ai-blog-writing-social-media-content-email-marketing-using-gpt3">
                                <img src="{{ url('assets/site/images/fiverr-icon.png') }}" alt=""> Buy Now
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end navigation -->

    <!-- start hero section -->
    <section class="section-hero">
        <div class="container">
            <div class="row align-items-center">
                <!-- start hero section -->
                <div class="col-md-6">
                    <div class="hero-content pe-md-5">
                        <h1 class="hero-title text-dark">
                            {{ $site->hero_title }}
                        </h1>
                        <div class="hero-subtitle">
                            <p>
                                {{ $site->hero_subtitle }}
                            </p>
                        </div>
                        <div class="cta">
                            <button class="btn btn-primary cta-button">
                                <i class="fa fa-send"></i> {{ $site->hero_cta }}
                            </button>
                            <div class="cta-info">
                                <p class=" text-dark">{{ $site->hero_promotion }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start hero section -->
                <div class="col-md-6">
                    <div class="hero-image">
                        <img src="{{ url($site->hero_image) }}" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero section -->

    <!-- start partners section -->
    <section class="section-partners">
        <div class="container">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($partners as $partner)
                        <div class="swiper-slide">
                            <img src="{{ url($partner) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end partners section -->

    <!-- start about section -->
    <section class="section-about">
        <div class="container">
            <!-- start heading -->
            <div class="about-main-title">
                <h2 class="main-title text-dark">{{ $site->story_title }}</h2>
                <h6 class="subtitle">{{ $site->story_subtitle }}</h6>
            </div>
            <!-- end heading -->

            <!-- start blocks info -->
            <div class="blocks-informations">
                <div class="row">
                    @foreach ($blocks as $block)
                        <!-- start block item -->
                        <div class="col-md-4">
                            <div class="block-item text-center">
                                <div class="block-icon mb-3">
                                    <img src="{{ url($block->icon) }}" alt="">
                                </div>
                                <div class="block-title">
                                    <h4 class="text-dark">{{ $block->title }}</h4>
                                </div>
                                <div class="block-content">
                                    <p>
                                        {{ $block->subtitle }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end block item -->
                    @endforeach
                </div>
            </div>
            <!-- end blocks info -->

            <!-- start pointers image -->
            <div class="img-pointers text-center">
                <img src="{{ url('assets/site/images/three-pointers.svg') }}" alt="">
            </div>
            <!-- end pointers image -->

            <!-- start story promotion -->
            <div class="story-promotion text-center">
                <h5 class="text-dark">{{ $site->story_promotion }}</h5>
            </div>
            <!-- end story promotion -->

            <!-- start story images -->
            <div class="story-images">
                <div class="row">
                    <div class="col-md-8 col-lg-9 order-2">
                        <div class="browser-image">
                            <img src="{{ url($site->story_browser_image) }}"@class(['img-responsive', 'border', 'rounded-3'])
                                alt="">
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-3 order-1">
                        <div class="phone-image">
                            <img src="{{ url($site->story_phone_image) }}" @class(['img-responsive', 'border', 'rounded-3'])
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end story images -->
        </div>
    </section>
    <!-- end about section -->

    <!-- start section our pricing -->
    <section class="section-pricing">
        <div class="container">
            <div class="section-heading text-center">
                <div class="main-title text-dark">
                    <h3>{{ $site->pricing_title }}</h3>
                </div>
                <div class="subtitle">
                    <h6>{{ $site->pricing_subtitle }}</h6>
                </div>
            </div>
            <div class="plans">
                @php
                    $pro = $plans[1];
                    $business = $plans[2];
                    $enterprise = $plans[3];
                @endphp
                <!-- Pricing # -->
                <div class="pricing">
                    <div class="container">
                        <div class="pricing-table table-responsive">
                            <table class="table">
                                <!-- Heading -->
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>
                                            {{ $pro->title }}
                                            <span class="ptable-star orange">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="ptable-price">${{ $pro->price_monthly }}</span>
                                        </th>
                                        <th class="highlight">
                                            {{ $business->title }}
                                            <span class="ptable-star green">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="ptable-price">${{ $business->price_monthly }}</span>
                                        </th>
                                        <th>
                                            {{ $enterprise->title }}
                                            <span class="ptable-star lblue">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <span class="ptable-price">${{ $enterprise->price_monthly }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="ptable-title">
                                                <i class="fa fa-file"></i>
                                                monthly words
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Icon -->
                                            <i class="fa fa-file orange"></i>
                                            {{ $pro->word_limit }}
                                        </td>
                                        <td>
                                            <!-- Icon -->
                                            <i class="fa fa-file green"></i>
                                            {{ $business->word_limit }}
                                        </td>
                                        <td>
                                            <!-- Icon -->
                                            <i class="fa fa-file lblue"></i>
                                            {{ $enterprise->word_limit }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="ptable-title">
                                                <i class="fa fa-image"></i>
                                                monthly images
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Icon -->
                                            <i class="fa fa-image orange"></i>
                                            {{ $pro->image_limit }}
                                        </td>
                                        <td>
                                            <!-- Icon -->
                                            <i class="fa fa-image green"></i>
                                            {{ $business->image_limit }}
                                        </td>
                                        <td>
                                            <!-- Icon -->
                                            <i class="fa fa-image lblue"></i>
                                            {{ $enterprise->image_limit }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="ptable-title">
                                                <i class="fa fa-pencil"></i>
                                                Editor tools
                                            </span>
                                        </td>
                                        <td>
                                            <i class="fa fa-pencil orange"></i>
                                            All
                                        </td>
                                        <td>
                                            <i class="fa fa-pencil green"></i>
                                            All
                                        </td>
                                        <td>
                                            <i class="fa fa-pencil lblue"></i>
                                            All
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="ptable-title">
                                                <i class="fa fa-shield"></i>
                                                Access tool
                                            </span>
                                        </td>
                                        <td>
                                            <i class="fa fa-shield orange"></i>
                                            All
                                        </td>
                                        <td>
                                            <i class="fa fa-shield green"></i>
                                            All
                                        </td>
                                        <td>
                                            <i class="fa fa-shield lblue"></i>
                                            All
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="ptable-title">
                                                <i class="fa fa-headphones"></i>
                                                Product support
                                            </span>
                                        </td>
                                        <td>
                                            <i class="fa fa-envelope-o orange"></i>
                                            Yes
                                        </td>
                                        <td>
                                            <i class="fa fa-envelope-o green"></i>
                                            Yes
                                        </td>
                                        <td>
                                            <i class="fa fa-envelope-o lblue"></i>
                                            Yes
                                        </td>
                                    </tr>
                                    <!-- Buttons -->
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td class="bg-orange"><a class="btn" href="{{ url('/user') }}"><i
                                                    class="fa fa-sign-in"></i> Sign Up</a></td>
                                        <td class="bg-green"><a class="btn" href="{{ url('/user') }}"><i
                                                    class="fa fa-sign-in"></i> Sign Up</a></td>
                                        <td class="bg-lblue"><a class="btn" href="{{ url('/user') }}"><i
                                                    class="fa fa-sign-in"></i> Sign Up</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section our pricing -->

    <!-- start testimonilas section -->
    <section class="section-testimonials text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="testimonial-block">
                        <div class="testimonial-avatar">
                            <img src="{{ url($site->testimonial_avatar) }}" alt="">
                        </div>
                        <div class="testimonial-review">
                            <p>{{ $site->testimonial_review }}</p>
                        </div>
                        <div class="testimonial-client">
                            <div class="client-name">
                                <p>{{ $site->testimonial_name }}</p>
                            </div>
                            <div class="client-job">
                                <span>{{ $site->testimonial_title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end testimonilas section -->

    <!-- start footer -->
    <footer class="section-footer ">
        <!-- start site items -->
        <div class="container">
            <div class="site-list-map">
                <div class="row">
                    <!-- start site item -->
                    <div class="col-md-4">
                        <div class="site-item">
                            <div class="logo mb-md-4"><img src="{{ url($setting->logo) }}" alt=""></div>
                            <ul class="list-unstyled ms-md-3">
                                <li>
                                    <p class="text-light mb-2">
                                        <i class="fa fa-location-arrow me-2 icon"></i>
                                        {{ $setting->adress }}
                                    </p>
                                </li>
                                <li>
                                    <p class="text-light mb-2">
                                        <i class="fa fa-phone me-2 icon"></i>
                                        {{ $setting->phone }}
                                    </p>
                                </li>
                                <li>
                                    <p class="text-light mb-2">
                                        <i class="fa fa-envelope me-2 icon"></i>
                                        {{ $setting->email }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end site item -->

                    <!-- start site item -->
                    <div class="col-md-2">
                        <div class="site-item">
                            <div class="site-item-title">
                                <h5 class="mb-3">Features</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li class="my-2">
                                    <a href="{{ url('user') }}">Dashboard</a>
                                </li>
                                <li class="my-2">
                                    <a href="{{ url('pricing') }}">Pricing</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end site item -->

                    <!-- start site item -->
                    <div class="col-md-2">
                        <div class="site-item">
                            <div class="site-item-title">
                                <h5 class="mb-3">Use Cases</h5>
                            </div>
                            <ul class="list-unstyled">
                                @foreach ($tools as $tool)
                                    <li class="mb-2">
                                        <a href="{{ url('user') }}">{{ $tool }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- end site item -->

                    <!-- start site item -->
                    <div class="col-md-2">
                        <div class="site-item">
                            <div class="site-item-title">
                                <h5 class="mb-3">Tools</h5>
                            </div>
                            <ul class="list-unstyled">
                                @foreach ($prompts as $prompt)
                                    <li class="mb-2">
                                        <a href="{{ url('user') }}">{{ $prompt }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- end site item -->

                    <!-- start site item -->
                    <div class="col-md-2">
                        <div class="site-item">
                            <div class="site-item-title">
                                <h5 class="mb-3">Resources</h5>
                            </div>
                            <ul class="list-unstyled">
                                <li class="my-1">
                                    <a href="{{ url('user') }}">Your Account</a>
                                </li>
                                <li class="my-1">
                                    <a href="{{ url('user') }}">{{ $setting->site_title }} Editor</a>
                                </li>
                                <li class="my-1">
                                    <a href="{{ url('user') }}">Get Started</a>
                                </li>
                                <li class="my-1">
                                    <a href="{{ url('user') }}">sign in</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end site item -->
                </div>
            </div>
        </div>
        <!-- end site items -->

        <!-- start copyright part -->
        <div class="copyright-part border-top">
            <div class="container">
                <div class="copyright-text">
                    <p class="mb-2">
                        @ {{ $setting->site_title }} {{ date('Y') }} . All right reserved
                    </p>
                </div>
                <div class="copyright-cookies">
                    <p class="mb-0">
                        When you visit or interact with our sites, services or tools, we or our authorised service
                        providers may use cookies for storing information to help provide you with a better, faster and
                        safer experience and for marketing purposes.
                    </p>
                </div>
            </div>
        </div>
        <!-- start copyright part -->
    </footer>
    <!-- end footer -->

    <!-- jQuery script -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- swiper script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- custom script -->
    <script src="{{ url('js/site.js') }}"></script>

</body>

</html>
