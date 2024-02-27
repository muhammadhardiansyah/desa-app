@extends('layout.main')

@section('container')
    <!-- Header Page -->
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-0">{{ $title }}</h2>
                </div>

            </div>
        </div>
    </header>
    <!-- End of Navbar & Jumbotron Page -->

    {{-- Contact Page --}}
    <section class="section-padding" id="section_2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-5 col-12 pe-lg-5">
                    <div class="contact-info">
                        <h3 class="mb-4">Hubungi Kami</h3>

                        <p class="d-flex border-bottom pb-3 mb-4">
                            <small class="me-1"><i class="bi bi-whatsapp"></i></small>
                            <strong class="d-inline me-4">Whatsapp</strong>
                            <span><strong>:</strong></span>
                            <span> <a href="https://wa.me/+6285233764622"> +6285233764622</a></span>
                        </p>

                        <p class="d-flex border-bottom pb-3 mb-4">
                            <small class="me-1"><i class="bi bi-envelope"></i></small>
                            <strong class="d-inline me-4">Email</strong>
                            <span><strong>:</strong></span>
                            <a href="#"> qwerty@gmail.com</a>
                        </p>

                        <p class="d-flex">
                            <small class="me-1"><i class="bi bi-geo-alt-fill"></i></small>
                            <strong class="d-inline me-4">Lokasi</strong>
                            <span><strong>:</strong></span>
                            <span> <a href="https://goo.gl/maps/qKUtjJDNYS3wyWt59"> Sumber, Slorok, Kec. Garum, Kabupaten Blitar, Jawa Timur 66182</a></span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mt-5 mt-lg-0">
                    <iframe class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.6083640551437!2d112.24399391472751!3d-8.039250494211156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78934aefc63739%3A0x189a5c1763755457!2sKantor%20Desa%20Sidodadi!5e0!3m2!1sen!2sid!4v1674526615610!5m2!1sen!2sid"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section section-padding pt-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">Atau Hubungi Kami melalui Form</h4>
                    </div>

                    <form action="#" method="post" class="custom-form contact-form" role="form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="full-name" id="full-name" class="form-control"
                                        placeholder="Full Name" required="">

                                    <label for="floatingInput">Full Name</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Email address" required="">

                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="text" name="company" id="name" class="form-control"
                                        placeholder="Name" required="">

                                    <label for="floatingInput">Company</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Describe message here"></textarea>

                                    <label for="floatingTextarea">Describe message here</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 ms-auto">
                                <button type="submit" class="form-control">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    {{-- End Of Contact Page --}}
@endsection
