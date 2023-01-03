<div>
                <a href="{{url('location_details')}}" class="image">
                    <img src="/storage/app/public/{{$location->image}}" alt="" data-position="center center" />
                </a>
                <div class="content">
                    <div class="inner">
                        <header class="major">
                            <h3>{{$location->location_name}}</h3>
                        </header>
                        <p><strong>{{$location->location_state}}</strong></p>
                        <p>{{$location->directions}}</p>
                    </div>
                </div>
                <div class="inner">
                <ul class="actions">
                    @auth
                    @if (Auth::user()->usertype !== '1')
                    @else
                    <li><a href="{{url('delete',$location->id)}}" class="button next">DELETE</a></li>
                    @endif
                    @endauth
                </ul>
            </div>
</div>