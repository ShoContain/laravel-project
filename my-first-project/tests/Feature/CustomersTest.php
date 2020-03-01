<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use App\User;
use App\Customer;

class CustomersTest extends TestCase
{
    use RefreshDatabase;
    /**
    * @test
    */
    public function only_logged_in_users_can_see_the_customer_list(){
      $response = $this->get('/customers')->assertRedirect('/login');
    }


        /**
        * @test
        */
    public function authenticated_users_can_see_the_customer_list(){
      $this->actingAs(factory(User::class)->create());
      $response = $this->get('/customers')
      ->assertOk();
    }

    /**
    * @test
    */
    public function a_customer_can_be_added_through_the_form(){
      $this->withoutExceptionHandling();
      Event::fake();
      $this->actingAs(factory(User::class)->create([
        'email'=>'perblue.666@gmail.com',
      ]));
      $response=$this->post('/customers',$this->date());

      $this->assertCount(1, Customer::all());
    }

    private function date(){
      return [
        'name'=>'Add',
        'email'=>'perblue.666@gmail.com',
        'active'=>'1',
        'company_id'=>'1',
      ];
    }

}
