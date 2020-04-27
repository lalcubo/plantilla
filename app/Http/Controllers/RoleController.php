<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\PermisosUser;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();

        $permissions = Permission::get();

        $individual = PermisosUser::where('user_id',auth()->id())->get();

        $permisos = [];
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
            'roles'         => $roles,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return response()->json([
            'success' => true,
            'message' => '',
            'permissions' => $permissions,
            'errors'  => [],
        ], 200);

        //return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->get('role'));

        //luego actualizar permisos
        $role->permissions()->sync($request->get('permissions'));  

        return response()->json([
            'success' => true,
            'message' => 'El role fue creado con exito',
            'data' => [
                'role' => $request->get('role'),
                'permissions' => $request->get('permissions'),
            ],
            'errors'  => [],
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return response()->json([
            'success' => true,
            'message' => 'El Centro de Costos fue creado con éxito',
            'data' => $role,
            'errors'  => [],
        ], 200);
        //return $role;

        
        //return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permisos = DB::table('permissions')
            ->join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
            ->where('permission_role.role_id',$role->id)
            ->select('permissions.id')
            ->get();
        // para que se envie como un array y no como objeto
        $permisos_act[] = '';
        $i=0;
        foreach($permisos as $valor){
            $permisos_act[$i] = $valor->id;
            $i++;
        }
        // onbtengo los permisos del sistema
        $permissions = Permission::get();

        
        //$role = auth()->user()->roles;

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => [
                'permissions'   => $permissions,
                'permisos_act'  => $permisos_act,
                'role'         => $role,
            ],
            'errors'  => [],
        ], 200);

       // return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //primero actualizar role
        $role->update($request->get('role'));

        //luego actualizar permisos
        $role->permissions()->sync($request->get('permissions'));
        /*$gg  = $request->get('permissions');
        $ff = $request->get('role');*/
        return response()->json([
            'success' => true,
            'message' => 'Se actualizo el Role correctamente',
            'data' => [],
            'errors'  => [],
        ], 200);

        //return redirect()->route('roles.edit',$role->id)->with('info','Role actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Se borro El role correctamente',
            'data' => [],
            'errors'  => [],
        ], 200);

        //return back()->with('info','Eliminado correctamente');
    }
}