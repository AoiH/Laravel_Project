<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Message;

class MessagesController extends Controller
{
    
     
  
     // getでmessages/にアクセスされた場合の「一覧表示処理」
     //確認済み
     
     
    public function index()
    {
        $messages = Message::all();
        
    return view ('messages.index',[
        'messages' => $messages,
        ]);
        
    }
    
        
        
        

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    //確認済み
    
    public function create()
    {
        $message = new Message;
        
        return view('messages.create', [
            'message' => $message,
            ]);
        
    }
        
    


    // postでmessages/にアクセスされた場合の「新規登録処理」
    //確認済み
    
    public function store(Request $request)
    {
        $this -> validate($request,['content'=>'required|max:191',
        ]);
        
        $message = new Message;
        $message->content = $request->content;
        $message->save();
        
        return redirect('/');
        
    }    

    // getでmessages/idにアクセスされた場合の「取得表示処理」
    //確認済み
    
    public function show($id)
    {
        $message = Message::find($id);
        
        return view('messages.show', [
        'message' => $message,
        ]);
        
    }
    
    
    
    
    
    // getでmessages/id/editにアクセスされた場合の「更新画面表示処理」
    //確認済み
    
    public function edit($id)
    {
        $message = Message::find($id);
        
        return view('messages.edit', [
            'message' => $message,
            ]);
            
    }
    
    
    
    // putまたはpatchでmessages/idにアクセスされた場合の「更新処理」
    //確認済み
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $message = Message::find($id);
        $message->content = $request->content;
        $message->save();

        return redirect('/');
        
    }


    // deleteでmessages/idにアクセスされた場合の「削除処理」
    //確認済み
    
    public function destroy($id)
    {
         $message = Message::find($id);
        $message->delete();

        return redirect('/');
        
    }
}
