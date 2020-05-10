<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
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
        $profile = Profile::find($request->id);
        if(empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $profile]);
    }
    public function update(Request $request)
    {
        
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profiles_form = $request->all();
        
        unset($profiles_form['_token']);
        
        $profile->fill($profiles_form)->save();
        
        $history = new History2;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/');
    }
    
    public function create(Request $request)
    {
        // 以下を追記
      // Validationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/');
    }
    
    public function index(Request $request)
    {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          $posts = Profile::where('name', $cond_name)->get();
      } else {
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    
    public function delete(Request $request)
    {
    $profile =Profile::find($request->id);
    $profile->delete();
    return redirect('admin/profile/');
    }
    
}

?>
