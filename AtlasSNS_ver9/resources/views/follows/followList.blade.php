<x-login-layout>
{!! Form::open(['url' => '/follow-list']) !!}
こんにちは
<!-- <form action="{{ route('follow.list') }}" method="POST"> -->
    @csrf
</form>


@foreach($followings as $following)

@if($following->id !== Auth::user()->id)

<a href="{{ url('/follow-list',$following->id) }}"><img src="{{ asset('/storage/images/' . $following->images) }}" class="" width="50" height="50"></a>

@endif
@endforeach


</x-login-layout>
