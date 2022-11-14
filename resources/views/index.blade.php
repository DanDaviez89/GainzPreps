<x-layout>
    <div class="hero-container">
        <div class="hero-background"></div>
        
        <div class="hero-content">
            <img src="{{asset("resources\Images\gainzLogo.png")}}" alt="Gainz Logo">
            <h1>Ready Cooked, Healthy, Delicious Meals Straight To Your Door.</h1>
            <p class="sub-heading">We have meals for everyone</p>
            <a href="/menu/show">
                <button class="solid">Menu</button>
            </a>
        </div>
    </div>

    <!-- x-data -> alpine component -->

    <!-- setting open to false -->
    <div x-data="{open: false}" class="alpine-container">
        <h2>Apline Test</h2>

        <!-- x-show --><!-- x-cloak -->

        <!-- setting div to open (which has been set to false -->
        <!-- this will not display -->
        <div x-show="open" x-cloak>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ultrices lacinia libero, vitae euismod est. Sed lacinia mi vitae elit luctus tincidunt. In vulputate vestibulum velit ut accumsan.</p>
        </div>

        <!-- x-on:click -->

        <!-- when the button is click it will set open to the -->
        <!-- oppsite of what ever it is, can toggle to view the -->
        <!-- div or not -->
        <button x-on:click="open = !open" class="solid">Toggle</button>
    </div>

    <!-- x-text -->
    <!-- can set varibles within x-data, set name to Dan -->
    <div x-data="{open: false, name: 'Dan'}" class="alpine-container" >
        <div>
                        <!-- call the name set in x-data ('dan') -->
            <p>The value of name is <span x-show="open" x-text="name" class="red-text"></span></p>
        </div>

        <button x-on:click="open = !open" class="solid">Toggle Name</button>
    </div>
</x-layout>