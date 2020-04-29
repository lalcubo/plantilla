<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        //$roles = Role::paginate();

        $permissions = Permission::get();

        //$individual = PermisosUser::where('user_id',auth()->id())->get();

        $permisos = array();
        $i=0;
        foreach ($permissions as $permission) {
            if (auth()->user()->can($permission->slug)) {
                $permisos[$i] = $permission->slug;
                $i++;
            }
        }

        //return view('roles.index', compact('roles'));
        return [
            'permissions'   => $permisos,
            'users'         => $users,
        ];

        //return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //return view('users.show', compact('user'));
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        /*$permisos = DB::table('permissions')
        ->join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
        ->where('permission_role.role_id',$role->id)
        ->select('permissions.id')
        ->get();*/

        // roles del sistema
        $roles = Role::get();

        // permisos del sistema
        $permissions = Permission::get();

        // permisos individual que posee el usuario
        $permisos_user = auth()->user()->permissions;

        // roles que posee activo el usuario
        $roles_activo = auth()->user()->roles;

        //para obtener solo los id y quede como un array
        $roles_act = array();
        $i=0;
        foreach($roles_activo as $valor){
            $roles_act[$i] = $valor->id;
            $i++;
        }
        //para obtener solo los id y quede como un array
        $permisos_act = array();
        $i=0;
        foreach($permisos_user as $valor){
            $permisos_act[$i] = $valor->id;
            $i++;
        }

        return [
            'permissions'   => $permissions,
            'user'          => $user,
            'permisos_user' => $permisos_act,
            'roles'         => $roles,
            'roles_act'     => $roles_act,
        ];

        //return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //primero actualizar el usuario
        $user->update($request->get('user'));

        //segundo los roles al usuario
        //$user->roles()->sync($request->get('roles'));

        //tercero permisos individuales
        //auth()->user()->permissions()->sync($request->get('permissions'));

        return response()->json([
            'success' => true,
            'message' => 'Se actualizo el usuario con sus roles correctamente',
            'data' => [],
            'errors'  => [],
        ], 200);

        //return redirect()->route('users.edit',$user->id)->with('info','usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info','Eliminado correctamente');
    }
}

