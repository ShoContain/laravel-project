@extends('layouts.app')

@section('title','お問い合わせ')
@section('content')


@if(!session()->has('message'))
<form class="" action={{route('contact.store')}} method="post">
  <div class="form-group">
    <label for="name">名前</label>
    <input class="form-control"type="text" name="name" value="{{old('name')}}">
    <div class="error text-danger ml-3">{{$errors->first('name')}}</div>
  </div>

  <div class="form-group">
    <label for="email">メール</label>
    <input class="form-control"type="text" name="email" value="{{old('email')}}">
    <div class="error text-danger ml-3">{{$errors->first('email')}}</div>
  </div>

  <div class="form-group">
    <label for="message">メッセージ</label>
    <textarea class="form-control" name="message" rows="8" cols="80" value="{{old('name')}}"></textarea>
    <div class="error text-danger ml-3">{{$errors->first('message')}}</div>
  </div>

  <button type="submit" class="btn btn-primary">送信</button>
  @csrf
</form>
@endif
@endsection
