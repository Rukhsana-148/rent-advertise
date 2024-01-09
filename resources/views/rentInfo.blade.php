<p class="text-xl text-center text-gray-100 font-semibold mt-4 py-7">Rent Information</p>
<div class="grid grid-cols-3 gap-3 mb-2 mx-2 " id="rentInfo">
    @foreach($rents as $item)
    <div class="card  w-96 bg-gray-500  shadow-2xl font-mono rounded-lg pb-3">
        <figure class="px-10 pt-10">
          <img src="uploadimage\{{$item->image}}" alt="Shoes" class="rounded-xl w-[200px] h-[200px]" />

        </figure>
        <div class="card-body items-center text-center">
          <h2 class="card-title text-2xl">{{$item->type}}</h2>
          <p>{{$item->location}}</p>   <p>{{$item->price_type}}</p> <p>{{$item->price}}Tk</p>
          <div class="card-actions">
           
         <a href="{{url('/rentDetail', $item->id)}}"> <button class="btn bg-gray-950 text-white px-5 py-2 rounded-xl">Detail</button></a>
          </div>
        </div>
      </div>
    @endforeach

</div>
