<x-layout-header>

    <div class="single-container">
        <a href="/menu/show">Back</a>
        <h2 class="single-heading">{{$menuItem->dishTitle}}</h2>

        <div class="single-img-con">
            <img class="single-img-big" src="{{url("resources/Images/menu/food-images/" . $menuItem->image_path)}}" alt="">
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

    <div class="single-container">
        <h2>Reviews</h2>
        @forelse($menuItem->reviews as $review)
            <div class="review-container">
                <h3>{{$review->user->firstName}} {{$review->user->lastName}}</h3>
                <p>{{$review->description}}</p> 
            </div>
        @empty
            <p>No Reviews Found</p>
        @endforelse

        <h2>Leave a Review</h2>

        <form method="POST" action="/user/create-review/{{$menuItem->id}}">
            @csrf
            <div class="leave-review-container">
                <div class="review-description">
                    <P>Review Description</P>
                    <textarea name="description"></textarea>
                </div>
                
                <div class="star-rating">
                    <p>Star Rating</p>
                    
                    <div class="star-con">
                        <img src="{{url('/resources/Images/blankStar.svg')}}" alt="">
                        <img src="{{url('/resources/Images/blankStar.svg')}}" alt="">
                        <img src="{{url('/resources/Images/blankStar.svg')}}" alt="">
                        <img src="{{url('/resources/Images/blankStar.svg')}}" alt="">
                        <img src="{{url('/resources/Images/blankStar.svg')}}" alt="">
                    </div>

                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</x-layout-header>