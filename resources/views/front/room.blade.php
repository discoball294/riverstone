<section class="body-content gray-bg">


    <div class="container">
        <div class="row ">

            <div class="col-md-12">
                <div class="portfolio-nav-row">
                    <div class="portfolio-nav left">

                    </div>
                </div>
            </div>


            <div class="m-bot-100">
                <div class="col-md-8">
                    <div class="full-width">
                        <div class="post-slider post-img text-center">

                            <div class="flex-viewport">
                                <ul class="slides">
                                    @foreach($tipe_kamar->gambar as $gambar)
                                        <li class="">
                                            <a href="javascript:;" title="Freshness Photo"><img
                                                        src="{{ asset($gambar->url) }}" alt=""
                                                        draggable="false"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <ul class="flex-direction-nav">
                                <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a>
                                </li>
                                <li class="flex-nav-next"><a class="flex-next" href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="heading-title-side-border text-left">
                        <h4 class="text-uppercase">{{ $tipe_kamar->nama }}</h4>
                        <div class="title-border-container">
                            <div class="title-border"></div>
                        </div>
                    </div>
                    <p>
                        {{ $tipe_kamar->deskripsi }}
                    </p>
                    <p>
                        <b>Max Guest: {{ $tipe_kamar->max_person }}</b>
                    </p>
                    @php($fasilitas = $tipe_kamar->fasilitas)
                    <ul class="m-bot-30">
                        @foreach($fasilitas as $f)
                            <li>{{ $f->fasilitas }}</li>
                        @endforeach
                    </ul>
                    <br>
                    <ul class="portfolio-meta m-bot-30">
                        <li><span> Check In </span> 14.00</li>
                        <li><span> Check Out </span> 12.00</li>
                    </ul>
                    <div>
                        <p>

                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>



</section>