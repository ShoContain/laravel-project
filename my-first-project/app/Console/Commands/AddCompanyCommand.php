<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new company';



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name =$this->ask('会社の名前を入力してください');
        $phone=$this->ask('電話番号を文字列で入力してください');


        if($this->confirm($name.'を追加しますか')){
          $company=Company::create([
            'name'=>$name,
            'phone'=>$phone ?? 'N/A',
          ]);
          return $this->info('Added'.$name);
        }else{
          $this->warn('No Company Added');
        }
    }
}
