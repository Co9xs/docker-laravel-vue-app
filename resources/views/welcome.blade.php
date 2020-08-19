@extends('app')

@section('title', 'TOP')

@section('content')
@include('nav')
<section class="mv">
  <div class="container">
    <h2 class="mv__heading">エンジニア特化型の口コミ投稿サイト<br>ITインターン.com</h2>
    <div class="search">
      <div class="search__inner">
        <p class="search__text">現在の口コミ投稿数:<span class="search__number">79</span>件</p>
        <p class="search__text">現在の口コミ掲載企業数:<span class="search__number">13</span>件</p>
        <div class="search__bar">
          <input class="search__input" type="text" placeholder=" 会社名で検索（例: 株式会社〇〇）">
          <button class="search__btn" type="button">検索</button>
        </div>
        <a class="search__link" href="/reviews">口コミ一覧を見てみる</a>
      </div>
    </div>
  </div>
</section>
<section class="feature">
</section>
<section class="new-arrival">
</section>
@endsection