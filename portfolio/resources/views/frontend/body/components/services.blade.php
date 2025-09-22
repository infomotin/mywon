<section class="services-section" id="services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Quality Services</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        We put your ideas and thus your wishes in the form of a unique web project that inspires you and
                        you customers.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @php
                    $services = \App\Models\Services::all();
                @endphp
                <div class="services-widget position-relative">
                    @foreach ($services as $service)
                        <div class="service-item current d-flex flex-wrap align-items-center wow fadeInUp"
                            data-wow-delay=".5s">
                            <div class="left-box d-flex flex-wrap align-items-center">
                                <span class="number">{{ $loop->iteration }}</span>
                                <h3 class="service-title">{{ $service->service_title }}</h3>
                            </div>
                            <div class="right-box">
                                <p>
                                    {{ $service->service_description }}
                                </p>
                            </div>
                            <i class="flaticon-up-right-arrow"></i>
                            <button data-mfp-src="#service-wrapper" class="service-link modal-popup"
                                data-service-id="{{ $service->id }}"></button>
                        </div>
                    @endforeach
                    <div class="active-bg wow fadeInUp" data-wow-delay=".5s"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.service-link', function() {
            let serviceId = $(this).data('service-id');
            $.get('/service/' + serviceId + '/popup', function(data) {
                $.magnificPopup.open({
                    items: {
                        src: data,
                        type: 'inline'
                    }
                });
            });
        });
    </script>
</section>
