@include('header/header')


<!-- end header section -->
<!-- slider section -->

<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>
                                    Fast Food Restaurant
                                </h1>
                                <p>
                                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia
                                    laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat
                                    dolore, iste magni quos nihil ducimus libero ipsam.
                                </p>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Order Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
<!-- end slider section -->
</div>
<!-- food section -->

<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Menu
            </h2>
        </div>

<?php
//        session()->forget('cart');
//        session()->flush();
       if (!empty(session('cart'))){
        $keys = array_keys(session('cart'));
}
?>

        <div class="filters-content">
            <div class="row grid">
                @foreach($products as $p)


                <div  class="col-sm-6 col-lg-4 all pizza">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="images/{{$p->image}}" alt="">
                            </div>
                            <div style="height: 215px;" class="detail-box">
                                <h5>
                                    {{$p->name}}
                                </h5>
                                <p style="height: 90px;">
                                    {{$p->description}}
                                </p>
                                <div class="options">
                                    <h6>
                                        {{$p->price}} MDL
                                    </h6>
                                    <div class="cart_button_{{$p->id}}">
@if( isset($keys) && in_array($p->id,$keys)) <button type="button" style="background-color: greenyellow;" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"></path>
                                        </svg>
                                    </button>
                                    @else
                                    <button type="button" data-value="{{$p->id}}" style=" background-color: #FFBE33;   width: 38px;
    height: 39px;" class="btn add-to-cart">

                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 456.029 456.029"
                                             style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"/>
                            </g>
                        </g>
                                            <g>
                                                <g>
                                                    <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z"/>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z"/>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                      </svg>

                                    </button>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- end food section -->


<!-- end client section -->

<!-- footer section -->
@include('footer/footer')
<!-- footer section -->
