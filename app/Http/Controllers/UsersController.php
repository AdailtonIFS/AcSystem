<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserRequest;
use App\User;
use App\Category;
use App\Occurrence;
use App\Jobs\userRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View'
     */
    public function index()
    {

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
        $user = new User();
        $user->registration = $request->registration;
        $user->name = $request->name;
        $user->category_id = $request->category_id;
        $user->email = $request->email;
        $user->password = Hash::make($request->registration);
        $user->status = $request->status ?? 0;
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int registration
     * @return
     */
    public function show(User $user)
    {
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->category_id = $request->category_id;
        $user->status = $request->status ?? 0;
        $user->save();

        return redirect()->route('users.edit', ['user' => $user]);
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
