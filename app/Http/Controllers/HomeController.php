<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Rent;
use App\Models\wishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function rent(){
        if(Auth::id()){
            $rents = Rent::all();
           
          return view('user', compact('rents'));
    }else{
        $rents = Rent::all();
        return view('welcome' , compact('rents'));
    }

}

public function incident(){
    $user_id = Auth::user()->id;

    return view('report', compact('user_id'));
}
public function rentInfo(Request $request){
$data = new Rent();
$data->type = $request->type;
$data->price_type = $request->price_type;
$data->price = $request->price;
$data->phoneNumber = $request->phone;
$data->rent_id = $request->rent_id;
$data->location = $request->location;
$data->description = $request->description;

$image = $request->file('image');
$imageName = time() . '.' . $image->getClientOriginalExtension();
$image->move('uploadimage', $imageName);
$data->image = $imageName;
$data->save();
return redirect()->back()->with('success', 'Data has been successfully inserted!');

}

public function rentDetail($id){
   $data = Rent::find($id);
   $isUserInWishlist = wishList::where('rent_id', $id)
        ->where('taken_id', auth()->id())
        ->exists();
   $user_id = Auth::user()->id;
   return view('rentDetail', compact('data', 'user_id', 'isUserInWishlist'));
}

public function rentType($type){
    $rent= Rent::where('type', $type)->get();
   
    $rentInformation = [
        'rent'=>$rent
    ];
    return response()->json($rentInformation);

}
public function rentLocation($location){
    $rent = Rent::where('location', 'LIKE', '%' . $location . '%')->get();
    $rentInfo = [
        'rent'=>$rent
    ];
    return response()->json($rentInfo);
       

}

public function addWish(Request $request){
 $data = new wishList();
 $data->rent_id = $request->id;
 $data->taken_id = $request->taken_id;
 $data->save();
 return redirect()->back()->with('success', 'Successfully added in wishlist!');

}

public function rentPost(){
    $user_id = Auth::user()->id;
    $rents= Rent::where('rent_id', $user_id)->get();
    return view('allRent', compact('rents'));
}

public function update($id){
    $data = Rent::find($id);
    return view('update', compact('data'));

}
public function updateRent(Request $request)
{
    $id = $request->id;
    $data = Rent::find($id);

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploadimage', $imageName);

        // Update image only if a new one is provided
        $data->image = $imageName;
    }

    // Update other fields
    $data->type = $request->type;
    $data->price_type = $request->price_type;
    $data->price = $request->price;
    $data->phoneNumber = $request->phone;
    $data->location = $request->location;
    $data->description = $request->description;

    // Save changes to the database
    $data->save();

    return redirect()->back()->with('success', 'Data has been successfully updated!');
}
public function delete(Request $request){
  $id = $request->id;
  Rent::where('id', $id)->delete();
  wishList::where('rent_id', $id)->delete();
  return redirect()->back()->with('success', 'Rent deleted successfully');
}
public function wishlist(){
   
    $result = DB::table('rents')
    ->select('rents.id as id', 'rents.image', 'rents.rent_id', 'rents.type', 'rents.location',  DB::raw('COUNT(wish_lists.rent_id) as wish_list_count'))
    ->leftJoin('wish_lists', 'rents.id', '=', 'wish_lists.rent_id')
    ->groupBy('rents.id')
    ->get();

    //

    $wishlists = wishList::where('taken_id', auth()->id())->get();

    // Retrieve information for each rent_id from the rent table
    $rentInfos = [];

    foreach ($wishlists as $wishlist) {
        $rentId = $wishlist->rent_id;
        $rentInfo = Rent::find($rentId);

        if ($rentInfo) {
            $rentInfos[] = $rentInfo;
        }
    }
    
    $user_id = Auth::user()->id;
    $rents= Rent::where('rent_id', $user_id)->get();
    return view('wishlist', compact('rentInfos', 'user_id', 'result', 'rents'));    
}


public function cancelWish(Request $request){
    $rentId = $request->id;
        wishList::where('id', $rentId)->delete();
        return redirect()->back()->with('success', 'Successfully Cancelled!');
}


}