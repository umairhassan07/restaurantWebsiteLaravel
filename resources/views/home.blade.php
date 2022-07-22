

@extends('layouts.default')

@section('extra-css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .image-class{
            height: 100%;
            object-fit: cover;
        }
        .image-div{
            height: 140px;
        }
    </style>
@endsection

@section('content')


    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>KlassyCafe</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          @foreach ($sliders as $slider)
                         
                          <div class="item">
                            <div class="img-fill">
                                <img src="{{ asset('images/sliders/'. $slider->image) }}" alt="">
                            </div>
                          </div>

                          @endforeach
                          <!-- // Item -->
                          
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>{{ $about['heading'] }}</h2>
                        </div>
                        <p>
                            {!! $about['description'] !!}
                        </p>
                        <div class="row">
                            @foreach ($about['images'] as $image )
                                
                            <div class="col-4">
                                <div class="image-div">
                                    <img class="image-class" src="{{ asset('images/about/'. $image) }}" alt="">
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

                @php
                    //get video id from youtube url
                    parse_str( parse_url( $about->videoLink, PHP_URL_QUERY ), $my_array_of_vars );
                    $video_id = $my_array_of_vars['v'];
                    $video_thumbnail = 'http://img.youtube.com/vi/'.$video_id.'/maxresdefault.jpg';
                @endphp

                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="{{ $about->videoLink }}"><i class="fa fa-play"></i></a>
                            {{-- <img height="480" src="assets/images/about-video-bg.jpg" alt=""> --}}
                            <img height="480" src="{{$video_thumbnail}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    @foreach ($menu as $key=> $men)
                    
                    <div class="item">
                        <div class='card card' style="background-image: url({{ asset('/images/menu/'.$menu[$key]['image']) }})">
                            <div class="price"><h6>{{ $menu[$key]['price'] }} <small class="text-white">OMR</small> </h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$menu[$key]['title']}}</h1>
                              <p class='description' style="padding: 0 10px; color: white">{!! $menu[$key]['description'] !!}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                    </div>
                  
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($cheffs as  $chef)
                    
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <img height="340" src="{{ asset('/images/cheffs/'.$chef['image']) }}" style="object-fit: cover" alt="Chef #1">
                        </div>
                        <div class="down-content">
                            <h4>{{$chef['name']}}</h4>
                            <span>{{ $chef['designation'] }}</span>
                        </div>
                    </div>
                </div>

                @endforeach
               
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    <section class="section" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contact Us</h6>
                            <h2>{{ $contact['heading'] }}</h2>
                        </div>
                        {!! $contact['description'] !!}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="phone">
                                    <i class="fa fa-phone"></i>
                                    <h4>Phone Numbers</h4>
                                    <span><a href="#">{{ $contact['phone1'] }}</a><br><a href="#">{{ $contact['phone2'] }}</a></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="message">
                                    <i class="fa fa-envelope"></i>
                                    <h4>Emails</h4>
                                    <span><a href="#">{{ $contact['email1'] }}</a><br><a href="#">{{ $contact['email2'] }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form id="contact" action="{{ route('add-reservation') }}" method="post">
                          <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success" id="alert-success" style="display:none;">
                                    <b><i class="fa fa-check" aria-hidden="true"></i></b>
                                </div>
                                <h4>Table Reservation </h4>
                                
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <select value="number-guests" name="number_guests" id="number-guests">
                                    <option value="number-guests">Number Of Guests</option>
                                    <option name="1" id="1">1</option>
                                    <option name="2" id="2">2</option>
                                    <option name="3" id="3">3</option>
                                    <option name="4" id="4">4</option>
                                    <option name="5" id="5">5</option>
                                    <option name="6" id="6">6</option>
                                    <option name="7" id="7">7</option>
                                    <option name="8" id="8">8</option>
                                    <option name="9" id="9">9</option>
                                    <option name="10" id="10">10</option>
                                    <option name="11" id="11">11</option>
                                    <option name="12" id="12">12</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">    
                                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input  name="reservation_date" id="date" type="date" class="form-control">
                                    <div class="input-group-addon" >
                                      <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                  </div>
                                </div>   
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <select value="time" name="time" id="time">
                                    <option value="time">Time</option>
                                    <option name="Breakfast" id="Breakfast">Breakfast</option>
                                    <option name="Lunch" id="Lunch">Lunch</option>
                                    <option name="Dinner" id="Dinner">Dinner</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Klassy Week</h6>
                        <h2>This Week’s Special Meal Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                          <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png" alt="">Breakfast</a></li>
                                          <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png" alt="">Lunch</a></a></li>
                                          <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png" alt="">Dinner</a></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="left-list">
                                                    @foreach ($meals_breakfast as $meal)

                                                    <div class="col-lg-6">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('images/meals/'.$meal['image']) }}" alt="meal image">
                                                            <h4>{{$meal['name']}}</h4>
                                                            <p>{{ $meal['description'] }}</p>
                                                            <div class="price">
                                                                <h6> OMR {{$meal['price']}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
                                </article>  
                                <article id='tabs-2'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="left-list">
                                                    @foreach ($meals_breakfast as $meal)

                                                    <div class="col-lg-6">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('images/meals/'.$meal['image']) }}" alt="meal image">
                                                            <h4>{{$meal['name']}}</h4>
                                                            <p>{{ $meal['description'] }}</p>
                                                            <div class="price">
                                                                <h6> OMR {{$meal['price']}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
                                </article>  
                                <article id='tabs-3'>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="left-list">
                                                    @foreach ($meals_breakfast as $meal)

                                                    <div class="col-lg-6">
                                                        <div class="tab-item">
                                                            <img src="{{ asset('images/meals/'.$meal['image']) }}" alt="meal image">
                                                            <h4>{{$meal['name']}}</h4>
                                                            <p>{{ $meal['description'] }}</p>
                                                            <div class="price">
                                                                <h6> OMR {{$meal['price']}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                    </div>
                                </article>  
                               
                                 
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** --> 
    
    
    @endsection

    @section('footer-scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
    @endsection