@extends('layouts.app')

@section('content')
  @if (! have_posts())
    <div class="container my-80px text-center">
      <x-alert type="warning">
        {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
      </x-alert>
    </div>
  @endif
@endsection
