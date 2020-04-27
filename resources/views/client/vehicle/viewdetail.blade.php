@extends('client/layout/index')

@section('content')

    <div class="ui layout">
        <!-- grid -->
        <div class="ui grid container stackable centered">
            <div class="row">
                <div
                    class="ui twelve wide tablet twelve wide computer ten wide widescreen ten wide large screen column property-section-boxed">

                    <br>

                    <div class="white-section shadow-sq">
                        <div class="inner-section">

                            <div class="ui grid">
                                <div class="row">

                                    <!-- Left-->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <!-- Slick aici-->

                                        <div class="property-image-wrapper">
                                            <div class="sq-slick carousel-sq" data-center-mode="true"
                                                 data-center-padding="0" data-show-slides="1" data-scroll-slides="1"
                                                 data-mobile-center-padding="0" data-tablet-arrows="false"
                                                 data-mobile-arrows="false" data-fade="true" data-ease="linear"
                                                 data-speed="500" data-tablet-fade="false" data-tablet-ease="ease"
                                                 data-tablet-speed="300" data-mobile-fade="false"
                                                 data-mobile-ease="ease" data-mobile-speed="300">

                                                <!-- Slide 01-->
                                                <div>
                                                    <div class="caption-content"></div>
                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="upload/image/vehicle_image/{{$Vehicle -> image}}"
                                                                 alt="" data-gallery="gallery" data-caption="Car 01">
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Slide 02-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/property/property_big_01.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 02">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slide 03-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/property/property_big_02.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 03">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slide 04-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img"
                                                                 src="client_assets/assets/images/property/property_big_03.jpg"
                                                                 alt="" data-gallery="gallery" data-caption="Car 04">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <a class="host-sq" href="vendor_details.html">
                                                <span class="avatar-sq">
                                                    <img src="client_assets/assets/images/avatar/avatar_04.jpg" alt="">
                                                </span>
                                                <p class="host-name-sq">
                                                    Dustin Porter
                                                </p>

                                            </a>
                                        </div>

                                        <h1 class="title-sq">
                                            {{$Vehicle -> name}}
                                        </h1>

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <div class="rating-sq" style="background: #FF5C5C">
                                                    <i class="icon icon-heart"></i>
                                                    @if($average_rating == 0)
                                                        No rating
                                                    @else
                                                        {{$average_rating}}
                                                    @endif
                                                </div>
                                            </div>
                                            @foreach($VehicleDetail as $item2)
                                                @if($item2 -> id_vehicle == $Vehicle -> id)
                                                    <div class="icons-column">
                                                        <i class="icon icon-ac"></i>
                                                        @if($item2 -> air_con == 1)
                                                            A/C
                                                        @else
                                                            No A/C
                                                        @endif
                                                    </div>
                                                    <div class="icons-column">
                                                        <i class="icon icon-gearbox"></i>
                                                        @switch($item2 -> gearbox)
                                                            @case (1)
                                                            A
                                                            @break
                                                            @case (2)
                                                            A/M
                                                            @break
                                                            @case (3)
                                                            DCT
                                                            @break
                                                            @case (4)
                                                            M
                                                            @break
                                                        @endswitch
                                                    </div>
                                                    <div class="icons-column">
                                                        <i class="icon icon-user-circle"></i> x {{$item2->seat}}
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <p class="description-sq">
                                            In hac habitasse platea dictumst. Integer quis tortor enim. Integer et elit
                                            nec magna ultricies convallis. In venenatis eu erat et facilisis. Vestibulum
                                            congue enim nisl. Fusce arcu enim, porta a auctor vel, hendrerit a libero.
                                            Vivamus vel dapibus sem.
                                        </p>

                                    </div>

                                    <!-- Right -->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <div class="property-checkout-container main-infos">

                                            <div class="div-c">
                                                <label>Pick up location</label>
                                                <input type="text" placeholder=" ">
                                            </div>

                                            <div class="div-c">
                                                <label>Return location</label>
                                                <input type="text" placeholder=" ">
                                            </div>
                                            <div class="div-c">
                                                <input type="checkbox" id="checkbox1">
                                                <label for="checkbox1">Return car to the same location</label>
                                            </div>


                                            <div class="div-c inline-2 inline-check-in">

                                                <div class="divided-column calendar-sq" id="sticky-box-rangestart">
                                                    <label class="placeholder">Check in</label>

                                                    <div class="relative-sq">
                                                        <input type="text" class="filter" value="" required
                                                               placeholder="date">

                                                        <i class="icon icon-little-arrow filters-arrow"></i>
                                                    </div>

                                                </div>

                                                <div class="divided-column calendar-sq" id="sticky-box-rangeend">

                                                    <label class="placeholder">Check Out</label>

                                                    <input type="text" class="filter" value="" required
                                                           placeholder="date">

                                                </div>
                                            </div>


                                            <div class="div-c extras-sq">

                                                <label class="placeholder">Rent Price</label>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox2" checked disabled>
                                                    <label for="checkbox2">Daily Rent Price</label>

                                                    <span class="value-sq"
                                                          style="color: #FF5C5C">${{$Vehicle -> daily_price}}</span>
                                                </div>

                                                <label class="placeholder">Extras</label>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox2">
                                                    <label for="checkbox2">Child Seat</label>

                                                    <span class="value-sq">$10</span>
                                                </div>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox3">
                                                    <label for="checkbox3">Driver</label>

                                                    <span class="value-sq">$13</span>
                                                </div>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox4">
                                                    <label for="checkbox4">Neque consequa es nterdum erat consequa es
                                                        nterdum erat</label>

                                                    <span class="value-sq">$10</span>
                                                </div>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox5">
                                                    <label for="checkbox5">Phasellus sed neque consequa es nterdum
                                                        erat</label>

                                                    <span class="value-sq">$10</span>
                                                </div>

                                            </div>


                                            <div class="div-c total-sq">
                                                <div class="divided-column">
                                                    <label class="placeholder">Total</label>
                                                    <span class="value-sq">$200</span>

                                                </div>
                                            </div>

                                            <a class="button-sq fullwidth-sq font-weight-bold-sq" href="">Instant
                                                Booking</a>

                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <h3>Location:
                        <span>
                            @foreach($PickupLocation as $item)
                                @if($Vehicle -> id_pickup_location == $item -> id)
                                    {{$item -> name}}
                                @endif
                            @endforeach
                        </span></h3>

                    <h3>Reviews</h3>

                    <div class="reviews-header">
                        <div class="rating-big">
                            <div class="rating-badge">
                                <span>@if($average_rating == 0)
                                        No rating
                                    @else
                                        {{$average_rating}}
                                    @endif</span>
                                <i class="icon icon-heart" style="color: #FF5C5C"></i>
                            </div>
                            <div class="rating-info">
                                <p>More than <strong>95%</strong> of guests recommend this place</p>
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

                    {{--<div class="reviews-search">--}}
                    {{--<form action="#" class="">--}}
                    {{--<input id="reviews-search" type="text" placeholder="Search reviews" value="" required="">--}}
                    {{--<label><i class="icon icon-search"></i></label>--}}
                    {{--</form>--}}
                    {{--</div>--}}

                    <div class="reviews-feed">
                        <?php
                        $nocar = false;
                        ?>
                        @foreach($Feedback as $item)
                            @if($item -> id_vehicle == $Vehicle -> id)
                                <div class="reviews-row">
                                    <div class="review-meta">
                                        @foreach($User as $item2)
                                            @if($item2 -> id == $item -> id_user)
                                                <a class="avatar-sq @if($item2->verify_email == 1) verified-sq @endif" href="vendor_details.html">
                                                    <img src="upload/image/user_image/{{$item2 -> image}}" alt="">
                                                </a>
                                                <a class="name-sq" href="vendor_details.html">{{$item2 -> name}}</a>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="comment-sq">
                                        <span class="date-sq">
                                            {{$item -> created_at -> format('F d, Y')}}
                                            @if(isset($user_login))
                                                @if($item -> id_user == $user_login -> id)
                                                    <a style="color: #FF5C5C"
                                                       href="vehicle/feedback/delete/{{$item -> id}}">remove</a>
                                                @endif
                                            @endif
                                        </span>
                                        <p>
                                            @if($item -> rating < 3)
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                            @elseif($item -> rating <5)
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                            @elseif($item -> rating <7)
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                            @elseif($item -> rating <9)
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star" style="color: #FF5C5C"></i>
                                            @elseif($item -> rating <11)
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                                <i class="icon icon-star-2" style="color: #FF5C5C"></i>
                                            @endif
                                        </p>
                                        <p>{{$item -> content}}</p>
                                    </div>
                                </div>
                                <?php
                                $nocar = true;
                                ?>
                            @endif
                        @endforeach
                        @if($nocar != true)
                            <div class="reviews-row">
                                No reviews
                            </div>
                        @endif

                        <div class="reviews-row">

                            @if(isset($user_login))
                                <div class="review-meta">
                                    <div class="avatar-sq @if($user_login->verify_email == 1) verified-sq @endif my-avatar-sq">
                                        <img src="upload/image/user_image/{{$user_login -> image}}" alt="">
                                    </div>
                                    <p class="name-sq">Me</p>
                                </div>

                                <div class="comment-sq">
                                    <form action="vehicle/feedback/{{$Vehicle -> id}}" method="POST">
                                        {{--<label for="rangeVal">Your rating:</label>--}}
                                        {{--<input type ="range" max="10" min="1"--}}
                                        {{--oninput="document.getElementById('rangeValLabel').innerHTML = this.value;"--}}
                                        {{--step="1" name="rangeVal" id="rangeVal" value="5">--}}
                                        {{--<em id="rangeValLabel" class="icon icon-star-2"></em>--}}

                                        <input type="number" placeholder="Rate the vehicle from 1 to 10" min="1"
                                               max="10" name="rating">

                                        <br>
                                        <br>

                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <textarea class="comment-textarea" name="feedback_content" cols="30" rows="5"
                                                  placeholder="Comment here" required></textarea>
                                        <br>
                                        <br>
                                        <button type="submit" class="button-sq float-right-sq">Post comment</button>
                                    </form>
                                </div>
                            @else
                                <div class="reviews-row">
                                    Please &nbsp; <a href="#" class="item modal-ui-trigger" data-trigger-for="modal02"
                                             style="color: #FF5C5C">login</a> &nbsp; to add comment
                                </div>
                            @endif
                        </div>

                    </div>

                    <h3>Related Articles</h3>

                </div>
            </div>
        </div>

        <div class="ui grid container stackable">
            <div class="row">
                <div class="sq-slick article-sq-slick" data-center-mode="true" data-center-padding="0px"
                     data-desktop-center-padding="0px" data-show-slides="3" data-scroll-slides="3"
                     data-desktop-show-slides="2" data-desktop-scroll-slides="2" data-tablet-show-slides="2"
                     data-tablet-scroll-slides="2" data-mobile-show-slides="1" data-mobile-scroll-slides="1"
                     data-tablet-center-padding="0px" data-mobile-center-padding="40px">


                    <!-- Slide 01-->
                    <div>
                        <div class="article-sq item">
                            <div class="item-inner">

                                <!-- image container -->
                                <a class="image-sq" href="article.html">
									<span class="image-wrapper">
										<span class="image-inner">
											<img class="image-sq"
                                                 src="client_assets/assets/images/magic_grid/magic_grid_article_01.jpg"
                                                 alt="">
										</span>
									</span>
                                </a>

                                <!-- typography container-->
                                <div class="typo-sq">
                                    <p class="typo-label-sq" data-label-before="Tech" data-label-after="Rent a car"></p>
                                    <p class="typo-title-sq">Thousands Now Adware Removal Who Never Thought They
                                        Could</p>
                                    <p class="typo-desc-sq">Few would argue that, despite the advancements of feminism
                                        over the past three decades, women still face a double standard when it comes to
                                        their behavior. While men’s borderline-inappropriate behavior is often laughed
                                        off as “boys will be boys,” women face higher conduct standards – especially in
                                        the workplace. That’s why it’s crucial that, as women, our behavior on the job
                                        is beyond reproach.</p>

                                    <a href="article.html" class="read-more-sq">read more <i
                                            class="icon icon-arrow-right-122"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Slide 02-->
                    <div>
                        <div class="article-sq item">
                            <div class="item-inner">

                                <!-- image container -->
                                <a class="image-sq" href="article.html">
									<span class="image-wrapper">
										<span class="image-inner">
											<img class="image-sq"
                                                 src="client_assets/assets/images/magic_grid/magic_grid_article_02.jpg"
                                                 alt="">
										</span>
									</span>
                                </a>

                                <!-- typography container-->
                                <div class="typo-sq">
                                    <p class="typo-label-sq" data-label-before="Tech" data-label-after="Rent a car"></p>
                                    <p class="typo-title-sq">Maui By Air The Best Way Around The Island</p>
                                    <p class="typo-desc-sq">You love having a second home but the mortgage is putting a
                                        crater in your wallet. Many second home owners turn to renting their property as
                                        a vacation rental to help defray the costs of ownership. How do you price a
                                        vacation home rental without overcharging but making enough to cover your costs?
                                        Do your research.</p>

                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Slide 03-->
                    <div>
                        <div class="article-sq item">
                            <div class="item-inner">

                                <!-- image container -->
                                <a class="image-sq" href="article.html">
									<span class="image-wrapper">
										<span class="image-inner">
											<img class="image-sq"
                                                 src="client_assets/assets/images/magic_grid/magic_grid_article_03.jpg"
                                                 alt="">
										</span>
									</span>
                                </a>

                                <!-- typography container-->
                                <div class="typo-sq">
                                    <p class="typo-label-sq" data-label-before="Auto" data-label-after="Rent a car"></p>
                                    <p class="typo-title-sq">Stu Unger Rise And Fall Of A Poker Genius</p>
                                    <p class="typo-desc-sq">While most people enjoy casino gambling, sports betting,
                                        lottery and bingo playing for the fun and excitement it provides, others may
                                        experience gambling as an addictive and distractive habit. Statistics show that
                                        while 85 percent of the adult population in the US enjoys some type of gambling
                                        every year, between 2 and 3 percent of will develop a gambling problem and 1
                                        percent of them are diagnosed as pathological gamblers. Where can you draw the
                                        line between harmless gambling to problem gambling? How can you tell if you or
                                        your friend are compulsive gamblers? Here you can find answers to these
                                        questions and other questions regarding problem gambling and gambling addiction.
                                        What is the Meaning of Problem Gambling?</p>

                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Slide 04-->
                    <div>
                        <div class="article-sq item">
                            <div class="item-inner">

                                <!-- image container -->
                                <a class="image-sq" href="article.html">
									<span class="image-wrapper">
										<span class="image-inner">
											<img class="image-sq"
                                                 src="client_assets/assets/images/magic_grid/magic_grid_article_04.jpg"
                                                 alt="">
										</span>
									</span>
                                </a>

                                <!-- typography container-->
                                <div class="typo-sq">

                                    <p class="typo-label-sq" data-label-before="Tech" data-label-after="Rent a car"></p>
                                    <p class="typo-title-sq">What Is Hdcp</p>
                                    <p class="typo-desc-sq">If you are in the market for a computer, there are a number
                                        of factors to consider. Will it be used for your home, your office or perhaps
                                        even your home office combo? First off, you will need to set a budget for your
                                        new purchase before deciding whether to shop for notebook or desktop computers.
                                        Many offices use desktop computers because they are not intended to be moved
                                        around a lot. In addition, affordability often plays a large role in someone’s
                                        decision as to whether to purchase notebook or desktop computers.</p>

                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Slide 05-->
                    <div>
                        <div class="article-sq item">
                            <div class="item-inner">

                                <!-- image container -->
                                <a class="image-sq" href="article.html">
									<span class="image-wrapper">
										<span class="image-inner">
											<img class="image-sq"
                                                 src="client_assets/assets/images/magic_grid/magic_grid_article_05.jpg"
                                                 alt="">
										</span>
									</span>
                                </a>

                                <!-- typography container-->
                                <div class="typo-sq">
                                    <p class="typo-label-sq" data-label-before="Auto" data-label-after="Rent a car"></p>
                                    <p class="typo-title-sq">Anonymous Proxy</p>
                                    <p class="typo-desc-sq">LCD screens are uniquely modern in style, and the liquid
                                        crystals that make them work have allowed humanity to create slimmer, more
                                        portable technology than we’ve ever had access to before. From your wrist watch
                                        to your laptop, a lot of the on the go electronics that we tote from place to
                                        place are only possible because of their thin, light LCD display screens. Liquid
                                        crystal display (LCD) technology still has some stumbling blocks in its path
                                        that can make it unreliable at times, but on the whole the invention of the LCD
                                        screen has allowed great leaps forward in global technological progress.</p>

                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Slide 06-->
                    <div>
                        <div class="article-sq item">
                            <div class="item-inner">

                                <!-- image container -->
                                <a class="image-sq" href="article.html">
									<span class="image-wrapper">
										<span class="image-inner">
											<img class="image-sq"
                                                 src="client_assets/assets/images/magic_grid/magic_grid_article_06.jpg"
                                                 alt="">
										</span>
									</span>
                                </a>

                                <!-- typography container-->
                                <div class="typo-sq">
                                    <p class="typo-label-sq" data-label-before="Adventure"
                                       data-label-after="Rent a car"></p>
                                    <p class="typo-title-sq">Live Poker How To Win Tournament Games</p>
                                    <p class="typo-desc-sq">The term “boutique hotel” has been widely used in recent
                                        years, but what does it mean and why should you stay in one?</p>

                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br>
        <br>

    </div>
@endsection
