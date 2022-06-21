<?php

namespace Modules\UCP\Http\Controllers;

use Modules\UCP\Entities\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UCPController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $posts  =   Posts::orderBy('id', 'desc')->paginate(25)
        $users  =   User::orderBy('id', 'desc')->paginate(25);
        return view('ucp::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ucp::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ucp::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param \Modules\UCP\Entities\User $user
     * @return Renderable
     */
    public function edit(User $user)
    {
        return view('ucp::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \Modules\UCP\Entities\User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function updatePassword(Request $request,User $user)
    {
        $userPassword = $user->password;

        // Check validation
        $request->validate([
            'password_current'  => 'required',
            'password_new'      => 'required|same:password_new2|min:8',
            'password_new2'     => 'required|same:password_new',
        ],
            // create validation texts
            [
                'password_current.required' =>  __('ucp::validation.password_current.required'),
                'password_new.required'     =>  __('ucp::validation.password_new.required'),
                'password_new.same'         =>  __('ucp::validation.password_new.same'),
                'password_new.min'          =>  __('ucp::validation.password_new.min'),
                'password_new2.required'    =>  __('ucp::validation.password_new2.required'),
            ]);

        //Check if the password in DB are the same
        if (!Hash::check($request->password_current, $userPassword)) {
            return back()->withErrors(['password_current'   =>  __('ucp::validation.password_current.same')]);
        }

        // Create hash from password and save it or fail it
        $user->updateOrFail([
                'password'  =>  Hash::make($request->password_new)
            ]);

        return redirect(route('ucp.backend.index', $user))->with(['message' => __('ucp::validation.password.success.change')]);
    }

    /**
     * change the update status.
     * @param \Modules\UCP\Entities\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function changeStatus(User $user){

        // save the opposite ot the saved status
        $user->updateOrFail([
            'status'   =>  !$user->status
        ]);

        return redirect(route('ucp.backend.index'))->with([
            'message'   =>  __('blog::edit.status.success.message', ['blogtitle' => $user->name])
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param \Modules\UCP\Entities\User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function updateEmail(Request $request,User $user)
    {
        // Check validation
        $request->validate([
            'email'      => 'required|email|unique:users|same:email_new2',
            'email_new2'     => 'required|email|same:email',
        ],
            // create validation texts
            [
                'email.required'    =>  __('ucp::validation.email_new.required'),
                'email.same'        =>  __('ucp::validation.email_new.same'),
                'email.email'       =>  __('ucp::validation.email_new.email'),
                'email.unique'      =>  __('ucp::validation.email_new.unique'),
                'email_new2.required'   =>  __('ucp::validation.email_new2.required'),
                'email_new2.email'      =>  __('ucp::validation.email_new2.email'),
                'email_new2.same'       =>  __('ucp::validation.email_new2.same'),

            ]);


        // Create hash from password and save it or fail it
        $user->updateOrFail([
            'email'  =>  $request->email
        ]);

        return redirect(route('ucp.backend.index', $user))->with(['message' => __('ucp::validation.email.success.change', ['email' => $request->email])]);
    }

    /**
     * Remove the specified resource from storage.
     * @param \Modules\UCP\Entities\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $oldUserEmail   =   $user->email;

        $user->deleteOrFail();

        // Check if the requester is the same as the deleted
        if ($oldUserEmail == Auth::user()->email)
        {
            return redirect(config('app.url'));
        }

        return redirect(route('ucp.backend.index'))->with(['message' => __('ucp::validation.delete.success', ['email' => $oldUserEmail])]);
    }
}
