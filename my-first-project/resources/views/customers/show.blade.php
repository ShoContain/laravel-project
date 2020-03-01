@extends('layouts.app')

@section('title',$customer->name.'の詳細ページ')
@section('content')

<div class="row">
  <div class="col-12">
    <h3>{{$customer->name}}の詳細</h3>
    <p><a href="/customers/{{$customer->id}}/edit" class="btn btn-outline-secondary">編集する</a></p>

    <form action="/customers/{{$customer->id}}"  method="post">
      @method("delete")
      @csrf
      <button class="btn btn-danger"　type="submit">このユーザーを削除</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-12 pt-3">
    <p><strong>名前 :</strong>{{$customer->name}}</p>
    <p><strong>メールアドレス :</strong>{{$customer->email}} </p>
    <p><strong>会社名 :</strong>{{$customer->company->name}} </p>
  </div>
</div>

<div class="row">
  @if($customer->image)
  <div class="col">
    <!-- asset('ファイルパス')はpublicディレクトリのパスを返す関数。 -->
    <img src="{{asset('storage/'.$customer->image)}}" alt="" class="img-thumbnail">
  </div>
  @endif
    <div class="col">
      <h2>コメント</h2>
      <add-comment></add-comment>
    </div>
</div>




@endsection
