@extends('app')
@section('title', 'ITインターン - 投稿一覧')
@section('content')
@include('nav')
  <div class="container">
  @foreach($reviews as $review)
    <div class="card mt-3">
      <div class="card-body">
        <h5 class="h5 card-title">
          {{ $review->company->name }}
        </h5>
        <div class="d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>
          <div class="font-weight-bold">
            {{ $review->user->school_name }}/{{ $review->user->graduation_year }}/{{ $review->user->sex }}
          </div>
          <div class="font-weight-lighter">
            {{ $review->work_style }}, {{ $review->type_of_occupation}}
          </div>
        </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="card-text">
          {!! nl2br(e( $review->body )) !!}
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection