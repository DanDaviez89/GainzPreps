<x-layout-header>
    <div class="form-container">
        <div class="menu-list-container">
            <h1>Create Menu Item</h1>

            <h2>Main Details</h2>

            <form action="/admin/menu/create" method="POST">
                @csrf
                <div class="field">
                    <label for="dishTitle">Dish Title </label>
                    <input type="text" value="{{old('dishTitle')}}" name="dishTitle">
        
                    @error('dishTitle')
                        <p>{{$message}}</p>
                    @enderror
                </div>
        
                <div class="field">
                    <label for="description">Description </label>
                    <textarea name="description" class="textArea" type="text" value="{{old('description')}}" name="description"></textarea>
        
                    @error('description')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field">      
                    <label for="calories">Calories</label>
                    <input type="number" value="{{old('calories')}}" name="calories">

                    @error('calories')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                
                <div class="field">      
                    <label for="protein">Protein (g) </label>
                    <input type="number" value="{{old('protein')}}" name="protein">

                    @error('protein')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="field">      
                    <label for="carbs">Carbs (g) </label>
                    <input type="carbs" value="{{old('carbs')}}" name="carbs">

                    @error('carbs')
                        <p>{{$message}}</p>
                    @enderror
                </div>
        
                <div class="field">      
                    <label for="price">Price </label>
                    <input type="double" value="{{old('price')}}" name="price">

                    @error('price')
                        <p>{{$message}}</p>
                    @enderror
                </div>

                <h2 id="allegen-title">Allegens</h2>

                <div class="allegens-checklist">
                    @foreach($allegens as $allegen)   
                        <div class="allegen-con">
                            <input type="checkbox" name="allegens[]" value="{{$allegen->id}}">
                            <label class="form-check-label">{{$allegen->allegen}}</label>
                        </div>

                        @error('allegens')
                            <span class="invaild-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endforeach
                </div>

                <button class="solid" type="submit">Create</button>
                <a class="solid" href="/admin/index">Back</a>
            </form>
        </div>      
    </div>
</x-layout-header>