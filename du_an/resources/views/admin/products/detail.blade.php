@extends('admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Chi tiết sản phẩm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Sản Phẩm</a></li>
                    {{-- <li class="breadcrumb-item">Nhân viên</li> --}}
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('storage/images/' . $item->image) }}" alt="" width='120px'
                                height="100px"alt="Profile" class="rounded-circle">
                            <h2>{{ $item->name }}</h2>
                            {{-- <h3>Web Designer</h3> --}}
                            {{-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> --}}
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Thông tin</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Nhà cung
                                        cấp</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Nhân
                                        viên thêm</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Nhân viên sửa</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    {{-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> --}}

                                    <h5 class="card-title">Thông tin sản phẩm</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Danh mục</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->category->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tuổi</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->age }}</div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Màu sắc</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->color }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Giới tính</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->gender }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Giá</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->price }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Số lượng</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->quantity }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Ngày thêm</div>
                                        <div class="col-lg-9 col-md-8">{{ $item->created_at }}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <h5 class="card-title">Thông tin Nhà cung cấp</h5>
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Tên Nhà cung cấp</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->supplier->name }}</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->supplier->address }}</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->supplier->email }}</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Số điện thoại</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->supplier->phone }}</div>
                                        </div>

                                        {{-- <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="USA">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div> --}}
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <h5 class="card-title">Thông tin nhân viên thêm sản phẩm</h5>

                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Tên nhân viên</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->user->name }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->user->email }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->user->address }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->user->phone }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-3 col-md-4 label">Chức vụ</div>
                                            <div class="col-lg-9 col-md-8">{{ $item->user->position->name }}</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="row mb-3">
                                                <div class="col-lg-3 col-md-4 label">Thời gian thêm</div>
                                                <div class="col-lg-9 col-md-8">{{ $item->created_at }}</div>
                                            </div>
                                        </div>

                                        {{-- <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div> --}}
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <h5 class="card-title">Thông tin nhân viên sửa sản phẩm</h5>

                                    <form>
                                        @foreach ($users as $user)
                                            @if ($user->id == $item->user_id_edit)
                                                <div class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-3 col-md-4 label">Tên nhân viên</div>
                                                        <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-3 col-md-4 label">Địa chỉ</div>
                                                        <div class="col-lg-9 col-md-8">{{ $user->address }}</div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                                        <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-3 col-md-4 label">Chức vụ</div>
                                                        <div class="col-lg-9 col-md-8">{{ $user->position->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-3 col-md-4 label">Thời gian sửa</div>
                                                        <div class="col-lg-9 col-md-8">{{ $item->updated_at }}</div>
                                                    </div>
                                                </div>


    @endif
    @endforeach


                      </form><!-- End Change Password Form -->

                    </div>

                  </div><!-- End Bordered Tabs -->

                </div>
              </div>

            </div>
          </div>
        </section>

      </main>
    @endsection
