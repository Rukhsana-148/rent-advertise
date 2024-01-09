<script src="https://cdn.tailwindcss.com"></script>

@include('header')
<div class="">
    <div class="md:grid md:grid-cols-5 gap-5 w-full sm:w-full md:w-screen" style="height : 450px;background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0,0, 0, 0.6)), url('bg.jpg'); background-repeat:no-repeat ; background-size:cover">
       <div class="md:col-span-4 pt-[10%] sm:pt-[30%] md:pt-[20%]" >
<p class="text-4xl text-white px-10  mt-5 ">Rent Advertise</p>
<p class="text-white pt-3  ml-2 w-[500px] px-10">All types of rent is available here including home, shop, building for industries, car, canvas for advertise etc.</p>
<div class="flex px-10">
    <select class="bg-transparent border-solid border-2 border-gray-100  text-teal-900 rounded-[25px] outline-none focus:outline-none px-4 py-3 mt-2 w-[250px]" id="selectType">
        <option value="Flat">Flat</option>
            <option value="Sublet" >Sublet</option>
            <option value="Mess" >Mess</option>
            <option value="Car" >car</option> 
            <option value="Billboard" >Billboard</option> 
      </select>
      <input type="text" id="locationInput"  class="bg-transparent border-solid border-2 border-gray-100 ml-2 text-white rounded-[25px] outline-none focus:outline-none px-4 py-3 mt-2 w-[250px]"/>

</div>
</div>
    
<div class=" ml-15 pt-[10%]   slider_container  ">
    <div class="slider flex" id="slider" >
        <img  src="{{ asset('images/car.jpeg') }}" alt="Car Image" width="800px">
        <img  src="{{ asset('images/home.jpeg') }}" alt="Car Image"  width="800px">
        <img  src="{{ asset('images/billboard.jpeg') }}" alt="Car Image"  width="800px">
        <img  src="{{ asset('images/shop.jpeg') }}" alt="Car Image" width="800px">
    
    </div>
   
   
    
   </div>
        </div>
        <div class="infomation bg-gray-800">

@include('rentInfo')   
</div>
</div>
<script src="slider.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="user.js"></script>
@include('footer')