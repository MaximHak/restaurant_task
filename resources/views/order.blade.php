@include('header/header')
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
<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Livrare
            </h2>
        </div>
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form_container">
                    <form action="{{route('place.order')}}" method="post">
                        @csrf
                        <div>
                            <input type="text" required class="form-control" name="name" placeholder="Numele Dumneavostra" />
                        </div>
                        <div>
                            <input type="number" required class="form-control" name="phone" placeholder="Numarul de telefon" />
                        </div>
                        <div>
                            <input type="email" required class="form-control" name="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" required class="form-control" name="address" placeholder="Adresa" />
                        </div>
                        <div class="btn_box">
                            <button>
                               Comanda
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@include('footer/footer')
