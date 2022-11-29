<x-layout-header>

    @include('admin.Partials.adminNav')
    
    <div class="admin-container">
        <div class="menu-list-container">
            <h2>Allegen</h2>

            <div class="allgen-create-con">
                <form method="POST" action="/admin/allegen/create">
                    @csrf
                    <p>ADD NEW ALLEGEN</p>
                    <div class="allgen-add-field">
                        <input type="text" placeholder="Enter Allegen" name="allegen">
                        <input type="text" placeholder="Enter Key" name="key">
                        <button type="submit">ADD</button>
                    </div>

                    @error('allegen')
                        <p>{{$message}}</p>
                    @enderror
                </form>
            </div>

            <div class="allgen-create-con">
                <div class="allgen-list">
                    <div class="allgen-list-col main">
                        <p>Allgen Name</p>
                        <p>Key</p>
                        <p>Action</p>
                    </div>

                    @foreach($allgens as $allegen)
                        <div class="allgen-list-col">
                            <div class="allgen-list-item">
                                <p>{{$allegen->allegen}}</p>
                            </div>

                            <div class="allgen-list-item">
                                <p>{{$allegen->key}}</p>
                            </div>

                            <div class="allgen-list-item">
                                <form action="/admin/allegen/{{$allegen->id}}/delete" method="POST">
                                    @csrf
                                    <button class="solid-wide" type="submit">X</button>
                                </form>
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
        </div>
        
    </div>

    
</x-layout-header>