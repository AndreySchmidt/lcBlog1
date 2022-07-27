<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        // dd($data);

        // у пользователь должен быть уникальный email, поэтому укажу поле, для проверки уникальности
        User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()->route('admin.user.index');
    }
}
