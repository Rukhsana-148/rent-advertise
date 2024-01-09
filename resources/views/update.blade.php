<script src="https://cdn.tailwindcss.com"></script>
@include('header')
<div  class="update bg-gra-500 text-white pt-[100px]">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <p class="text-center text-3xl text-white pt-2">Update Rent Information</p>
   
    <form class="text-center py-10" action="{{url('/updateRent')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <label for="type" class="text-xl font-mono text-white">Rent Type</label>
        <select name="type" class="in_put
        mt-3  px-3 py-4  ml-[50px]  w-[400px]"  style="border-radius: 10px">
     
        <option value="{{$data->type}}">{{$data->type}}</option>
        <option value="Flat">Flat</option>
            <option value="Sublet">Sublet</option>
            <option value="Mess">Mess</option>
            <option value="Car">car</option> 
            <option value="Billboard">Billboard</option> 
        </select>

       <br/>
       <label for="name" class="text-xl font-mono text-white">Image of Rent</label>
       <input type="file" name="image" value="{{$data->image}}"  
       class="mt-3  px-3 py-4  w-[400px]"  style="border-radius: 10px"/><br/>
       <div class="flex justify-center items-center my-2">
       <img src="\uploadimage\{{$data->image}}" alt="Shoes" class="rounded-xl" /><br/>
       </div>
       <label for="name" class="text-xl mb-2 font-mono text-white">Description</label>
       <textarea cols="40" rows="10" name="description">{{$data->description}}
       </textarea>
       <br/>

        <label for="name" class="text-xl font-mono text-white">Location</label>
        <input type="text" name="location" value="{{$data->location}}"  class="
         mt-3 px-3 py-4 mb-3   w-[400px] ml-[45px]"   style="border-radius: 10px"/>
       <br/>
        
       <label for="type" class="text-xl font-mono text-white">Price Type</label>
       <select name="price_type" class="in_put
       mt-3  px-3 py-4    w-[400px] ml-[30px]"  style="border-radius: 10px">
       <option option value="" selected disabled  class="text-gray-700">Select Incident Type</option>
       <option value="{{$data->price_type}}">{{$data->price_type}}</option>
       <option value="Per Hour">Per Hour</option>
           <option value="Per Day">Per Day</option>
           <option value="Per Month">Per Month</option>
           <option value="Per Year">Per Year</option> 
     
       </select>
       <br/>
       <label for="name" class="text-xl font-mono text-white">Price</label>
       <input type="number" name="price" value="{{$data->price}}"  class="
        mt-3 px-3 py-4 mb-3  ml-[77px] w-[400px]"   style="border-radius: 10px"/>
        <input type="hidden" name="id" value="{{$data->id}}"  class="
        mt-3 px-3 py-4 mb-3   w-[400px]"   style="border-radius: 10px"/>
      <br/>
      <label for="name" class="text-xl font-mono text-white">Phone Number</label>
       <input type="number" name="phone" value="{{$data->phoneNumber}}"  class="
        mt-3 px-3 py-4 mb-3   w-[400px] ml-[5px]"   style="border-radius: 10px"/><br/>
        <input type="submit" name="submit" value="Submit" class=" text-[20px] ml-[130px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-gray-950  w-[400px]" style="cursor:pointer"/><br/>
    </form>
</div>        
@include('footer')