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
        
<div class="rentInfo md:w-screen">
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
    <div class="grid grid-cols-4 gap-4 pt-5 pb-[70px] bg-slate-500 px-2">
       @foreach($rents as $data)

        <div class="card glass myrent col-span-2 w-full px-4 py-9 
        rounded-xl text-teal-50 font-mono" style="background:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5))">
            <figure><img src="\uploadimage\{{$data->image}}" alt="car!" class="w-[300px] h-[300px]"/></figure>
            <div class="card-body">
              <p class="card-title font-semibold text-2xl mt-4">{{$data->type}}</p>
              <p class="text-xl pt-2 ">{{$data->description}}</p>
              <p class="text-xl pt-2 ">Location : {{$data->location}}</p>
              <p class="text-xl pt-2 ">{{$data->price_type}}:{{$data->price}}</p>
              <p class="text-xl pt-2 ">To Contact : {{$data->phoneNumber}}</p>
              <div class="card-actions flex mt-3">
               
   
      <a href="{{url('/update', $data->id)}}" class="bg-gray-950 mr-4  hover:bg-red-700  px-4 rounded-2xl pt-1  h-[35px] ">UPDATE</a>
          </form>
          <form action="{{url('/delete')}}" method="post" enctype="multipart/form-data ">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="id"/>
            <input type="submit" name="submit" value="DELETE" class="btn bg-red-500  hover:bg-red-700 px-3 py-1 rounded-2xl "/>
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