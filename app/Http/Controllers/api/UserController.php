<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->isMethod('get')) return 'Invalid method';

        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->isMethod('post')) return 'Invalid method.';

        if($request->missing('name')) return 'Missing name.';

        $created = User::create($request->all());

        if(!$created) return 'Couldn\'t create user. Contact support.';

        return 'User created.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if(!$request->isMethod('get')) return 'Invalid method.';

        if(!$id) return 'Missing id.';

        $user = User::find($id);

        if(!$user) return 'User not found.';

        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->isMethod('put')) return 'Invalid method.';

        if($request->missing('name')) return 'Nothing to update.';

        $user = User::find($id);

        if(!$user) return 'User not found.';

        $updated = $user->update($request->all());

        if(!$updated) return 'Couldn\'t update user. Contact support.';

        return 'User updated.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$request->isMethod('delete')) return 'Invalid method.';

        $user = User::find($id);

        if(!$user) return 'User not found.';

        $deleted = $user->delete();

        if(!$deleted) return 'Couldn\'t delete user. Contact support.';

        return 'User deleted.';
    }
}
