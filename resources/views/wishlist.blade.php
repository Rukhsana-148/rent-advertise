<script src="https://cdn.tailwindcss.com"></script>
@include('header')
<div class="">
    <div class="md:grid md:grid-cols-5 gap-5 w-full sm:w-full md:w-screen" style="height : 450px;background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0,0, 0, 0.8)), url('/bg.jpg'); background-repeat:no-repeat ; background-size:cover">
       <div class="md:col-span-3 pt-[10%] sm:pt-[30%] md:pt-[20%]" >
<p class="text-4xl text-white px-10  mt-5 ">Rent Versatile</p>
<p class="text-white pt-3  ml-2 w-[500px] px-10">All types of rent is available here including home, shop, building for industries, car, canvas for advertise etc.</p>
       </div>
    
<div class=" flex  ml-15 pt-[10%]   slider_container  ">
    <div class="slider" id="slider" >
        <img  src="{{ asset('images/car.jpeg') }}" alt="Car Image" width="800px">
        <img  src="{{ asset('images/home.jpeg') }}" alt="Car Image"  width="800px">
        <img  src="{{ asset('images/billboard.jpeg') }}" alt="Car Image"  width="800px">
        <img  src="{{ asset('images/shop.jpeg') }}" alt="Car Image" width="800px">
    </div>
   </div>
        </div>

        <div class="infomation  pt-5 pb-[70px] px-2 bg-slate-500 ">
            @if (session('success'))
            <div class="alert alert-success text-xl text-white py-3 text-center">
                {{ session('success') }}
            </div>
          @endif
          <!-- Variable Declaration -->
         @php
         $count=0
         
         @endphp
           @php
           $rent_id=0
           
           @endphp

            @php
            $total_rent = count($rents);
        @endphp
            <!-- Variable Declaration End-->
            @foreach ($result as $row)
             <!--count-->
            @if($row->wish_list_count>0)
            @php
            $count++
            @endphp
            <!--rent_id-->
           @if($row->rent_id==Auth::user()->id) 
            @php
            $rent_id = 1
            @endphp
            @endif
             <!--rent_id-->
            @endif
                <!--count-->
             @endforeach 
          
@if($rent_id==1)
<p class="font-bold text-2xl px-5 pt-[30px] text-red-900">My Post Wishlist</p>
<div class="bg-red-900 w-full h-1 rounded-xl mx-5 "></div>
@elseif($total_rent==0)
<p id="cross" class="text-red-700 text-center mt-7 py-1 rounded-3xl font-mono px-3 bg-red-400">You have no rent post. <span class="text-white cursor-pointer"  onclick="crossMark()">X</span></p>   
@elseif($rent_id!=Auth::user()->id && $count==0)
<p id="cross" class="text-red-700 text-center mt-7 py-1 rounded-3xl font-mono px-3 bg-red-400">No body add your post to their wishlist. <span class="text-white cursor-pointer"  onclick="crossMark()">X</span></p>

@endif

<div class="grid grid-cols-4 gap-4 px-2 py-4">

          @foreach ($result as $row)       
          @if($row->wish_list_count>0)
         @if($row->rent_id==Auth::user()->id)
        
          <div class="card glass w-full bg-teal-800 rounded-xl text-white  
          shadow-xl px-4 py-5 ">
            <figure><img src="\uploadimage\{{$row->image}}" alt="car!" class=" py-2 w-[200px] h-[200px]"/></figure>
            <div class="card-body">
           
              <h2 class="card-title">{{$row->type}}</h2>
              <p>{{$row->location}}</p>
              <div class="card-actions justify-end">
                <button class="btn bg-gray-300 text-gray-900 px-2 py-1 rounded-2xl"><span class="font-bold text-orange-900">{{$row->wish_list_count}}</span> people add your post in wishlist.</button>
              </div>
            </div>
          </div>
        @endif
         @endif
          @endforeach

</div>
         
          @php
          $total = count($rentInfos);
      @endphp
      @if($total>0)       
      <p class="font-bold text-2xl px-5 pt-[30px] text-red-900">Your Wishlist</p>
          <div class="bg-red-900 w-full h-1 rounded-xl mx-5 "></div>
<div class="grid grid-cols-4 gap-4 px-2 py-[20px]">
  @else
  <p id="crossn" class="text-red-700 text-center mt-7 py-1 rounded-3xl font-mono px-3 bg-red-400">You have no yet any rent to your wishlists.
     <span class="text-white font-bold cursor-pointer"  onclick="crossLet()">X</span></p>
  
  @endif
  


            @foreach($rentInfos as $data)
            <div class="card glass col-span-2 w-full px-10 py-9 rounded-xl text-teal-50 font-mono" style="background:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5))">
                <figure><img src="\uploadimage\{{$data->image}}" alt="car!" class="w-[200px] h-[200px]"/></figure>
                <div class="card-body">
                  <p class="card-title font-semibold text-2xl mt-4">{{$data->type}}</p>
                  <p class="text-xl pt-2 ">{{$data->description}}</p>
                  <p class="text-xl pt-2 ">Location : {{$data->location}}</p>
                  <p class="text-xl pt-2 ">{{$data->price_type}}-{{$data->price}}</p>
                  <p class="text-xl pt-2 ">To Contact : {{$data->phoneNumber}}</p>
                  <div class="card-actions justify-end">
                   
        {{-- User has not taken this rent --}}
        <form action="{{url('/cancelWish')}}" method="post" enctype="multipart/form-data"  >
          @csrf
       
          <input type="hidden" value="{{$data->id}}" name="id"/>
          <input type="submit" name="submit" value="Cancel from WISHLIST" class="btn bg-red-500  hover:bg-red-700 px-3 py-1 rounded-2xl mt-3"/>
              </form>
                  </div>
                </div>
              </div>
        @endforeach
       
</div>
</div>
</div>
<script src="slider.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="rent.js"></script>
@include('footer')