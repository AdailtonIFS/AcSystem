<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View'
     */
    public function index()
    {
        $this->authorize('isAdmin');

        $users = User::join('categories', 'users.category_id', '=', 'categories.id')
            ->select('users.registration', 'categories.description', 'users.name', 'users.status', 'users.email')
            ->when(!empty(request()->get('query')), function ($query) {
                $data = request()->get('query');
                return $query->where('name', 'LIKE', "%$data%")->orWhere('email', 'LIKE', "%$data%");
            })
            ->when(!is_null(request()->get('status')), function ($query) {
                return $query->where('status', '=', request()->get('status'));
            })
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.users.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $categories = Category::all();
        return view('admin.users.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'registration' => 'required|numeric|unique:users,registration',
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'email' => 'required|unique:users,email',
        ],[
            'registration.required' => 'O matrícula é obrigatória',
            'registration.number' => 'As matriculas são representadas por números',
            'registration.unique' => 'Esse usuário já está cadastrado',
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome informado é inválido',
            'category_id.required' => 'A categoria é obrigatória',
            'category_id.numeric' => 'As categorias são representadas por números',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'Esse email já está cadastrado',
        ]);
        $user = new User();
        $user->registration = $request->registration;
        $user->name = $request->name;
        $user->category_id = $request->category_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->registration);
        $user->status = $request->status ?? 0;
        $user->save();
        return redirect()->route('users.index')->with('message', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param int registration
     * @return
     */
    public function show(User $user)
    {
        $this->authorize('isAdmin');

        try {
            $category = $user->category()->first();
            $occurrences = $user->occurrences()->get() ?? '';
            if ($occurrences) {
                foreach ($occurrences as $occurrence) {
                    $laboratories = $occurrence->laboratory()->first();
                }
            }

            return view('admin.users.show')
                ->with('user', $user)
                ->with('occurrences', $occurrences ?? '')
                ->with('category', $category ?? '')
                ->with('laboratories', $laboratories ?? '');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit(User $user)
    {
        $this->authorize('isAdmin');

        try {
            $usercategory = $user->category()->first();
            $categories = Category::all();
            return view('admin.users.edit')
                ->with('user', $user)
                ->with('usercategory', $usercategory)
                ->with('categories', $categories);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('isAdmin');

        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|numeric',
            'email' => 'required',
        ],[
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome informado é inválido',
            'category_id.required' => 'A categoria é obrigatória',
            'category_id.numeric' => 'As categorias são representadas por números',
            'email.required' => 'O email é obrigatório',
        ]);

        $validaEmail = User::where('email', $request->email)->where('registration', '!=', $user->registration)->get();
        if (count($validaEmail) > 0){
            return redirect()->route('users.edit', ['user' => $user])->with('error', 'Esse email já está cadastrado');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $user->password = $request->password;
        }
        $user->category_id = $request->category_id;
        $user->status = $request->status ?? 0;
        $user->save();

        return redirect()->route('users.index', ['user' => $user])->with('message', 'Usuário alterado com sucesso!');
    }
    public function delete(User $user)
    {
        $this->authorize('isAdmin');

        return view('admin.users.delete')->with('user', $user);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    }
}
