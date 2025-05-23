    <html class="js serviceworker adownload cssanimations csstransitions webp exiforientation webp-alpha webp-animation webp-lossless" dir="LTR" loc="en" lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WhatsApp</title>
        <style>
          ._1ADa8:after{
            content: " " !important;
            background: transparent !important;
            width: 0 !important;
          }
          #initial_startup {
            --startup-background: #f0f2f5;
            --startup-background-rgb: 240, 242, 245;
            --startup-icon: #bbc5cb;
            --secondary-lighter: #8696a0;
            --primary-title: #41525d;
            --progress-primary: #00c298;
            --progress-background: #e9edef
          }

          .dark #initial_startup {
            --startup-background: #111b21;
            --startup-background-rgb: 17, 27, 33;
            --startup-icon: #676f73;
            --primary-title: rgba(233, 237, 239, 0.88);
            --secondary-lighter: #667781;
            --progress-primary: #0b846d;
            --progress-background: #233138
          }

          #app{
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            overflow: hidden
          }

          #initial_startup {
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            user-select: none;
            background-color: var(--startup-background)
          }

          #initial_startup .graphic {
            margin-top: -40px;
            color: #bbc5cb
          }

          #initial_startup .graphic .resume-logo {
            transform: translateX(calc(50% - 52px / 2))
          }

          #initial_startup .graphic::after {
            position: relative;
            top: -100%;
            left: calc(50% - 72px * 2 - 72px / 2);
            display: block;
            width: calc(72px * 3);
            height: 100%;
            content: '';
            background: linear-gradient(to right, rgba(var(--startup-background-rgb), .5) 0, rgba(var(--startup-background-rgb), .5) 33.33%, rgba(var(--startup-background-rgb), 0) 44.1%, rgba(var(--startup-background-rgb), 0) 55.8%, rgba(var(--startup-background-rgb), .5) 66.66%, rgba(var(--startup-background-rgb), .5) 100%);
            opacity: 1;
            animation: shimmer 1.5s linear .6s infinite
          }

          html[dir=rtl] #initial_startup .graphic::after {
            animation-direction: reverse
          }

          #initial_startup .progress {
            position: relative;
            width: 420px;
            height: 3px;
            margin-top: 40px
          }

          #initial_startup .progress progress {
            vertical-align: top
          }

          #initial_startup .main {
            margin-top: 40px;
            font-size: 17px;
            color: var(--primary-title)
          }

          #initial_startup .secondary {
            margin-top: 12px;
            font-size: 14px;
            color: var(--secondary-lighter)
          }

          #initial_startup .secondary span {
            display: inline-block;
            margin-bottom: 2px;
            vertical-align: middle
          }

          progress {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 3px;
            margin: 0;
            color: var(--progress-primary);
            background-color: var(--progress-background);
            border: none
          }

          progress[value]::-webkit-progress-bar {
            background-color: var(--progress-background)
          }

          progress[value]::-moz-progress-bar,
          progress[value]::-webkit-progress-value {
            background-color: var(--progress-primary);
            transition: width .45s ease
          }
        </style>

        <link href="{{asset('assets/whatsweb/style.css')}}" rel="stylesheet">
        {{-- <link href="{{asset('assets/whatsweb/bootstrap.css')}}" rel="stylesheet"> --}}
        <style>
          body {
              font-family: Segoe UI,Helvetica Neue,Helvetica,Lucida Grande,Arial,Ubuntu,Cantarell,Fira Sans,sans-serif;
              color: var(--primary);
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
              text-rendering: optimizeLegibility;
              font-feature-settings: "kern";
              background-color: #f0f2f5;
              background-image: linear-gradient(180deg,var(--app-background),var(--app-background-deeper));
              margin: 0;
          }
          html[dir] ._1INL_ {
              background-color: #f0f2f5;
          }
          ._1ADa8 {
              width: 100%;
              height: 100%;
              overflow: hidden;
          }
          ._1INL_ {
            margin: 22% 43%;
            width: 320px;
          }
          html[dir] ._26aja {
              margin-top: -40px;
          }
          svg {
              display: block;
              pointer-events: none;
          }
          html[dir] progress._35Zb2 {
              background-color: #e9edef
          }
          progress._35Zb2 {
              color: #e9edef;
          }
          html[dir] ._2dfCc {
              margin-top: 40px;
          }
          ._2dfCc {
              font-size: 17px;
              color: var(--primary-title);
              transition: opacity .2s ease-in-out;
              text-align: center;
          }
          html[dir] ._2e4Ei {
              margin-top: 12px;
          }

          ._2e4Ei {
              font-size: 14px;
              color: var(--secondary-lighter);
              transition: opacity .2s ease-in-out;
              text-align: center;
          }

          html[dir] ._2e4Ei span {
              margin-bottom: 2px;
          }
          ._2e4Ei span {
              display: inline-block;
              vertical-align: middle;
          }
          
          ._26aja {
              margin-left: 130px;
              color: #bbc5cb;
          }
          ._2FX6G .WD35o, ._2FX6G ._26aja ._2pp-n, ._2FX6G ._26aja ._1JPfm, ._2FX6G ._3iu7m {
              opacity: 0;
          }
          html[dir] ._2dfCc {
              margin-top: 40px;
          }

          ._2dfCc {
              font-size: 17px;
              color: #41525d;
              transition: opacity .2s ease-in-out;
          }
          html[dir] ._2e4Ei {
              margin-top: 12px;
          }

          ._2e4Ei {
              font-size: 14px;
              color: #8696a0;
              transition: opacity .2s ease-in-out;
          }
        </style>
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('/assets/whatsweb/bootstrap-main.css')}}"> --}}
      </head>
      <body class="web">
        <div id="app">
          <div class="_1ADa8 app-wrapper-web font-fix">
            <div class="_1INL_ _2FX6G">
              <div class="_26aja _1dEQH">
                <span>
                  <svg width="250px" height="52px" viewBox="0 0 250 52" version="1.1" xmlns="http://www.w3.org/2000/svg"><g class="_2pp-n"><circle fill="#B6B6B6" cx="65.7636689" cy="21.1046108" r="3.65625"></circle><circle fill="#B6B6B6" cx="81.0791876" cy="19.3283142" r="3.65625"></circle><circle fill="#B6B6B6" cx="96.3947063" cy="17.7846275" r="3.65625"></circle><circle fill="#B6B6B6" cx="111.710225" cy="17.5274031" r="3.65625"></circle><circle fill="#B6B6B6" cx="127.025744" cy="17.6118619" r="3.65625"></circle><circle fill="#B6B6B6" cx="142.341262" cy="18.4196288" r="3.65625"></circle><circle fill="#B6B6B6" cx="157.656781" cy="19.9893339" r="3.65625"></circle><circle fill="#B6B6B6" cx="172.9723" cy="22.0657859" r="3.65625"></circle></g><path class="_1JPfm" d="M190.14097 4.7518926h48.227869l.281462-.00596781c1.058365-.00288774 2.664865.25185461 2.695721 2.87464716.142823 12.13996425 0 22.28077555 0 34.40910725 0 .06028-.024112.168784-.036168.217008l-16.394805-.0086927c-12.47317.0007215-24.136918.0136044-37.78743-.0033633l-.010915-6.2953341c-.030319-9.5718533-.105914-18.2714581.010915-28.31872515.033356-2.86867935 1.976535-2.91690333 3.013351-2.86867935zm20.097267 4.28597465l-19.256815-.00079524.002426 4.98254029c-.000422 6.5558423-.012657 12.8111695-.002954 19.3619492l.011919 4.9777941h46.536157l.008754-4.9777414c.010547-8.1882109.002637-15.913459.002637-24.3331514l-27.302124-.01059555zM179.195421 44.6572387c.397848-.036168.807752-.024112 1.2056-.024112 9.620684 0 19.241369-.012056 28.862053 0 .132616.4701838.54252 1.6393289 1.036816 1.6393289 3.255119.012056 4.510238 0 7.765357 0 .542519.036168.988591-1.1450331 1.133263-1.6513849 9.910029 0 19.820057.012056 29.730086.012056.084392.012056.265232.036168.349624.048224-.016075.2571945-.016075 1.0085894 0 2.2541846 0 1.4209691-1.193544 1.8201689-1.965128 2.1215688-.421959.1205599-.868031.1326159-1.289991.1928959h-63.560505c-.651024-.072336-1.350272-.108504-1.916904-.4701838-.566631-.2893439-1.000647-.7595278-1.350271-1.2779356v-2.8446419z" fill="currentColor"></path><path class="_35GDA" d="M37.7314595,31.1612046 C37.0876293,30.8391042 33.9223475,29.2816062 33.332139,29.0666255 C32.7419305,28.8517683 32.3127104,28.7444016 31.8834903,29.3887258 C31.4542703,30.0332973 30.2204788,31.4835521 29.8447567,31.91339 C29.4692818,32.3428571 29.0936834,32.3968494 28.4499768,32.0745019 C27.8060232,31.7521544 25.7314595,31.0723707 23.272278,28.8787027 C21.3582085,27.171583 20.0661004,25.0632896 19.6905019,24.4185946 C19.315027,23.7741467 19.6505946,23.4257297 19.9729421,23.1046178 C20.2625483,22.8161235 20.6167722,22.352556 20.9386255,21.9767104 C21.2606023,21.6007413 21.3678456,21.3320154 21.5824556,20.9026718 C21.7970657,20.472834 21.6898224,20.0968649 21.528834,19.7746409 C21.3678456,19.452417 20.0801853,16.2831815 19.543722,14.993915 C19.0210965,13.7387491 18.4903166,13.9087567 18.0950733,13.8887413 C17.7199691,13.870085 17.2902548,13.8661313 16.8611583,13.8661313 C16.4319382,13.8661313 15.7343629,14.0272433 15.144278,14.6716911 C14.5540695,15.3163861 12.8908108,16.8740077 12.8908108,20.0429961 C12.8908108,23.2121081 15.1978996,26.2734826 15.5198765,26.7031969 C15.8417297,27.1330348 20.0597992,33.6360772 26.5184865,36.4250193 C28.05461,37.0883707 29.2539305,37.4846023 30.1888494,37.7811274 C31.7312742,38.2713822 33.1348263,38.2021931 34.2440772,38.0363861 C35.4810811,37.8515521 38.0533127,36.478888 38.5898996,34.9750116 C39.1263629,33.470888 39.1263629,32.1818687 38.9653745,31.91339 C38.8045097,31.6447876 38.3752896,31.4835521 37.7314595,31.1612046 M25.9838765,47.2013591 L25.9752278,47.2013591 C22.1322625,47.1998763 18.3629343,46.1674749 15.0745946,44.2160926 L14.2926332,43.7519074 L6.18674906,45.8782394 L8.35027028,37.9751042 L7.84111198,37.1648494 C5.69723552,33.7549343 4.56500386,29.8139923 4.56660833,25.767166 C4.57130502,13.9587954 14.1789652,4.35187645 25.9924016,4.35187645 C31.7128649,4.35385328 37.0902239,6.58458689 41.1338378,10.6327722 C45.1773282,14.680834 47.4028724,20.0618996 47.4007737,25.7843398 C47.3959539,37.5936988 37.7882934,47.2013591 25.9838765,47.2013591 M44.2112742,7.556695 C39.3464092,2.68614672 32.8767258,0.00271814672 25.9836293,0 C11.7809421,0 0.221652509,11.5584247 0.215969112,25.7654363 C0.21411583,30.3069652 1.40058687,34.7397683 3.65553668,38.6475984 L-4.61852778e-14,52 L13.6596757,48.4167413 C17.4233205,50.4695597 21.6607876,51.5516293 25.9733745,51.5531121 L25.9838765,51.5531121 L25.984,51.5531121 C40.1852046,51.5531121 51.7456062,39.9934517 51.7512912,25.7860695 C51.7538842,18.9011274 49.0761392,12.4271197 44.2112742,7.556695" fill="currentColor"></path>
                  </svg>
                </span>
              </div>
              <div class="g0rxnol2 lk9bdx0e d9lyu8cj qlylaf53 d4g41f7d">
                <progress value="0" max="100" class="_35Zb2"></progress>
              </div>
              <div class="_2dfCc">WhatsApp</div>
              <div class="_2e4Ei">
                <span>
                  <svg width="10px" height="12px" viewBox="0 0 10 12" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M5.00847986,1.6 C6.38255462,1.6 7.50937014,2.67435859 7.5940156,4.02703389 L7.59911976,4.1906399 L7.599,5.462 L7.75719976,5.46214385 C8.34167974,5.46214385 8.81591972,5.94158383 8.81591972,6.53126381 L8.81591972,9.8834238 C8.81591972,10.4731038 8.34167974,10.9525438 7.75719976,10.9525438 L2.25767996,10.9525438 C1.67527998,10.9525438 1.2,10.4731038 1.2,9.8834238 L1.2,6.53126381 C1.2,5.94158383 1.67423998,5.46214385 2.25767996,5.46214385 L2.416,5.462 L2.41679995,4.1906399 C2.41679995,2.81636129 3.49135449,1.68973395 4.84478101,1.60510326 L5.00847986,1.6 Z M5.00847986,2.84799995 C4.31163824,2.84799995 3.73624912,3.38200845 3.6709675,4.06160439 L3.6647999,4.1906399 L3.663,5.462 L6.35,5.462 L6.35111981,4.1906399 C6.35111981,3.53817142 5.88169076,2.99180999 5.26310845,2.87228506 L5.13749818,2.85416626 L5.00847986,2.84799995 Z" fill="currentColor"></path>
                  </svg>
                </span>&nbsp; End-to-end encrypted
              </div>
            </div>
          </div>
        </div>
      </body>
    </html>