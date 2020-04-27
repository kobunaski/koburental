@extends('client.layout.index')

@section('content')
    @if($user_login)
        <div class="ui layout">

            <!-- grid -->
            <div class="ui grid container">

                <div class="row">

                    <div
                        class="ui twelve wide tablet three wide computer three wide widescreen three wide large screen column">
                        <br>
                        <div class="sticky-element sticky-desktop sticky-large-desktop under-ths after-element">
                            <div class="dashboard-sticky with-avatar">
                                <div class="dashboard-sticky-inner">
                                    <div class="dashboard-details">
                                    <span class="dashboard-avatar avatar-sq large-avatar-sq @if($user_login->verify_email == 1) verified-sq @endif">
                                        <img src="upload/image/user_image/{{$user_login -> image}}" alt="">
                                    </span>

                                        <div class="dashboard-texts">
                                            <h2 class="dashboard-name">{{$user_login -> name}}</h2>
                                            <div class="dashboard-subtitle">Vendor</div>
                                        </div>
                                    </div>

                                    <div class="dashboard-menu has-submenu">
                                        <a href="#" class="item">
                                            <i class="icon icon-side-sticky-menu"></i>
                                        </a>
                                        <ul class="submenu">
                                            <li class="active"><a class="item" href="profile">About Me</a>
                                            </li>
                                            <li><a class="item" href="profile/edit">Edit Profile</a></li>
                                            <li><a class="item" href="#products">Products</a></li>
                                            <li><a class="item" href="#reviews">Reviews</a></li>
                                        </ul>
                                    </div>

                                    <a class="dashboard-contact button-sq font-weight-bold-sq modal-ui-trigger"
                                       data-trigger-for="contact" href="">
                                        <i class="icon icon-messenger"></i>
                                        <span>Contact</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div
                        class="ui twelve wide tablet nine wide computer nine wide widescreen nine wide large screen column"
                        id="about-me">
                        <div class="ui grid">
                            <div class="row">

                                <div
                                    class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">

                                    <div class="white-section dashboard-description typo-section-sq">

                                        <div class="ui grid">
                                            <div class="row">

                                                <div
                                                    class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">
                                                    <h3>About Me</h3>
                                                </div>

                                                <div
                                                    class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                                                    <h5>Description</h5>

                                                    <p>Somos una familia multicultural lo cual nos enorgullece y nos
                                                        enriquece. Nos gusta mucho viajar, hemos estado en Alemania,
                                                        España,
                                                        Italia, Francia, Luxemburgo, Bélgica, Perú, Bolivia, Argentina,
                                                        México y de cada lugar hemos traído bellas memorias y
                                                        aprendizajes.
                                                        <br><br>

                                                        En cuanto a los sabores del mundo, nos encanta la comida árabe,
                                                        alemana, española y por supuesto la comida chilena. Entre la
                                                        música
                                                        que nos une están la salsa, la bachata, el tango, el folklore
                                                        latinoamericano y el rock.
                                                    </p>
                                                </div>

                                                <div
                                                    class="ui twelve wide tablet four wide computer four wide widescreen four wide large screen column">
                                                    <h5>Location</h5>

                                                    <div class="location-sq">
                                                        <i class="icon icon-location-pin-2"></i>
                                                        @if(isset($user_login -> address))
                                                            {{$user_login -> address}}
                                                            @else
                                                            Not set
                                                        @endif
                                                    </div>
                                                    <h5>Social</h5>

                                                    <ul class="list-default-sq list-style-inline-sq">
                                                        <li><a href="https://www.facebook.com/seventhqueen.themes"
                                                               target="_blank">
                                                                <i class="icon icon-logo-facebook2"></i></a>
                                                        </li>
                                                        <li><a href="https://twitter.com/seventhqueen" target="_blank">
                                                                <i class="icon icon-logo-twitter-bird2"></i></a>
                                                        </li>
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="ui twelve wide computer column">

                                    <div class="typo-header-sq">
                                        <div class="ui grid">
                                            <div class="row">
                                                <div
                                                    class="twelve wide mobile six wide tablet eight wide computer eight wide widescreen eight wide large screen column"
                                                    id="products">
                                                    <h3>Cars <sup>4</sup></h3>
                                                </div>

                                                <div
                                                    class="twelve wide mobile six wide tablet four wide computer four wide widescreen four wide large screen column">
                                                    <ul class="dashboard-filter list-style-inline-sq list-default-sq">
                                                        <li><a href="" class="active">Reviews</a></li>
                                                        <li><a href="">Price</a></li>
                                                    </ul>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="ui grid">
                                        <div class="row">

                                            <div
                                                class="twelve wide mobile six wide tablet six wide computer six wide widescreen six wide large screen column">
                                                <div class="property-item caption-sq shadow-sq small-sq">
                                                    <div class="property-item-inner">

                                                        <div class="price-tag-sq">16 &euro; <span>/ hour</span></div>
                                                        <a class="add-wishlist modal-ui-trigger" href=""
                                                           data-trigger-for="wishlist">
                                                            <i class="icon icon-add-wishlist"></i>
                                                        </a>

                                                        <a class="image-sq" href="property_page.html">
                                                            <div class="image-wrapper">
														<span class="image-inner">
															<img src="assets/images/cars/property_item_cars_01.jpg"
                                                                 alt="" class="">
														</span>
                                                            </div>
                                                        </a>

                                                        <div class="main-details">
                                                            <div class="title-row">
                                                                <a href="property_page.html" class="title-sq">VW Golf 7
                                                                    1.6
                                                                    TDI - DSG</a>
                                                            </div>

                                                            <div class="icons-row">
                                                                <div class="icons-column">
                                                                    <i class="icon icon-heart"></i> 8.7
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-ac"></i> A/C
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-gearbox"></i> A
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-user-circle"></i> x 4
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="twelve wide mobile six wide tablet six wide computer six wide widescreen six wide large screen column">
                                                <div class="property-item caption-sq shadow-sq small-sq">
                                                    <div class="property-item-inner">

                                                        <div class="price-tag-sq">85 &euro; <span>/ hour</span></div>
                                                        <a class="add-wishlist modal-ui-trigger" href=""
                                                           data-trigger-for="wishlist">
                                                            <i class="icon icon-add-wishlist"></i>
                                                        </a>

                                                        <a class="image-sq" href="property_page.html">
                                                            <div class="image-wrapper">
														<span class="image-inner">
															<img src="assets/images/cars/property_item_cars_02.jpg"
                                                                 alt="" class="">
														</span>
                                                            </div>
                                                        </a>
                                                        <div class="main-details">
                                                            <div class="title-row">
                                                                <a href="property_page.html" class="title-sq">Mercedes-Benz
                                                                    C AMG</a>
                                                            </div>

                                                            <div class="icons-row">
                                                                <div class="icons-column">
                                                                    <i class="icon icon-heart"></i> 9.9
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-ac"></i> A/C
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-gearbox"></i> A
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-user-circle"></i> x 4
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="twelve wide mobile six wide tablet six wide computer six wide widescreen six wide large screen column">
                                                <div class="property-item caption-sq shadow-sq small-sq">
                                                    <div class="property-item-inner">

                                                        <div class="price-tag-sq">32 &euro; <span>/ hour</span></div>
                                                        <a class="add-wishlist modal-ui-trigger" href=""
                                                           data-trigger-for="wishlist">
                                                            <i class="icon icon-add-wishlist"></i>
                                                        </a>

                                                        <a class="image-sq" href="property_page.html">
                                                            <div class="image-wrapper">
														<span class="image-inner">
															<img src="assets/images/cars/property_item_cars_03.jpg"
                                                                 alt="" class="">
														</span>
                                                            </div>
                                                        </a>

                                                        <div class="main-details">
                                                            <div class="title-row">
                                                                <a href="property_page.html" class="title-sq">Audi A3
                                                                    2.0
                                                                    TDI</a>
                                                            </div>

                                                            <div class="icons-row">
                                                                <div class="icons-column">
                                                                    <i class="icon icon-heart"></i> 8.9
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-ac"></i> A/C
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-gearbox"></i> A
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-user-circle"></i> x 4
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="twelve wide mobile six wide tablet six wide computer six wide widescreen six wide large screen column">
                                                <div class="property-item caption-sq shadow-sq small-sq">
                                                    <div class="property-item-inner">

                                                        <div class="price-tag-sq">45 &euro; <span>/ hour</span></div>
                                                        <a class="add-wishlist modal-ui-trigger" href=""
                                                           data-trigger-for="wishlist">
                                                            <i class="icon icon-add-wishlist"></i>
                                                        </a>

                                                        <a class="image-sq" href="property_page.html">
                                                            <div class="image-wrapper">
														<span class="image-inner">
															<img src="assets/images/cars/property_item_cars_04.jpg"
                                                                 alt="" class="">
														</span>
                                                            </div>
                                                        </a>

                                                        <div class="main-details">
                                                            <div class="title-row">
                                                                <a href="property_page.html" class="title-sq">1971 Buick
                                                                    Skylark GSX</a>
                                                            </div>

                                                            <div class="icons-row">
                                                                <div class="icons-column">
                                                                    <i class="icon icon-heart"></i> 8.5
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-ac"></i> A/C
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-gearbox"></i> M
                                                                </div>
                                                                <div class="icons-column">
                                                                    <i class="icon icon-user-circle"></i> x 4
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ui twelve wide computer column" id="reviews">
                                                <div class="typo-header-sq">
                                                    <h3>Reviews <sup>3</sup></h3>
                                                </div>

                                                <div class="reviews-header">
                                                    <div class="rating-big">
                                                        <div class="rating-badge">
                                                            <span>9.2</span>
                                                            <i class="icon icon-heart"></i>
                                                        </div>
                                                        <div class="rating-info">
                                                            <p>More than <strong>95%</strong> of guests recommend this
                                                                place
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="rating-percentage">
                                                        <div class="rating-column">
                                                            <p class="rating-label"><strong>Accuracy</strong></p>
                                                            <div class="basic-progressbar">
                                                                <div class="inner" style="width:75%"></div>
                                                            </div>
                                                        </div>

                                                        <div class="rating-column">
                                                            <p class="rating-label"><strong>Communication</strong></p>
                                                            <div class="basic-progressbar">
                                                                <div class="inner" style="width:55%"></div>
                                                            </div>
                                                        </div>

                                                        <div class="rating-column">
                                                            <p class="rating-label"><strong>Location</strong></p>
                                                            <div class="basic-progressbar">
                                                                <div class="inner" style="width:25%"></div>
                                                            </div>
                                                        </div>

                                                        <div class="rating-column">
                                                            <p class="rating-label"><strong>Cleanliness</strong></p>
                                                            <div class="basic-progressbar">
                                                                <div class="inner" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reviews-search">
                                                    <form action="#" class="">
                                                        <input id="reviews-search" type="text"
                                                               placeholder="Search reviews"
                                                               value="" required="">
                                                        <label><i class="icon icon-search"></i></label>
                                                    </form>
                                                </div>
                                                <div class="reviews-feed">
                                                    <div class="reviews-row">

                                                        <div class="review-meta">
                                                            <div class="avatar-sq verified-sq">
                                                                <img src="assets/images/avatar/avatar_01.jpg" alt="">
                                                            </div>
                                                            <p class="name-sq">Danny Martinez</p>
                                                        </div>

                                                        <div class="comment-sq">
                                                            <span class="date-sq">12 september 2017</span>

                                                            <p>As the saying goes: “Hospitality is making your guests
                                                                feel
                                                                at home, even though you wish they were". So please
                                                                treat
                                                                the place and the building neighbours as you would do
                                                                your
                                                                own.</p>
                                                        </div>
                                                    </div>

                                                    <div class="reviews-row">
                                                        <div class="review-meta">
                                                            <div class="avatar-sq verified-sq">
                                                                <img src="assets/images/avatar/avatar_03.jpg" alt="">
                                                            </div>
                                                            <p class="name-sq">Nathaniel Brown</p>
                                                        </div>
                                                        <div class="comment-sq">
                                                            <span class="date-sq">24 august 2017</span>

                                                            <p>With your budget in mind, it is easy to plan a chartered
                                                                yacht vacation. Companies often have a fleet of sailing
                                                                vessels that can accommodate parties of various sizes.
                                                                You
                                                                may want to make it a more intimate trip with only close
                                                                family. There are charters that can be rented for as few
                                                                as
                                                                two people.</p>
                                                        </div>
                                                    </div>

                                                    <div class="reviews-row">
                                                        <div class="review-meta">
                                                            <div class="avatar-sq verified-sq">
                                                                <img src="assets/images/avatar/avatar_02.jpg" alt="">
                                                            </div>
                                                            <p class="name-sq">Adele Burke</p>
                                                        </div>
                                                        <div class="comment-sq">
                                                            <span class="date-sq">06 May 2017</span>

                                                            <div class="ui accordion more-sq">
                                                                <div class="title">
                                                                    <a class="accordion-trigger more-trigger right-sq"
                                                                       data-more="More" data-less="Less">
                                                                        <i class="icon icon-arrow-down-122"></i>
                                                                    </a>
                                                                    <p>It is important to choose a hotel that makes you
                                                                        feel
                                                                        comfortable – contemporary or traditional
                                                                        furnishings, local decor or international,
                                                                        formal or
                                                                        relaxed. The ideal hotel directory should let
                                                                        you
                                                                        know of the options available.
                                                                    </p>

                                                                </div>

                                                                <div class="content">
                                                                    <p>If it matters that your hotel is, for example, on
                                                                        the
                                                                        beach, close to the theme park, or convenient
                                                                        for
                                                                        the airport, then location is paramount. Any
                                                                        decent
                                                                        directory should offer a location map of the
                                                                        hotel
                                                                        and its surroundings. There should be distance
                                                                        charts to the airport offered as well as some
                                                                        form
                                                                        of interactive map.
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>

                                                <br>
                                                <br>
                                                <br>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    @endif
@endsection
