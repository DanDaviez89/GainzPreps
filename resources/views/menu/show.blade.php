<x-layout-header>
    <div class="main-con">
        <div class="image-menu-con">
            <div id="low-calorie" class="menu-image">
                <div class="menu-image-text">
                    <p>Low Calorie</p>
                </div>
            </div>

            <div id="high-protein" class="menu-image">
                <div class="menu-image-text">
                    <p>High Protein</p>
                </div>
            </div>

            <div id="ganiz-snacks" class="menu-image">
                <div class="menu-image-text">
                    <p>Ganiz Snacks</p>
                </div>
            </div>
        </div>

        <h1>Menu</h1>

        <div class="menu">
            <div class="menuList">
                @foreach ($menuItems as $item)
                    <div class="menuContainer">
                        <h1 class="bold">{{$item->dishTitle}}</h1>
                        <img class="info-image" src="{{url("resources/Images/menu/Hunters-Chicken-Pasta-Bake_007.jpg")}}" alt="">
                        <p id="price"><span class="red-text bold">£{{$item->price}}</span> Per Meal</p>
                        <p class="bold">Description</p> 
                        <p>{{$item->description}}</p>

                        <p class="bold">Allegens</p>
                        <p>
                            @forelse ($item->allegens as $allegen)
                                ({{ $allegen->key}})
                            @endforeach
                        </p>

                        <div class="item-info-con">
                            <div class="info-con">
                                <p class="bold">Protein</p>
                                <img src="{{url("/resources/Images/menu/meat-on-bone.svg")}}" alt="">
                                <p class="bold">{{$item->protein}}g</p>
                            </div> 

                            <div class="info-con">
                                <p class="bold">Carbs</p>
                                <img src="{{url("/resources/Images/menu/potato.svg")}}" alt="">
                                <p class="bold">{{$item->carbs}}g</p>
                            </div>  

                            <div class="info-con">
                                <p class="bold">Calories</p>
                                <img src="{{url("/resources/Images/menu/calories.svg")}}" alt="">
                                <p class="bold">{{$item->calories}}cal</p>
                            </div>   
                        </div>

                        <a href="/menu/{{$item->id}}/show"><button class="clear long">View Item</button></a>
                        <div class="button-col">
                            <button class="clear">Add</button>
                            <button id="minus-{{$item->id}}" class="clear">-</button>
                            <button id="numberTracker" class="clear"><p id="quantity">0</p></button>
                            <button id="plus-{{$item->id}}" class="clear">+</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout-header>