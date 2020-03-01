@extends('layouts.app')

@section('title','Customer')
@section('content')

<div class="row">
  <div class="col-12"></div>
  <h4>お客様リスト</h4>

  @can('create',App\Customer::class)
  <p class="px-3">
    <a href="/customers/create" class="btn btn-outline-secondary">追加</a>
  </p>
  @endcan
</div>


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">名前</th>
      <th scope="col">会社名</th>
      <th scope="col">会社連絡先</th>
      <th scope="col">活動</th>
    </tr>
  </thead>
  <tbody>
    @foreach($customers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>
        @can('view',$customer)
        <a href="/customers/{{$customer->id}}">
          {{ucfirst($customer->name)}}
        </a>
        @endcan
        @cannot('view',$customer)
        {{$customer->name}}
        @endcannot
      </td>
      <td>{{$customer->company->name}}</td>
      <td>{{$customer->company->phone}}</td>
      <td>{{$customer->active}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="col-12 d-flex justify-content-center pt-3">
    {{$customers->links()}}
  </div>
</div>



@endsection
