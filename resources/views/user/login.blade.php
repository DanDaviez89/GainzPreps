<x-layout-header>
    <div class="account-container">
        <div class="content">
            <div class="form-container">
                <h1><span class="red-text">L</span>ogin 
                    <span class="red-text">P</span>age</h1>
        
                <form action="/user/login" method="POST">
                    @csrf
                    <div class="field">      
                        <label for="email">Email: </label>
                        <input type="text" value="{{old('email')}}" name="email">
        
                        @error('email')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <div class="field">
                        <label for="password">Password: </label>
                        <input type="password" name="password">
            
                        @error('password')
                             <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <button class="solid" type="submit">Log In</button>
        
                    <p>Don't have an account?
                        <a href="/user/register" class="text-laravel">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout-header>