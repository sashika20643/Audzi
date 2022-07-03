<div class="container">
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                      
                        <h2>Latest Albums</h2>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach ($playlists as $item)
                            
                        
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('plist_images/').'/'.$item->image }}" alt="" width="300" height="250">
                            <div class="album-info">
                                <a href="#">
                                    <h5>{{ $item->name }}</h5>
                                </a>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                        @endforeach
{{-- 
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('assets/img/bg-img/a2.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Sam Smith</h5>
                                </a>
                                <p>Underground</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('assets/img/bg-img/a3.jpg') }}"alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Will I am</h5>
                                </a>
                                <p>First</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('assets/img/bg-img/a4.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Cure</h5>
                                </a>
                                <p>Second Song</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('assets/img/bg-img/a5.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>DJ SMITH</h5>
                                </a>
                                <p>The Album</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('assets/img/bg-img/a6.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Ustopable</h5>
                                </a>
                                <p>Unplugged</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('assets/img/bg-img/a7.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Beyonce</h5>
                                </a>
                                <p>Songs</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>