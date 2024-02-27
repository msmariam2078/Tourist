<ul>
@foreach($tickets as $value)

<li>{{$value->city->name}}    {{$value->company->title}}     {{$value->date_s}}<a href="{{route('add-book',['id'=>$value->id])}}">Book now</a ></li>



@endforeach
</ul>