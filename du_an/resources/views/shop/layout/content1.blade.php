<!-- Featured Section Begin -->
<div class="hero__item set-bg" data-setbg="{{asset('storage/images/background.jpg')}}">
    <div class="hero__text">
        <span>FRUIT FRESH</span>
        <h2>Vegetable <br />100% Organic</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
    </div>
</div>
</div>
</div>
</div>
</section>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="pading">Tất cả sản phẩm</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($products as $key=>$product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/images/' . $product->image) }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a class="addToCart" data-url="{{route('shop.store',$product->id)}}" id="{{ $product->id }}"
                                ><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6 ><p id="name" href="#">{{$product->name}}</p></h6>
                        <h5>{{number_format($product->price)}} Đồng</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function() {
        $(document).on('click', '.addToCart', function(e) {
            e.preventDefault();
            let href = $(this).data('url');
            $.ajax({
                url: href,
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}',
                },
            });
        });
    })
</script>
<!-- Featured Section End -->


