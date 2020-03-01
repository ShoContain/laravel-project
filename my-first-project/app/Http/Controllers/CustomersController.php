<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use App\Events\NewCustomerHasRegisteredEvent;
use PHPUnit\Framework\Assert;
use Intervention\Image\Facades\Image;


class CustomersController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    
    public function index(){
      $customers = Customer::with('company')->paginate(5);
      return view('customers.index',compact('customers'));
  }

    public function create(){
      $companies = Company::all();
      $customer = new Customer();
      return view('customers.create',compact('companies','customer'));
    }

    public function show(Customer $customer){
      return view('customers.show',compact('customer'));
    }

    public function edit(Customer $customer){
      $companies=Company::all();
      return view('customers.edit',compact('customer','companies'));
    }

    public function update(Customer $customer){
      $customer->update($this->validateRequest());
      $this->storeImage($customer);
      return redirect('customers/'.$customer->id);
    }

  public function store(){
      $this->authorize('create',Customer::class);

      $customer=Customer::create($this->validateRequest());

      $this->storeImage($customer);
      //$customerを引数で渡す
      event(new NewCustomerHasRegisteredEvent($customer));
       return redirect('/customers');
   }

   public function destroy(Customer $customer){
     $this->authorize('delete',$customer);

     $customer->delete($customer);
     return redirect('/customers');
   }

  private function validateRequest(){

      return request()->validate([
        'name'=>'required|min:2',
        'email'=>'required|email',
        'active'=>'required',
        'company_id'=>'required',
        'image'=>'sometimes|file|image|max:5000',
      ]);
  }

  private function storeImage($customer){
    if(request()->has('image')){
      $customer->update([
        //第一引数では、storeメソッドからファイルパスが返されるので、生成されたファイル名を含めた、そのファイルパスをデータベースに保存できます。
        // storage/publicの中にuploadsディレクトリを作り保存する,デフォルトでstoreメソッドはデフォルトディスクを使用する
        //保存した後storage:linkコマンドでアクセス出来る様publicディレクトリにリンクを作る
        //Create a symbolic link from "public/storage" to "storage/app/public"
        'image'=>request()->image->store('uploads','public'),
      ]);
      $image = Image::make(public_path('storage/'.$customer->image))->fit(300,400);
      $image->save();
    }
  }
}
