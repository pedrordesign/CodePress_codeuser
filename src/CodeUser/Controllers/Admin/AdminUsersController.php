<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Controllers\Controller;
use CodePress\CodeUser\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    private $repository;
    private $response;

    public function __construct(ResponseFactory $response, UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->response = $response;
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
        $users = $this->repository->all();
        return view('codeuser::users.create', compact('users'));

    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.users.index');
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
        return redirect()->route('admin.users.index');
    }

}