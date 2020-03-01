@extends('layouts.app')

@section('title','追加フォーム')
@section('content')

<div class="row">
    <h3>追加フォーム</h3>
</div>

<div class="row">
  <div class="col-12">
    <form  action="/customers" method="post" enctype="multipart/form-data">

      @include('customers.form')
      <button type="submit"　name="button" class="btn btn-outline-primary ">送信</button>
    </form>
  </div>
</div>
@endsection
