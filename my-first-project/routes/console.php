<?php

use Illuminate\Foundation\Inspiring;
use App\Company;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('add:company-delete',function(){
  Company::whereDoesntHave('customers')
  ->get()
  ->each(function ($company){
    $company->delete();
    $this->warn('deleted '.$company->name);
  });

})->describe('Remove a company that doesn\'t have any customer');
