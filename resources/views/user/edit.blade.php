<x-layout-header>
    <div class="account-container">
        <div class="content">
            <div class="form-container">
                <h1><span class="red-text">E</span>dit 
                    <span class="red-text">P</span>age</h1>
        
                <form action="/user/{{$user->id}}/edit" method="POST">
                    @csrf
                    <div class="field">
                        <label for="firstName">First Name: </label>
                        <input type="text" value="{{$user->firstName}}" name="firstName">
            
                        @error('firstName')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <div class="field">
                        <label for="lastName">Second Name: </label>
                        <input type="text" value="{{$user->lastName}}" name="lastName">
            
                        @error('lastName')
                             <p>{{$message}}</p>
                        @enderror
                    </div>
                    
                    <div class="field">      
                        <label for="email">Email: </label>
                        <input type="text" value="{{$user->email}}" name="email">
        
                        @error('email')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <button class="solid" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout-header>