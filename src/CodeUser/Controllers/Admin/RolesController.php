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
        $this->repository = $repository;
        $this->response = $response;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $roles = $this->repository->all();
        return $this->response->view('codeuser::roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permissionRepository->pluck('name', 'id');
        return view('codeuser::roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = $this->repository->create($request->all());
        $this->repository->addPermissions($role->id, $request->get('permissions'));

        return redirect()->route('admin.roles.index');
    }

    public function edit($id)
    {
        $permissions = $this->permissionRepository->pluck('name', 'id');
        $role = $this->repository->find($id);
        return $this->response->view('codeuser::roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $role = $this->repository->update($data, $id);
        $this->repository->addPermissions($role->id, $request->get('permissions'));

        return redirect()->route('admin.roles.index');
    }

}