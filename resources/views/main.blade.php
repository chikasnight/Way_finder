<div id="main">

    <!-- one -->
    @foreach($newLocation as $newLocation)
        <section id="two" class="spotlights">
            <section>
                <a href="{{url('location_details', $newLocation->id)}}" class="image">
                    <img src="/storage/app/public/{{$newLocation->image}}" alt="no img" data-position="center center" />
                </a>
                <div class="content">
                    <div class="inner">
                        <header class="major">
                            <h3>{{$newLocation->location_name}}</h3>
                        </header>
                        <p>{{$newLocation->location_state}}</p>
                        <ul class="actions">
                            <li><a href="{{url('location_details', $newLocation->id)}}" class="button">Get details</a></li>
                            @auth
                            @if (Auth::user()->usertype !== '1')
                            @else
                            <li><a href="{{url('delete',$newLocation->id)}}" class="button next">DELETE</a></li>
                            @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </section>
        </section>    
    @endforeach

    <!-- Two -->
        <section id="three">
            <div class="inner">
                <ul class="actions">
                    @auth
                    @else
                    <li><a href="{{url('register')}}" class="button next">REGISTER</a></li>
                    @endauth
                </ul>
            </div>
        </section>

</div>