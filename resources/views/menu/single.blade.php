<x-layout-header>

    <div class="single-container">
        <h2 class="single-heading">{{$menuItem->dishTitle}}</h2>

        <div class="single-img-con">
            <img class="single-img-big" src="{{url('/resources/Images/menu/Hunters-Chicken-Pasta-Bake_007.jpg')}}" alt="">
        </div>

        <div class="single-row">
            <div id="price" class="single-col">
                <p><span class="red-text">£{{$menuItem->price}}</span> Per Meal</p>
            </div>

            <div class="single-col">
                <h2>Description</h2>
                <p>{{$menuItem->description}}</p>
            </div>
        </div>

        <div class="single-row">
            <div class="single-col">
                <h2>Macro</h2>
                
                <div class="item-info-con">
                    <div class="info-con">
                        <p class="bold">Protein</p>
                        <img src="{{url("/resources/Images/menu/meat-on-bone.svg")}}" alt="">
                        <p class="bold">{{$menuItem->protein}}g</p>
                    </div> 

                    <div class="info-con">
                        <p class="bold">Carbs</p>
                        <img src="{{url("/resources/Images/menu/potato.svg")}}" alt="">
                        <p class="bold">{{$menuItem->carbs}}g</p>
                    </div>  

                    <div class="info-con">
                        <p class="bold">Calories</p>
                        <img src="{{url("/resources/Images/menu/calories.svg")}}" alt="">
                        <p class="bold">{{$menuItem->calories}}cal</p>
                    </div>   
                </div>
            </div>
            
            <div class="single-col">
                <h2>Allegens</h2>
                
                <div class="single-allegen-con">
                    @forelse ($menuItem->allegens as $allegen)
                        <p class="single-allegen">{{ $allegen->allegen}}</p>      
                    @endforeach  
                </div>
            </div>
        </div>

        <div class="single-row">
            <div class="single-col">
                <h2>Ingredients </h2>

                <div class="single-allegen-con">
                    <p class="single-allegen">Cheese</p>
                    <p class="single-allegen">Pasta</p>
                    <p class="single-allegen">Tuna</p>
                </div>
            </div>
        </div>

        <div class="single-button-col">
            <button class="clear">Add</button>
            <button id="minus-{{$menuItem->id}}" class="clear">-</button>
            <button id="numberTracker" class="clear"><p id="quantity">0</p></button>
            <button id="plus-{{$menuItem->id}}" class="clear">+</button>
        </div>
    </div>
</x-layout-header>