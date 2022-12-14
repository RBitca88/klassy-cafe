<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    </head>
    
    <body>
        @include('sweetalert::alert')
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                            <a class="menu-trigger"><span>Menu</span></a>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{url('/')}}" class="active">Back to Home</a></li>
                            {{-- <li class="scroll-to-section"><a href="#about">About</a></li> --}}
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            {{-- <li class="scroll-to-section"><a href="#menu">Menu</a></li> --}}
                            {{-- <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>  --}}
                           
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            {{-- <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>  --}}
                            <li class="scroll-to-section">
                                @auth
                                <a href="{{url('/showcart', Auth::user()->id)}}">
                                    Cart[{{$count}}]
                                </a>    
                                @endauth
                                @guest
                                    Cart[0]
                                @endguest
                            </li> 
                            <li>
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <li>
                                            <x-app-layout>
                                                
                                            </x-app-layout>                                            
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
                
                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            </li>
                        </ul>        
                        {{-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> --}}
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div id="top">
        <table align="center" bgcolor="#fb5849">
            <tr>
                <th style="padding: 50px">Food Name</th>
                <th style="padding: 50px">Price</th>
                <th style="padding: 50px">Quantity</th>
                <th style="padding: 50px">Action</th>
            </tr>
            {{-- <form action="{{url('orderconfirm')}}" method="POST">
                @csrf
            @foreach($data as $data)
            <tr align="center">
                <td>
                    <input type="text" name="foodname[]" value="{{$data->title}}" hidden>
                    {{$data->title}}
                </td>
                <td>
                    <input type="text" name="price[]" value="{{$data->price}}" hidden>
                    {{$data->price}}
                </td>
                <td>
                    <input type="text" name="quantity[]" value="{{$data->quantity}}" hidden>
                    {{$data->quantity}}
                </td>  
            </tr>
            @endforeach
            @foreach ($data2 as $data2)
                <tr style="position: relative; top: -60px; right: -520px">
                    <td><a href="{{url('/remove', $data2->id)}}" class="btn btn-warning">Remove</a></td>
                </tr>
            @endforeach --}}

            <form action="{{url('orderconfirm')}}" method="POST">
                @csrf
            @foreach($data as $data)
            <tr align="center">
                <td>
                    <input type="text" name="foodname[]" value="{{$data->food_title}}" hidden>
                    {{$data->food_title}}
                </td>
                <td>
                    <input type="text" name="price[]" value="{{$data->food_price}}" hidden>
                    {{$data->food_price}}{{$data->food_currency}}
                </td>
                <td>
                    <input type="text" name="quantity[]" value="{{$data->food_quantity}}" hidden>
                    {{$data->food_quantity}}
                </td>  
                <td>
                    <a href="{{url('/remove', $data->cart_id)}}" class="btn btn-warning">Remove</a>
                </td>
            </tr>
            @endforeach
            {{-- @foreach ($data2 as $data2)
                <tr style="position: relative; top: -60px; right: -520px">
                    <td>
                        <a href="{{url('/remove', $data2->id)}}" class="btn btn-warning">Remove</a>
                    </td>
                </tr>
            @endforeach --}}

        </table>
        <div align="center" style="padding: 10px">
            <button id="order" type="button" style="background-color: #90be6d; padding: 8px; border-radius: 5px">Order Now</button>
        </div>
        <div id="appear" align="center" style="padding: 10px; display: none">
            <div style="padding: 10px">
                {{-- <label>Name</label> --}}
                <input type="text" name="name" placeholder="Name">
            </div>
            <div style="padding: 10px">
                {{-- <label>Phone</label> --}}
                <input type="number" name="phone" placeholder="Phone Number">
            </div>
            <div style="padding: 10px">
                {{-- <label>Address</label> --}}
                <input type="text" name="address" placeholder="Address">
            </div>
            <div style="padding: 10px">
                <input class="btn btn-outline-success" type="submit" value="Order Confirm">
                <button id="close" type="button" style="background-color: #90be6d; padding: 8px; border-radius: 5px">Close</button>
            </div>
        </div>
    </form>
    </div>

 

        <!-- jQuery -->
        <script src="assets/js/jquery-2.1.0.min.js"></script>

        <script>
            $('#order').click(
                function(){
                    $('#appear').show();
                });
    
                $('#close').click(
                function(){
                    $('#appear').hide();
                });
        </script>

        <!-- Bootstrap -->
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    
        <!-- Plugins -->
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/accordions.js"></script>
        <script src="assets/js/datepicker.js"></script>
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/imgfix.min.js"></script> 
        <script src="assets/js/slick.js"></script> 
        <script src="assets/js/lightbox.js"></script> 
        <script src="assets/js/isotope.js"></script> 
        
        <!-- Global Init -->
        <script src="assets/js/custom.js"></script>
        <script>
    
            $(function() {
                var selectedClass = "";
                $("p").click(function(){
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                    $("#portfolio div").not("."+selectedClass).fadeOut();
                setTimeout(function() {
                  $("."+selectedClass).fadeIn();
                  $("#portfolio").fadeTo(50, 1);
                }, 500);
                    
                });
            });
    
        </script>
      </body>
    </html>