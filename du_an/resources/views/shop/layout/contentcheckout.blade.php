<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thanh Toán</h4>
            <form class="checkout-form" method="POST" action="{{ route('order') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        @if (isset(Auth()->guard('customers')->user()->name))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Tên khách hàng<span>*</span></p>
                                        <input type="text" value="{{ Auth()->guard('customers')->user()->name }}"
                                            name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" value="{{ Auth()->guard('customers')->user()->address }}"
                                    name="address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text" value="{{ Auth()->guard('customers')->user()->phone }}"
                                            name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value="{{ Auth()->guard('customers')->user()->email }}"
                                            name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Ghi chú<span>*</span></p>
                                        <input type="text" placeholder="" name="note">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <table>
                                <thead>
                                    <tr>
                                        <th width="75%">Sản phẩm</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody class=" order-table">
                                    @php $totalAll = 0 @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <tr>
                                                @php
                                                    $total = $details['price'] * $details['quantity'];
                                                    $totalAll += $total;
                                                @endphp
                                                <td>
                                                    <input type="hidden" value="{{ $id }}"
                                                        name="product_id[]">{{ $details['nameVi'] ?? '' }} x
                                                    <input type="hidden" value="{{ $details['quantity'] }}"
                                                        name="quantity[]">{{ $details['quantity'] ?? '' }}
                                                </td>
                                                <td><input type="hidden" value="{{ $total }}"
                                                        name="total[]">{{ number_format($total) }}.vnd</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><input type="hidden" name="totalAll"
                                            value="{{ $totalAll }}">{{ number_format($totalAll) }}.vnd</td>
                                </tr>
                            </table>
                            <button type="submit" class="site-btn">Đặt Hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
