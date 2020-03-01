@extends('layouts.app')

@section('title','編集フォーム')
@section('content')
<div class="row">
  <div class="col-12">
    <h3>{{$customer->name}}を編集する</h3>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <form  action="{{route('customers.update',['customer'=>$customer])}}" method="post" enctype="multipart/form-data">
      @method('patch')
      @include('customers.form')
      <button type="submit"　name="button" class="btn btn-outline-primary ">保存</button>
    </form>
  </div>
</div>
@endsection
