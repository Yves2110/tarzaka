<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'photo' => ['required', 'image']
        ])->validate();

        $photo=request('photo')->store('uploads',('public'));

        return User::create([
            'name' => $input['name'],
            'role_id' => 2,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
             'photo' =>$photo,
             'numero' => $input['numero'],
        ]);
    }
}
