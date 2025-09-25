<section class="contact-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 order-2 order-md-1">
                <div class="contact-form-box wow fadeInLeft" data-wow-delay=".3s">
                    <div class="section-header">
                        <h2 class="section-title">Let’s work together!</h2>
                        <p>I design and code beautifully simple things and i love what i do. Just simple like that!</p>
                    </div>
                    {{-- $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('phone');
                $table->text('message');    
                $table->integer('status')->default('0');
                $table->integer('services_cat_id')->default('0'); --}}
                    <div class="tj-contact-form">
                        <form  action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="text" name="first_name" class="form-control" id="conName"
                                            placeholder="First name" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="text" name="last_name" class="form-control" id="conLName"
                                            placeholder="Last name" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="email" name="email" class="form-control" id="conEmail"
                                            placeholder="Email address" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form_group">
                                        <input type="tel" name="phone" class="form-control" id="conPhone"
                                            placeholder="Phone number" autocomplete="off" />
                                    </div>
                                </div>
                                @php
                                    $servicesCats = \App\Models\Services::all();
                                @endphp
                                <div class="col-12">
                                    <div class="form_group">
                                        <select name="services_cat_id" id="conService"
                                            class="form-control tj-nice-select">
                                            <option value="" selected disabled>Choose Service</option>
                                            @foreach ($servicesCats as $servicesCat)
                                                <option value="{{ $servicesCat->id }}">{{ Str::ucfirst($servicesCat->service_title) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form_group">
                                        <textarea name="message" class="form-control" id="conMessage" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form_btn">
                                        <button type="submit" class="btn tj-btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1 col-md-5 d-flex flex-wrap align-items-center order-1 order-md-2">
                <div class="contact-info-list">
                    <ul class="ul-reset">
                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                            data-wow-delay=".4s">
                            <div class="icon-box">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="text-box">
                                <p>Phone</p>
                                <a href="tel:0123456789">+ 234 814 069 9104</a>
                            </div>
                        </li>
                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                            data-wow-delay=".5s">
                            <div class="icon-box">
                                <i class="flaticon-mail-inbox-app"></i>
                            </div>
                            <div class="text-box">
                                <p>Email</p>
                                <a href="mailto:mustaphajnamadi@gmail.com">mustaphajnamadi@gmail.com</a>
                            </div>
                        </li>
                        <li class="d-flex flex-wrap align-items-center position-relative wow fadeInRight"
                            data-wow-delay=".6s">
                            <div class="icon-box">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="text-box">
                                <p>Address</p>
                                <a href="#">Warne Park Street Pine, <br />Kaduna.</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
