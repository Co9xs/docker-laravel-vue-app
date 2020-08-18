@extends('app')

@section('title', 'ITインターン - 会社一覧')

@section('content')
@include('nav')
  <div class="container">
  @foreach($companies as $company)
    <div class="card mt-3">
      <div class="card-body d-flex flex-row justify-content-between">
        <div>
          <div class="font-weight-bold">
            {{ $company->name }}
          </div>
          <div class="font-weight-lighter">
            所在地:{{ $company->area }}
          </div>
        </div>
        <div style="vertical-align: bottom;">
          <a style="text-decoration: underline; color: blue;" href="/companies/{{$company->id}}/reviews/create">
            この会社への口コミを書く >>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection