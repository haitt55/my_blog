<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateProfilePasswordRequest;
use App\Http\Controllers\Admin\Controller;
use App\Storage\UserRepositoryInterface as UserRepository;
use App\Events\User\ProfileWasUpdated;
use App\Events\User\ProfilePasswordWasUpdated;

class ProfileController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Edit profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->userRepository->updateProfile(auth()->user()->id, $request->all());

        event(new ProfileWasUpdated());

        return redirect()->back();
    }

    public function editPassword() {
        return view('admin.profile.editPassword');
    }

    public function updatePassword(UpdateProfilePasswordRequest $request) {
        $this->userRepository->updatePassword(auth()->user()->id, $request->input('password'));

        event(new ProfilePasswordWasUpdated());

        return redirect()->back();
    }
}
