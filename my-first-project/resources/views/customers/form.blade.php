<div class="form-group ">
  <label class="col-form-label " for="name">名前</label>
  <input class="form-control w-50"type="text" name="name" value="{{old('name')  ?? $customer->name}}" placeholder="山田　太郎">
  <p class="error text-danger ml-3">{{$errors->first('name')}}</p>
</div>


<div class="form-group ">
  <label class="col-form-label " for="email">メール</label>
  <input class="form-control w-50" type="text" name="email" value="{{old('email')?? $customer->email}}" placeholder="abc@mail.com" >
  <p class="error text-danger ml-3">{{$errors->first('email')}}</p>
</div>

<div class="form-group w-50 ">
  <label for="active" class="">アクティブ</label>
  <select class="custom-select" name="active" id="active">
      <option value="" disabled>アクティブ状態の選択</option>
      @foreach($customer->activeOptions() as $activeOptionKey =>$activeOptionValue)
      <option value="{{$activeOptionKey}}"{{$customer->active == $activeOptionValue ?'selected':''}}>{{$activeOptionValue}}</option>
      @endforeach
  </select>
  <p class="error text-danger ml-3">{{$errors->first('active')}}</p>
</div>

<div class="form-group w-50 ">
  <label for="company_id" class="">組織名</label>
  <select class="custom-select" name="company_id" id="company_id">
      <option selected disabled>会社名を選択してください</option>
      @foreach ($companies as $company)
      <option value="{{$company->id}}" {{$company->id==$customer->company_id ? 'selected':''}}>{{$company->name}}</option>
      @endforeach
  </select>
  <p><a href="/companies/create" class="text-success">会社を追加する</a></p>
  <p class="error text-danger ml-3">{{$errors->first('company_id')}}</p>
</div>

<div class="form-group d-flex flex-column">
  <label for="image">プロファイル写真</label>
  <input type="file" name="image" class="py-1" >
  <div class="error text-danger ml-3">{{$errors->first('image')}}</div>
</div>
@csrf
