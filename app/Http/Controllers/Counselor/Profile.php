<?php namespace App\Http\Controllers\Counselor;

use App\Eloquent\User;
use App\Eloquent\UserCounselors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Profile extends Controller
{
    /**
     * @var UserCounselors
     */
    private $counselor;


    /**
     * Profile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        /** @var User $user */
        /** @noinspection PhpUndefinedMethodInspection */
        $user            = \Illuminate\Support\Facades\Auth::user();
        $this->counselor = $user ? $user->getAttribute('counselor') : null;
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view("layout.counselor.profile.edit.counselor_profile_edit_$this->theme", ['counselor' => $this->counselor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'school' => 'required',
            'school_head' => 'required',
            'school_head_credential' => 'required',
        ]);

        $counselor = $request->only(['school', 'school_head', 'school_head_credential']);

        $this->counselor->update($counselor);

        return redirect()->back()->with('cbk_msg', ['notify' => ['Perubahan Berhasil']]);
    }
}
