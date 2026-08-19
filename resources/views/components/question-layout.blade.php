<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Maria Skłodowska-Curie -->
</div><!doctype html>

<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="copyright" content="" />
    <link rel="icon" href="{{ asset('build/assets/images/icon.svg') }}">
    <!-- <link rel="stylesheet" href="build/assetscss/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="build/assetscss/bootstrap-rtl.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/animate/animate.css') }}">
    <!-- owl slider CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/plugins/owlslider/assets/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('build/assets/plugins/fancybox/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="build/assets/css/style-en.css"> -->

</head>

<body>

    <!-- pre-loader -->
    <section class="pre-loader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </section>
    <!-- pre-loader -->


    <div class="side-overlay"></div>
    <!-- Side Menu -->

    <div class="q-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <figure class="mb-0">
                    <img src="build/assets/images/logo.svg" alt="" srcset="">
                </figure>

                <a href="#" class="btn close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14.957" height="14.957" viewBox="0 0 14.957 14.957">
                        <path id="Icon_color" data-name="Icon color"
                            d="M14.772,13.014a.623.623,0,0,1,0,.885l-.873.873a.623.623,0,0,1-.885,0L7.478,9.236,1.942,14.772a.623.623,0,0,1-.885,0L.184,13.9a.623.623,0,0,1,0-.885L5.72,7.478.184,1.942a.623.623,0,0,1,0-.885L1.057.184a.623.623,0,0,1,.885,0L7.478,5.72,13.014.184a.623.623,0,0,1,.885,0l.873.873a.623.623,0,0,1,0,.885L9.236,7.478Z"
                            fill="#171725" />
                    </svg>

                </a>
            </div>
        </div>v
    </div>


    {{ $slot }}

      <div class="footer-q">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="d-flex justify-content-between align-items-end">
                        <a href="{{ $prev ?? '#' }}" class="btn cs-btn prev">السابق</a>
                        <button type="submit" form="{{ $formId ?? 'question-form' }}" class="btn cs-btn v2 next">التالي</button>
                    </div>
                </div>
            </div>
        </div>
       
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('build/assets/js/jquery.min.js') }}"></script>
    <!-- <script src="assets/js/popper.min.js"></script> -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="{{ asset('build/assets/plugins/owlslider/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/animate/wow.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.8.1/lottie_svg.min.js"
        integrity="sha512-jk2H6cbspEVLyLHIJkHcwiHqh7sQuyrBJvHKokFyKebzaRZiA7RmcbAo7KvM3GqFaLJJGDFC/gBMYzbeeS7KUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('build/assets/js/main.js') }}"></script>

    <!-- <script src="assets/js/scripts.js"></script> -->
    <!-- <script src="assets/js/scripts-en.js"></script> -->
</body>

</html>