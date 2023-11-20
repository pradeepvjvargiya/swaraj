<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Ensure the user is authenticated
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            
            // Check if the user has the 'super-admin' role using the 'super_admin' gate
            if (Gate::allows('super_admin', $user)) {
                Log::info('Super admin accessed the controller.');
            }

            return $next($request);
        });
    }


    /**
     * Display list of resource.
     */
    public function index()
    {
        $users = User::orderBy("id", "desc")->get();
        return view('users.index', compact('users'));   
     }


    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,super-admin']
        ]);

        // Encrypting Password
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
        * Edit the specified resource.
    */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        if (! Gate::allows('edit_profile', $user)) {
            abort(403);
        }
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
       
        if (! Gate::allows('edit_profile', $user)) {
            abort(403);
        }
        
        // Validate the request data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'in:admin,super-admin'],
        ]);

        // Check if the password is present in the request
        if ($request->has('password')) {
            // Validate password
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            // Encrypting Password
            $validated['password'] = Hash::make($request->input('password'));
        }

        // Update the user attributes
        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the document respective page record
        $user = User::find($id);
        
        // Delete the document record
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User delete successfully');
    }

    /**
     * listing for user log data.
    */
    public function userLog()
    {
        $userLogs = UserLog::orderBy("id", "desc")->paginate(20);
        return view('users.log', compact('userLogs'));
    }
}
