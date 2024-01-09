<p class="text-2xl text-center text-white font-semibold mt-4 py-7">Rent Information</p>
<div class="grid grid-cols-3 gap-3 mb-2 mx-2" id="rentInfo">
    @foreach($rents as $item)
    <div id="rentInfo" class="card rentInfo w-96 bg-gray-500  shadow-2xl font-mono rounded-lg pb-3">
        <figure class="px-10 pt-10 rentImg">
          <img src="uploadimage\{{$item->image}}" alt="Shoes" class="rounded-xl w-[200px] h-[200px]" />
          
        </figure>
        <div class="card-body items-center text-center">
          <h2 class="card-title text-2xl" id="rentType">{{$item->type}}</h2>
          <p>{{$item->location}}</p>   <p>{{$item->price_type}}</p> <p>{{$item->price}}Tk</p>
          <div class="card-actions">
          <button class="btn bg-gray-950 text-white px-5 py-2 rounded-xl">Signin to See Detail</button>
          </div>
        </div>
      </div>
    @endforeach
<!--Location search-->

</div>
