<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Advertise</title>
    <link href="main.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="movie.js" type="text/javascript"></script>
    
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<style>

  .slider_container {
  position: relative;

  margin: auto;
  overflow: hidden;
}

.slider {
  
  display: flex;
  transition: transform 0.5s ease-in-out;
}

img {
  
  border-radius : 20px;
  margin-left: 10px;
  height: auto;
}

</style>

  </head>

<body>
  <div class="bg-black h-20 py-6 px-2  fixed z-10  grid grid-cols-5 gap-2  w-screen sm:w-full md:w-screen">
    <div class="col-span-2">
      <li class="-mt-[60px] mr-2">  <img src="{{ asset('images/logo.png') }}" width="166px" /> </li>
    </div>
 
    <div class="col-span-3">
        <ul class="flex">
          <li class="mt-3 mr-2">  <a href="http://127.0.0.1:8000" class=" text-white px-4">Home</a></li>
            @if (Route::has('login'))
            
            @auth
           
            <li class="mt-3 mr-5">  <a href="{{url('/addRent')}}" class=" text-white">Add Rent</a></li>
            <li class="mt-3 mr-5">  <a href="{{url('/myRentPost')}}" class=" text-white">Rent Post</a></li>
            <li class="mt-3 ">  <a href="{{url('/wishlist')}}" class=" text-white">Wishlist</a></li>
            @include('dashboard')
                @else
               <li class="px-4 text-white   text-[15px]  mt-3 font-mono "> <a href="{{ route('login') }}" class="pr-5 pt-10 text-white font-mono text-[17px] ml-5 hover:text-orange-600">Login</a><li>
                 @if (Route::has('register'))
               <li class="px-4 text-white   text-[17px]  mt-3 font-mono "> <a href="{{ route('register') }}" class="pr-5  text-white font-mono text-[17px] ml-5 hover:text-orange-600 pt-10">Register</a></li>
              @endif
        @endauth
        @endif
        </ul>
    </div>
   
  </div>