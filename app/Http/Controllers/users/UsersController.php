<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
//use App\Role;
//
//use App\Http\Requests\UserEditFormRequest;
//use Illuminate\Support\Facades\Hash;
use Validator;
use App\Comment;
use App\Role;
use App\Post;
use Gate;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
Use Auth;

class UsersController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
            public function index()
            {
                $users = User::all();
                $pagetitle= 'All Users';
                return view('users.index', compact('users'))->with('pagetitle',$pagetitle);
            }
    
        protected function validator(array $data)
        {
            return Validator::make($data, [
                'name' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                //'password' => 'required|confirmed|min:6',
            ]);
        }
    
        public function edit($id)
            {
         
                 $user = User::whereId($id)->firstOrFail();
                //if (Gate::denies('update-user', $user)) {
            //     if (Auth::user()->id != $id){
            //            abort(505, 'Unauthorized action.');
            //        }
                   // $user = User::whereId($id)->firstOrFail();
                    $roles = Role::all();
            //        $selectedRoles = $user->roles->lists('id')->toArray();
                    return view('users.edit', compact('user', 'roles'))->with('pagetitle','Edit User');
                   // return view('users.edit', compact('user', 'roles', 'selectedRoles'));
            }
    
        public function editUser($name)
                {
                    $user = User::whereId($id)->firstOrFail();
                    $roles = Role::all();
            //        $selectedRoles = $user->roles->lists('id')->toArray();
                    return view('users.edit', compact('user', 'roles'));
            //        return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
                }
                /**
                 * Update the specified resource in storage.
                 *
                 * @param  \Illuminate\Http\Request  $request
                 * @param  int  $id
                 * @return \Illuminate\Http\Response
                 */
 
            public function update($id, UserEditFormRequest $request)
                {
                   //Run validator checks....
//                if ($request->get('name')!= Auth::user()->name ){
//                    $validator = $this->validator($request->all());
//                
//                    if ($validator->fails()) {
//                        $this->throwValidationException(
//                            $request, $validator
//                        );
//                    }
//                }
                        $user = User::whereId($id)->firstOrFail();
//                  if (Auth::user()->id != $id){
//                        abort(505, 'Unauthorized action.');
//                    }
                        $user->name = $request->get('name');
                        $user->firstname = $request->get('firstname');
                        $user->lastname = $request->get('lastname');
                        
                        $user->email = $request->get('email');
                        $user->phone = $request->get('phone');
                        $user->website = $request->get('website');
                        $user->role_id = $request->get('role');
//                       // $password = $request->get('password');
//                        if($password != "") {
//                        $user->password = Hash::make($password);
//                        }
                        $user->save();
                      //  $user->saveRoles($request->get('role'));
                        return redirect(action('users\UsersController@edit', $user->id))->with('status', 'The user has been updated!');
                }
                
    
             public function show($name)
                    {
                        //$user = User::whereId($id)->firstOrFail();
                    //if (Gate::denies('update-user', $user)) {

                        $user = User::whereName($name)->firstOrFail();
//                        $posts = $user->posts()
//                                ->orderBy('created_at', 'desc')//->simplepaginate(3);
//                             ->paginate(20);
//                             
                           $posts = Post::where ('username',$name)
                                ->orderBy('created_at', 'desc')//->simplepaginate(3);
                                 ->paginate(20);
                        //$comments = $user->comments()->get();
                        $comments = Comment::where ('username',$name)->orderBy('created_at', 'desc'); //->simplepaginate(3);
                //         ->paginate(config('comsenblog.posts_per_page'));
                        //$selectedRoles = $user->roles->lists('name');
                        return view('users.show', compact('user', 'posts', 'comments'));
                     //   return view('backend.users.show', compact('user', 'posts', 'selectedRoles','comments'));

                    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
