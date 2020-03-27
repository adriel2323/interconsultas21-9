<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Users;
use Illuminate\Support\Facades\Log;
use Response;

class UsersController extends AppBaseController
{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo)
    {
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param UsersDataTable $usersDataTable
     * @return Response
     */
    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request)
    {
        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        /*Creo el Usuario*/
        $user = $this->usersRepository->create($input);

        $user = User::find($user->id);

        /*Le asigno el rol elegido*/
        $user->assignRole($input['role']);

        Flash::success('Usuario almacenado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param  int $id
     */
    public function show($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado.');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param  int $id
     */
    public function edit($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado.');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param  int              $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado.');

            return redirect(route('users.index'));
        }

        $input = $request->all();

        if(!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            unset($input['password']);
        }
        
        $img_data = file_get_contents($request->file('signature_image'));

        $input['signature_image'] = base64_encode($img_data);

        Log::info($input);

        $user = $this->usersRepository->update($input, $id);

        /*
         * Asigno el rol elegido
         */
        $user = Users::find($id);

        $user->syncRoles([]);

        $user->assignRole($input['role']);

        $user->update([
            'signature_image' => $input['signature_image']
        ]);

        Flash::success('Usuario actualizado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $users = $this->usersRepository->findWithoutFail($id);

        if (empty($users)) {
            Flash::error('Usuario no encontrado.');

            return redirect(route('users.index'));
        }

        $this->usersRepository->delete($id);

        Flash::success('Usuario eliminado con éxito.');

        return redirect(route('users.index'));
    }
}
