<?php

namespace App\Http\Controllers;

use App\User;
use HttpOz\Roles\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
{
    /**
     * ADMINS
     */

    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }

    /**
     * Administrator INDEX
    */
    public function adminIndex() 
    {
        $users = $this->usersInGroup('admin');
        $roles = Role::get(["id","slug"]);
        return view('admin.admins.index', ['users' => $users, 'roles' => $roles]);
    }

   
    /**
     * Administrator EDIT page
     */
    public function adminEdit(Request $request, User $user) 
    {
        $roles = Role::where('group', 'admin')->get(['slug', 'id']);

        return view('admin.admins.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Administrator UPDATE
     */
    public function adminUpdate(Request $request, User $user) 
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->detachAllRoles(); 
        $user->attachRole($request->role);

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);

        flash(trans('alfa.saved'))->success();
        return back();
    }

    /**
     * Administrator CREATE
     */
    public function adminCreate(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        $user = $this->createUser($request);
        $user->attachRole($request->role);

        flash(trans('alfa.user_created'))->success();
        return redirect("/admin/admins/" . $user->id);
    }



    /**
     * BUYERS 
     */

    /**
     * BUYERS INDEX
     */
    public function buyersIndex()
    {
        $role = Role::findBySlug('buyer');
        $users = $role->usersWithTrashed()->get();
        
        return view('admin.buyers.index', ['users' => $users]);
    }

    /**
     * BUYER Create
     */
    public function buyersCreate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $user = $this->createUser($request);
        
        $role = Role::findBySlug('buyer');
        $user->attachRole($role);

        flash(trans('alfa.user_created'))->success();
        return redirect("/admin/buyers/" . $user->id);
    }

    /**
     * Administrator EDIT page
     */
    public function buyersEdit(Request $request, User $user)
    {
        return view('admin.buyers.edit', ['user' => $user]);
    }


    public function buyersUpdate(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . $user->id
        ]);

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'phone3' => $request->phone3
        ]);

        flash(trans('alfa.saved'))->success();
        return back();
    }


    /**
     * SELLERS 
     */

    /**
     * SELLERS INDEX
     */
    public function sellersIndex()
    {
        $role = Role::findBySlug('seller');
        $users = $role->usersWithTrashed()->get();
        
        return view('admin.sellers.index', ['users' => $users]);
    }

    /**
     * BUYER Create
     */
    public function sellersCreate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $user = $this->createUser($request);
        
        $role = Role::findBySlug('seller');
        $user->attachRole($role);

        flash(trans('alfa.user_created'))->success();
        return redirect("/admin/sellers/" . $user->id);
    }

    /**
     * Administrator EDIT page
     */
    public function sellersEdit(Request $request, User $user)
    {
        return view('admin.sellers.edit', ['user' => $user]);
    }


    public function sellersUpdate(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . $user->id
        ]);

        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'phone3' => $request->phone3
        ]);

        flash(trans('alfa.saved'))->success();
        return back();
    }




          
    /**
     * SOFT DELETE user account
     */
    public function delete(Request $request, User $user) 
    {
        $user->delete();
        flash(trans('alfa.user_deleted'))->success();
        return back();
    }

    /**
     * RESTORE user account
     */
    public function restore(Request $request, $user_id)
    {
        $user = User::withTrashed()->find($user_id);
        $user->deleted_at = null;
        $user->save();
        flash(trans('alfa.user_restored'))->success();
        return back();
    }


    /**
     * Users in group
     * @param string $group 
     * @return Collection of Users
     */
    public function usersInGroup($group) 
    {
        $roles = Role::where('group', $group)->get();
        $users = new Collection();
        
        foreach ($roles as $role) 
        {
            $users = $users->merge($role->usersWithTrashed);
        }
        
        return $users;
    }

    
    /**
     * CREATE A GENERIC USER FROM REQUEST
     * @param Request $request
     * @return User
     */
    private function createUser(Request $request) 
    {
        $user = new User([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'phone3' => $request->phone3,
            'address' => $request->address,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return $user;
    }


    /**
     * UPDATE A GENERIC USER FROM REQUEST
     * @param Request $request
     * @return User
     */
    private function userUpdate(Request $request, User $user) 
    {
        
    }
}
