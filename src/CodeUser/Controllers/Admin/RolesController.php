<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Controllers\Controller;
use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    private $repository;
    private $response;
    /**
     * @var PermissionRepositoryInterface
     */
    private $permissionRepository;

    public function __construct(
        ResponseFactory $response,
        RoleRepositoryInterface $repository,
        PermissionRepositoryInterface $permissionRepository
    ) {
        $this->authorize('access_users');
        $this->repository = $repository;
        $this->response = $response;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $roles = $this->repository->all();
        return $this->response->view('codeuser::admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('codeuser::admin.role.create');
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.roles.index');
    }

    public function edit($id)
    {
        $role = $this->repository->find($id);
        return $this->response->view('codeuser::admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->repository->update($data, $id);
        return redirect()->route('admin.roles.index');
    }

}