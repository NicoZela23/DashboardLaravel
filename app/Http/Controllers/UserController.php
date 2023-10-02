<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $usuarios =DB::table('users')
                        ->select('id','name','apellidos','email','area','rol')
                        ->where('name','LIKE','%'.$texto.'%')
                        ->orWhere('email','LIKE','%'.$texto.'%')
                        ->paginate(1000);
        return view('usuario.index',compact('usuarios','texto'));
        return view('home')->with('usuario',$usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new User;
        $usuario->name=$request->input('name');
        $usuario->apellidos=$request->input('apellidos');
        $usuario->email=$request->input('email');
        $usuario->password=$request->input('password');
        $usuario->area=$request->input('area');
        $usuario->rol=$request->input('rol');
        $usuario->save();   
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuario.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name=$request->input('name');
        $usuario->apellidos=$request->input('apellidos');
        $usuario->email=$request->input('email');
        $usuario->password=$request->input('password');
        $usuario->area=$request->input('area');
        $usuario->rol=$request->input('rol');
        $usuario->save();   
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuario.index');
    }
}
