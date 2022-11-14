<x-layout-header>
    <div class="account-container">
        <div class="content">
            <div class="form-container">
                <h1><span class="red-text">R</span>egister 
                    <span class="red-text">P</span>age</h1>
        
                <form action="/user/register" method="POST">
                    @csrf
                    <div class="field">
                        <label for="firstName">First Name: </label>
                        <input type="text" value="{{old('firstName')}}" name="firstName">
            
                        @error('firstName')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <div class="field">
                        <label for="lastName">Second Name: </label>
                        <input type="text" value="{{old('lastName')}}" name="lastName">
            
                        @error('lastName')
                             <p>{{$message}}</p>
                        @enderror
                    </div>
                    
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
        
                    <div class="field">
                        <label for="password_confirmation">Confirm Password: </label>
                        <input type="password" name="password_confirmation">
        
                        @error('password_confirmation')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <div class="field">
                        <label for="isAdmin">Admin: </label>
                        <input type="isAdmin" name="isAdmin">
            
                        @error('isAdmin')
                             <p>{{$message}}</p>
                        @enderror
                    </div>
        
                    <button class="solid" type="submit">Register</button>
        
                    <p>Already have an account?
                        <a href="/user/login" class="text-laravel">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout-header>