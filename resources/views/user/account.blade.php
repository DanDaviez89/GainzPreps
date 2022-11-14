<x-layout-header>
    <div class="account-container">
        <div class="auth-content">
            <h2><span class="red-text">A</span>ccount 
                <span class="red-text">S</span>ection</h2>

            <p>Welcome {{$user->firstName}} {{$user->lastName}}</p>
        
            <div class="account-button-con">
                @if($user->isAdmin == "1")
                    <a href="/admin/index"><button class="button-large">Admin Section</button></a>     
                @endif

                <form id="log-out" action="/user/logout" method="POST">
                    @csrf
                    <button class="button-large" type="submit">Log Out</button>
                </form>

                <a href="/user/{{$user->id}}/edit"><button class="button-large" >Edit Account</button></a>
            </div>
        </div>
    </div>
</x-layout-header>