@foreach ($users as $user) 
            
            <li>{{ $user->name }} {{$user->body}}<br></li>
        
@endforeach