<script src="https://cdn.tailwindcss.com"></script>
@include('header')
<div class="bg-gray-800 text-black pt-[100px] h-auto">
    @if (session('success'))
    <div class="alert alert-success">
       <p id="vanish" class=" text-center py-2 bg-gray-950 text-white"> {{ session('success') }}  <span class="text-white font-bold cursor-pointer"  onclick="crossSign()">X</span></p>
    </div>
@endif

    <p class="text-center text-3xl text-white pt-2 ">Add Rent Information  </p>
   
    <form class="text-center py-10" action="{{url('/rentInfo')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <label for="type" class="text-xl text-white font-mono ">Rent Type</label>
        <select name="type" class="in_put
        mt-3  px-3 py-4    w-[400px] ml-[65px]"  style="border-radius: 10px">
        <option option value="" selected disabled  class="text-gray-700">Select Incident Type</option>
            <option value="Flat">Flat</option>
            <option value="Sublet">Sublet</option>
            <option value="Mess">Mess</option>
            <option value="Car">car</option> 
            <option value="Shop">Shop</option> 
            <option value="Billboard">Billboard</option> 
        </select>

       <br/>
       <label for="name" class="text-xl font-mono text-white">Image of Rent</label>
       <input type="file" name="image" placeholder="Upload Image of Rents"  
       class="mt-3  px-3 py-4  w-[400px] text-white"  style="border-radius: 10px"/><br/>

       <label for="name" class="text-xl mb-2 font-mono text-white">Description</label>
       <textarea cols="40" rows="10" name="description">
       </textarea>
       <br/>

        <label for="name" class="text-xl font-mono text-white">Location</label>
        <input type="text" name="location" placeholder="Enter name of  location"  class="
         mt-3 px-3 py-4 mb-3   w-[400px] ml-[45px]"   style="border-radius: 10px"/>
       <br/>
        
       <label for="type" class="text-xl font-mono text-white">Price Type</label>
       <select name="price_type" class="in_put
       mt-3  px-3 py-4    w-[400px] ml-[15px]"  style="border-radius: 10px">
       <option option value="" selected disabled  class="text-gray-700">Select Price Type</option>
           <option value="Per Hour">Per Hour</option>
           <option value="Per Day">Per Day</option>
           <option value="Per Month">Per Month</option>
           <option value="Per Year">Per Year</option> 
     
       </select>
       <br/>
       <label for="name" class="text-xl font-mono text-white">Price</label>
       <input type="number" name="price" placeholder="Enter price of rent  "  class="
        mt-3 px-3 py-4 mb-3   w-[400px] ml-[70px]"   style="border-radius: 10px"/>
        <input type="hidden" name="rent_id" value="{{$user_id}}"  class="
        mt-3 px-3 py-4 mb-3   w-[400px]"   style="border-radius: 10px"/>
      <br/>
      <label for="name" class="text-xl font-mono text-white">Phone Number</label>
       <input type="number" name="phone" placeholder="Enter your phone number  "  class="
        mt-3 px-3 py-4 mb-3   w-[400px]"   style="border-radius: 10px"/><br/>
        <input type="submit" name="submit" value="Submit" class=" text-[20px] ml-[115px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-gray-950  w-[400px]" style="cursor:pointer"/><br/>
    </form>
</div>   
<script src="slider.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="rent.js"></script>     
@include('footer')