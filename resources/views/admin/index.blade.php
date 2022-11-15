<x-layout-header>
    <div class="admin-container">
        @include('admin.Partials.adminNav')
        
        <div class="menu-list-container">
            <div class="title-div">
                <h2>Menu List</h2>
                <a class="button-links" href="/admin/menu/create"><button class="clear med-flex">Create</button></a>
            </div>
            
        
            <div class="list-container">
                <div class="list-col">
                    <p>Title</p>
                    <p>Description</p>
                    <p>Image</p>
                    <p>Price</p>
                    <p>Show</p>
                    <p>Delete</p>
                </div>

                @foreach($menuItems as $item)
                    <div class="list-col">
                        <div class="col-container">
                            <p>{{$item->dishTitle}}</p>
                        </div>
                        
                        <div class="col-container">
                            <p>{{$item->description}}</p>
                        </div>

                        <div class="col-container">
                            <img src="{{url('/resources/Images/menu/food-images/' . $item->image_path)}}" alt="">
                        </div>

                        <div class="col-container">
                            <p>£{{$item->price}}</p>
                        </div>

                        <div class="col-container">
                            <a class="clear long-flex" href="/admin/menu/{{$item->id}}/edit">Edit</a>
                        </div>

                        <div class="col-container">
                            <form method="POST" action="/admin/menu/{{$item->id}}/delete">
                                @csrf
                                <button type="submit" class="clear long-flex">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout-header>