

    <script src="{{asset('org/slide')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('org/slide')}}/js/jquery.exzoom.js"></script>
    <link href="{{asset('org/slide')}}/js/jquery.exzoom.css" rel="stylesheet" type="text/css"/>
    <style>

        #exzoom {
            width: 350px;

        }
        .container { max-width: 960px; }

    </style>
</head>

<body>

<div class="container">
    <div class="exzoom hidden" id="exzoom">
        <div class="exzoom_img_box">
            <ul class='exzoom_img_ul'>
                @foreach($content['pics'] as $v )
                    <li><img src="{{$v}}"/></li>
                @endforeach

            </ul>
        </div>
        <div class="exzoom_nav"></div>
        <p class="exzoom_btn">
            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
        </p>
    </div>
</div>

<script type="text/javascript">

    $('.container').imagesLoaded( function() {
        $("#exzoom").exzoom({
            autoPlay: false,
        });
        $("#exzoom").removeClass('hidden')
    });

</script>

