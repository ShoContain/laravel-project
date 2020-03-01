@extends('layouts.app')

@section('title','会社の追加')
@section('content')

<form class="" action="/companies" method="post">
  <div class="form-group">
    <label for="Company-name">会社名</label>
    <div class="controls">
      <input type="text" name="name" value="{{old('name')}}">
    </div>
    <p class="error text-danger"> {{$errors->first('name')}}</p>
  </div>

  <div class="form-group ">
    <label for="company-phone" class="control-label">会社の電話番号</label>
    <div class="controls">
      <input type="text" name="phone" value="{{old('phone')}}">
    </div>
    <p class="error text-danger"> {{$errors->first('phone')}}</p>
  </div>
  <button type="submit" name="button" class="btn btn-primary">送信</button>
  <small class="form-text text-muted">*会社情報の変更は原則としてできません</small>
  @csrf
</form>

@endsection
