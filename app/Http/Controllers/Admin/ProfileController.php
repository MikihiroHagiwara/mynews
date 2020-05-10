<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles;

use App\History2;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function edit(Request $request)
    {
        $profiles = Profiles::find($request->id);
        if(empty($profiles)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }
    public function update(Request $request)
    {
        
        $this->validate($request, Profiles::$rules);
        $profiles = Profiles::find($request->id);
        $profiles_form = $request->all();
        
        unset($profiles_form['_token']);
        
        $profiles->fill($profiles_form)->save();
        
        $history = new History2;
        $history->profiles_id = $profiles->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile');
    }
    
    public function create(Request $request)
    {
        // 以下を追記
      // Validationを行う
      $this->validate($request, Profiles::$rules);

      $profiles = new Profiles;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $profiles->fill($form);
      $profiles->save();

      return redirect('admin/profile/create');
    }
}

?>
