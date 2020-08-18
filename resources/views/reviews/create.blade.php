@extends('app')
@section('title', 'ITインターン - 投稿一覧')
@section('content')
@include('nav')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>{{$company->name}}への口コミを投稿</p>
        <div class="card mt-3">
          <div class="card-body pt-0">
            <div class="card-text">
              <form method="POST" action="/companies/{{$company->id}}/reviews">
                @csrf
                <div class="form-group">
                  <label></label>
                  <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ old('body') }}</textarea>
                </div>
                <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection