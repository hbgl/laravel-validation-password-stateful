<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Tests\TestCase;

class PasswordRuleTest extends TestCase
{
    public function test_exampleStateful()
    {
        $rules = [
            'password' => ['required', Password::defaults()],
        ];

        $validator1 = Validator::make([
            'password' => '1234',
        ], $rules);
        
        $this->assertTrue($validator1->fails());

        $validator2 = Validator::make([
            'password' => '12341234',
        ], $rules);

        $this->assertFalse($validator2->fails(), 'Password 12341234 should pass the default password rule.');
    }

    public function test_example()
    {
        $rules = [
            'password' => ['required', Password::defaults()],
        ];
        $validator = Validator::make([
            'password' => '12341234',
        ], $rules);

        $this->assertFalse($validator->fails());
    }
}
