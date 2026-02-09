<!--Galery Section-->
<section id="galery" class="galery section">
    <!--Section Title-->
    <div class="container section-title" data-aos="fade-up">
        <h2>Galery</h2>
    </div><!--End Section Title-->

    <style>
        .galery-item {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .galery-item-img {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            height: 280px;
            background-color: #f5f5f5;
            margin-bottom: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .galery-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .galery-item-img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .galery-item-img:hover img {
            transform: scale(1.08);
        }

        .galery-item-info {
            padding: 15px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .galery-item-info h4 {
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            line-height: 1.4;
        }

        .galery-item-info p {
            margin: 0;
            font-size: 13px;
            color: #666;
            line-height: 1.5;
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .galery-item-img {
                height: 220px;
            }
        }

        @media (max-width: 576px) {
            .galery-item-img {
                height: 200px;
            }
        }
    </style>

    <div class="container">
        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            @if ($galeries && count($galeries) > 0)
                @foreach ($galeries as $galery)
                    <div class="col-lg-4 col-md-6 galery-item isotope-item">
                        <div class="galery-item-img">
                            <img src="{{ asset('storage/' . $galery->gambar) }}" alt="{{ $galery->nama }}" class="img-fluid">
                        </div>
                        <div class="galery-item-info">
                            <h4>{{ $galery->nama }}</h4>
                            @if ($galery->deskripsi)
                                <p>{{ $galery->deskripsi }}</p>
                            @endif
                        </div>
                    </div><!-- End galery Item -->
                @endforeach
            @else
                <div class="col-lg-12 text-center">
                    <p>Tidak ada galeri yang tersedia</p>
                </div>
            @endif
        </div>
    </div>
</section><!--End Galery Section-->

