<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Controllers\Controller;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use CodePress\CodeUser\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    private $repository;
    private $response;
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;


    public function __construct(
        ResponseFactory $response,
        UserRepositoryInterface $repository,
        RoleRepositoryInterface $roleRepository
    )
    {
        $this->response = $response;
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return string
     */
    public function index()
    {
        $users = $this->repository->all();
        return $this->response->view('codeuser::users.index', compact('users'));

    }

    public function create()
    {
        $roles = $this->roleRepository->pluck('name', 'id');
        $users = $this->repository->all();
        return view('codeuser::users.create', compact('users', 'roles'));

    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);
        $users = $this->repository->all();
        return $this->response->view('codeuser::users.edit', compact('user', 'users'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->all();
        //var_dump($data); die;
        if(!isset($data['active'])){
            $data['active'] = false;
        }else{
            $data['active'] = true;
        }

        $user = $this-$this->repository->update($data, $id);
        //var_dump($user); die;
        return redirect()->route('users.index');
    }

}