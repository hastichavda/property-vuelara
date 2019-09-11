@extends('layouts.app')
@section('content')

  <div class="container">
    <edit-property  :edit-data ="{{ $properties }}"></edit-property>
  </div>

@endsection
