<x-layout-header>
    <div class="form-container">
        <div class="menu-list-container">
            <h1>Edit Menu Item</h1>

            <form action="/admin/menu/{{$item->id}}/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label for="dishTitle">Dish Title </label>
                    <input type="text" value="{{$item->dishTitle}}" name="dishTitle">
        
                    @error('dishTitle')
                        <p>{{$message}}</p>
                    @enderror
                </div>
        
                <div class="field">
                    <label for="description">Description </label>
                    <textarea name="description" class="textArea" type="text" name="description">{{$item->description}}</textarea>
        
                    @error('description')
                         <p>{{$message}}</p>
                    @enderror
                </div>
    
                <div class="field">      
                    <label for="calories">Calories</label>
                    <input type="number" value="{{$item->calories}}" name="calories">
    
                    @error('calories')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                
                <div class="field">      
                    <label for="protein">Protein (g) </label>
                    <input type="number" value="{{$item->protein}}" name="protein">
    
                    @error('protein')
                        <p>{{$message}}</p>
                    @enderror
                </div>
    
                <div class="field">      
                    <label for="carbs">Carbs (g) </label>
                    <input type="carbs" value="{{$item->carbs}}" name="carbs">
    
                    @error('carbs')
                        <p>{{$message}}</p>
                    @enderror
                </div>
        
                <div class="field">      
                    <label for="price">Price </label>
                    <input type="double" value="{{$item->price}}" name="price">
    
                    @error('price')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field">      
                    <label for="image">Image </label>
                    <input type="file" name="image">

                    @error('image')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <h2 id="allegen-title">Allegens</h2>

                <div class="allegens-checklist">
                    @foreach($allegens as $allegen)   
                        <div class="allegen-con">
                            <input type="checkbox" name="allegens[]" value="{{$allegen->id}}" {{ $item->allegens->contains($allegen->id) ? 'checked' : '' }}/>
                            <label class="form-check-label">{{$allegen->allegen}}</label>
                        </div>

                        @error('allegens')
                            <span class="invaild-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endforeach
                </div>
        
                <button class="solid" type="submit">Edit</button>
                <a class="solid" href="/admin/index">Back</a>
            </form>
        </div>

    </div>
</x-layout-header>