<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>Pembayaran Berhasil</title>
		<link rel="shortcut icon" href="{{ asset('logo.png') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        <style>
            HTML {
  /*using system font-stack*/
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  font-size: 115%; /*~18px*/
  font-size: calc(12px + (25 - 12) * (100vw - 300px) / (1300 - 300) );
  line-height: 1.5;
  box-sizing: border-box;
}

BODY {
  margin: 0;
  color: #3a3d40;
  background: rgb(252, 252, 252);
}

*, *::before, *::after {
  box-sizing: inherit;
  color: inherit;
}

/*Actual Style*/
 
/*=======================
       C-Container
=========================*/
.c-container {
  max-width: 27rem;
  margin: 1rem auto 0;
  padding: 1rem;
}

/*=======================
       O-Circle
=========================*/

.o-circle {
  display: flex;
  width: 10.555rem; height: 10.555rem;
  justify-content: center;
  align-items: flex-start;
  border-radius: 50%; 
  animation: circle-appearance .8s ease-in-out 1 forwards, set-overflow .1s 1.1s forwards;
}

.c-container__circle {
  margin: 0 auto 5.5rem;
}

/*=======================
    C-Circle Sign
=========================*/
      
.o-circle__sign {
  position: relative;
  opacity: 0;
  background: #fff;
  animation-duration: .8s;
  animation-delay: .2s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: 1;
  animation-fill-mode: forwards;
}

.o-circle__sign::before, 
.o-circle__sign::after {
  content: "";
  position: absolute;
  background: inherit;
}

.o-circle__sign::after {
  left: 100%; top: 0%;
  width: 500%; height: 95%; 
  transform: translateY(4%) rotate(0deg);
  border-radius: 0;
  opacity: 0;
  animation: set-shaddow 0s 1.13s ease-in-out forwards;
  z-index: -1;
}


/*=======================
      Sign Success
=========================*/
 
.o-circle__sign--success { 
  background: rgb(56, 176, 131);
}

.o-circle__sign--success .o-circle__sign {
  width: 1rem; height: 6rem;
  border-radius: 50% 50% 50% 0% / 10%;
  transform: translateX(130%) translateY(35%) rotate(45deg) scale(.11);  
  animation-name: success-sign-appearance;
}

.o-circle__sign--success .o-circle__sign::before {
   bottom: -17%;
   width: 100%; height: 50%; 
   transform: translateX(-130%) rotate(90deg);
   border-radius: 50% 50% 50% 50% / 20%;

}

/*--shadow--*/
.o-circle__sign--success .o-circle__sign::after {
   background: rgb(40, 128, 96);
}
 

/*=======================
      Sign Failure
=========================*/

.o-circle__sign--failure {
  background: rgb(236, 78, 75);
}

.o-circle__sign--failure .o-circle__sign {
  width: 1rem; height: 7rem;
  transform: translateY(25%) rotate(45deg) scale(.1);
  border-radius: 50% 50% 50% 50% / 10%;
  animation-name: failure-sign-appearance;
}

.o-circle__sign--failure .o-circle__sign::before {
   top: 50%;
   width: 100%; height: 100%; 
   transform: translateY(-50%) rotate(90deg);
   border-radius: inherit;
} 

/*--shadow--*/
.o-circle__sign--failure .o-circle__sign::after {
   background: rgba(175, 57, 55, .8);
}


/*-----------------------
      @Keyframes
--------------------------*/
 
/*CIRCLE*/
@keyframes circle-appearance {
  0% { transform: scale(0); }
  
  50% { transform: scale(1.5); }
          
  60% { transform: scale(1); }
  
  100% { transform: scale(1); }
}

/*SIGN*/
@keyframes failure-sign-appearance {         
  50% { opacity: 1;  transform: translateY(25%) rotate(45deg) scale(1.7); }
    
  100% { opacity: 1; transform: translateY(25%) rotate(45deg) scale(1); }
}

@keyframes success-sign-appearance {      
  50% { opacity: 1;  transform: translateX(130%) translateY(35%) rotate(45deg) scale(1.7); }
    
  100% { opacity: 1; transform: translateX(130%) translateY(35%) rotate(45deg) scale(1); }
}
 

@keyframes set-shaddow {
  to { opacity: 1; }
}

@keyframes set-overflow {
  to { overflow: hidden; }
}



/*+++++++++++++++++++
    @Media Queries
+++++++++++++++++++++*/

@media screen and (min-width: 1300px) {
  
  HTML { font-size: 1.5625em; } /* 25 / 16 = 1.5625 */
  
}
        </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - 404 Page-->
			<div class="d-flex flex-column flex-center flex-column-fluid p-10">
                <h1 class="fw-bold mb-10" style="color: #373434">Pembayaran Berhasil !</h1>
                <p>Halaman akan dialihkan dalam 3 detik <p id="count_num"></p></p>
				<!--begin::Illustration-->
                <div class="o-circle c-container__circle o-circle__sign--success">
                    <div class="o-circle__sign"></div>  
                  </div>  
				<img src="{{ asset('assets/media/illustrations/sketchy-1/11.png') }}" alt="" class="mw-100 mb-10 h-lg-450px" />
				<!--end::Illustration-->
				<!--begin::Message-->
				
				<!--end::Message-->
				<!--begin::Link-->
				{{-- <a href="{{ route('dashboard') }}" class="btn btn-primary">Return Home</a> --}}
				<!--end::Link-->
			</div>
			<!--end::Authentication - 404 Page-->
		</div>
    <script>
      var count = 3;
    const timer = setInterval(endCountdown(), 5000);
    function endCountdown() {
      // alert($linkWa)
      window.location.replace('{{ $linkWa }}');
    }

    function handleTimer() {
      if(count === 0) {
        clearInterval(timer);
        endCountdown();
      } else {
        $('#count_num').html(count);
        count--;
      }
    }

    
    </script>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
	
		<!--begin::Global Javascript Bundle(used by all pages)-->
		{{-- <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script> --}}
		{{-- <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script> --}}
		<!--end::Global Javascript Bundle-->
    
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>