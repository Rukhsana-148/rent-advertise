$(document).ready(function() {
    $('#selectType').on('change', function() {
        var selectedValue = $(this).val();
        console.log(selectedValue);
        $.ajax({
            url: '/rentType/' + selectedValue,
            type: 'GET',
            success: function(data) {
                console.log(data);
                console.log(data.rent.location);


                // Clear previous content before appending new items
                $('#rentInfo').empty();



                // hall
                $.each(data.rent, function(key, item) {
                    $('#rentInfo').append(`
                    <div class="card  w-96 bg-gray-500  shadow-2xl font-mono rounded-lg pb-3">
                    <figure class="px-10 pt-10">
                      <img src="uploadimage/${item.image}" alt="Shoes" class="rounded-xl w-[200px] h-[200px]" />
            
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title text-2xl">${item.type}</h2>
                      <p>${item.location}</p>   <p>${item.price_type}</p> <p>${item.price}Tk</p>
                      <div class="card-actions">
                     <a href="${window.location.origin}/rentDetail/${item.id}"> <button class="btn bg-gray-950 text-white px-5 py-2 rounded-xl">Detail</button></a>
                      </div>
                    </div>
                  </div>
          
                    `);
                })

                //manager


                // List


                // Trailers





            },
        });
    })

    //location

    $('#locationInput').on('input', function() {
        var location = $(this).val();

        // Make an AJAX request to the Laravel backend
        $.ajax({
            url: '/rentLocation/' + location,
            type: 'GET',
            success: function(data) {
                // Update the card with the retrieved information
                console.log(data);
                console.log(data.rent.location);


                // Clear previous content before appending new items
                $('#rentInfo').empty();



                // hall
                $.each(data.rent, function(key, item) {
                    $('#rentInfo').append(`
                    <div class="card  w-96 bg-gray-500  shadow-2xl font-mono rounded-lg pb-3">
                    <figure class="px-10 pt-10">
                      <img src="uploadimage/${item.image}" alt="Shoes" class="rounded-xl w-[200px] h-[200px]" />
            
                    </figure>
                    <div class="card-body items-center text-center">
                      <h2 class="card-title text-2xl">${item.type}</h2>
                      <p>${item.location}</p>   <p>${item.price_type}</p> <p>${item.price}Tk</p>
                      <div class="card-actions">
                      <a href="${window.location.origin}/rentDetail/${item.id}"> <button class="btn bg-gray-950 text-white px-5 py-2 rounded-xl">Detail</button></a>
                      </div>
                    </div>
                  </div>
          
                    `);
                })
            },
            error: function() {
                console.log('Error fetching rent information');
            }
        });
    });
    //without login

});