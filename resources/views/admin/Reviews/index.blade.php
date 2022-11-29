<x-layout-header>
    @include('admin.Partials.adminNav')
    
    <div class="admin-container">
        <div class="menu-list-container">
            <h1>Reviews</h1>

            @foreach($menuItems as $item)
                @if(count($item->reviews) >= 1) 
                    <div class="review-menuItem-con">
                        <div class="review-image-col">
                            <img src="{{url("/resources/Images/menu/food-images/" . $item->image_path)}}" alt="">
                            <a class="clear" href="/menu/{{$item->id}}/show">View Product</a>
                        </div>
                        <div class="review-content-col">
                            <h2>{{$item->dishTitle}}</h2>

                            <div class="reviews-con">
                                @foreach($item->reviews as $review)
                                    <div class="review-single-con">
                                        <div class="review-single-content-col">
                                            <div class="review-single-title">
                                                <h3>{{$review->user->firstName}} {{$review->user->lastwName}}</h3>
                                                <p>{{$review->created_at->format('h:i')}} - {{$review->created_at->format('d/m/y')}}</p>
                                            </div>
                                            <p>{{$review->description}}</p>
                                        </div>
                                        
                                        <div class="review-single-action-col">
                                            <button>Edit</button>
                                            <button>Delete</button>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif 
            @endforeach
        </div>
    </div>
</x-layout-header>