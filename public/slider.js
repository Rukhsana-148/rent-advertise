let currentSlide = 0;
const slides = document.getElementById("slider").children;
const totalSlides = slides.length;

function showSlide(index) {
    if (index < 0) {
        currentSlide = totalSlides - 1;
    } else if (index >= totalSlides) {
        currentSlide = 0;
    } else {
        currentSlide = index;
    }

    const offset = -currentSlide * 100 + '%';
    document.getElementById('slider').style.transform = `translateX(${offset})`;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

// Automatically change slide every 2 seconds
setInterval(nextSlide, 2000);


document.addEventListener('DOMContentLoaded', function() {
    var selectType = document.getElementById('selectType');
    selectType.addEventListener('change', function() {
        var selectedValue = this.value;
        console.log(selectedValue);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/rentType/' + selectedValue, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                console.log(data.rent.location);

                // Clear previous content before appending new items
                var rentInfo = document.getElementById('rentInfo');
                rentInfo.innerHTML = '';

                // Loop through rent items
                data.rent.forEach(function(item) {
                    var card = document.createElement('div');
                    card.className = 'card w-96 bg-gray-500 shadow-2xl font-mono rounded-lg pb-3';

                    card.innerHTML = `
                        <figure class="px-10 pt-10">
                            <img src="uploadimage/${item.image}" alt="Shoes" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">${item.type}</h2>
                            <p>${item.location}</p>
                            <p>${item.price_type}</p>
                            <p>${item.price}Tk</p>
                            <div class="card-actions">
                                <a href="/rentDetail/${item.id}">
                                    <button class="btn bg-gray-950 text-white px-5 py-2 rounded-xl">Detail</button>
                                </a>
                            </div>
                        </div>
                    `;

                    rentInfo.appendChild(card);
                });
            }
        };

        xhr.send();
    });

})



let first = document.getElementById('cross');
let second = document.getElementById('crossn');
let third = document.getElementById('vanish');

function crossMark() {
    first.style.display = "none";

}

function crossLet() {
    second.style.display = "none";
}

function crossSign() {
    third.style.display = "none";
}