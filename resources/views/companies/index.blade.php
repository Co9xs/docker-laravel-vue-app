@extends('app')

@section('title', 'ITインターン - 会社一覧')

@section('content')
@include('nav')
  <div class="container">
  @foreach($companies as $company)
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <div>
          <div class="font-weight-bold">
            {{ $company->name }}
          </div>
          <div class="font-weight-lighter">
            {{ $company->area }}
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection