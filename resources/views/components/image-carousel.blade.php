@props([
    'photoFileHeader',
    'photoCount',
    'carInfo'
])

<div class="mb-5 flex flex-col items-center" id="imagesContainer">
    <img id="carPhoto" class="h-[70vh] w-[90vw] flex justify-center object-cover object-bottom" src="../storage/cars/{{ $photoFileHeader . '0.'. "jpg" }}" alt="{{ $carInfo }}">
    <div class="flex my-5 justify-between items-start w-full">
        @isset($heading)
            {{ $heading }}
        @endisset
        <div>
            <div class="flex justify-end mb-5">
                <x-directional-button position="left" onclick="previousButton('{{$photoFileHeader}}', {{$photoCount}})"></x-directional-button>
                <x-directional-button position="right" onclick="nextButton('{{$photoFileHeader}}', {{$photoCount}})"></x-directional-button>
            </div>
            @isset($details)
                {{ $details }}
            @endisset
        </div>
    </div>
</div>

<script>
    let index = 0;

    function previousButton (photoHeader, imgCount){
        let image = document.getElementById('carPhoto');
        if (index > 0){
            image.src = `../storage/cars/${photoHeader}${index - 1}.jpg`;
            index--;
        } else if (index === 0){
            image.src = `../storage/cars/${photoHeader}${imgCount - 1}.jpg`
            index = imgCount - 1;
        }
    }
    function nextButton (photoHeader, imgCount){
        let image = document.getElementById('carPhoto');
        if (index !== (imgCount - 1)){
            image.src = `../storage/cars/${photoHeader}${index + 1}.jpg`;
            index++;
        } else if (index === (imgCount - 1)){
            image.src = `../storage/cars/${photoHeader}0.jpg`;
            index = 0;
        }
    }
</script>
