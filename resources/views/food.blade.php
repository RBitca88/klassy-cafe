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
                   
                    @foreach($data as $data)
                    <form action="{{url('/addcart', $data->id)}}" method="post">
                        @csrf
                    <div class="item">
                        <div class='card' style="background-image: url('/foodimage/{{$data->image}}')">
                            <div class="price"><h6>{{$data->price}}$</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{$data->title}}</h1>
                              <p class='description'>{{$data->description}}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                        <input type="number" name="quantity" min="1" value="1" style="height: 40px; width: 80px">
                        <input style="background-color: #90be6d; border: none; padding: 3px; height: 40px; width: 155px;" type="submit" value="Add to Cart">
                    </div>
                </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->