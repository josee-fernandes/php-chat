<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->isMethod('get')) return 'Invalid method';

        return Message::all();
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

        if($request->missing('message')) return 'Missing message.';

        $created = Message::create($request->all());

        if(!$created) return 'Couldn\'t create message. Contact support.';

        return 'Message created.';
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

        $message = Message::find($id);

        if(!$message) return 'Message not found.';

        return $message;
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

        if($request->missing('message')) return 'Nothing to update.';

        if(!$id) return 'Missing id.';

        $message = Message::find($id);

        if(!$message) return 'Message not found.';

        $updated = $message->update($request->all());

        if(!$updated) return 'Couldn\'t update message. Contact support.';

        return 'Message updated.';
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

        $message = Message::find($id);

        if(!$message) return 'Message not found.';

        $deleted = $message->delete();

        if(!$deleted) return 'Couldn\'t delete message. Contact support.';

        return 'Message deleted.';
    }
}
