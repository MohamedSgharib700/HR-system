<?php

namespace App\Http\Controllers\Admin;

use App\Http\Admin\Requests\DepartmentRequest;
use App\Http\Controllers\BaseController;
use App\Http\Services\DepartmentService;
use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use View;

class DepartmentsController extends BaseController
{

    protected $departmentService;
    private $departmentRepository;

    public function __construct(DepartmentService $departmentService, DepartmentRepository $departmentRepository)
    {
        $this->departmentService = $departmentService;
        $this->departmentRepository = $departmentRepository;
    }

    public function index(Request $request)
    {
        $list = $this->departmentRepository->searchFromRequest(request());

        $list = $list->paginate(10);
        $list->appends(request()->all());

        return View::make('admin.departments.index', ['list' => $list]);
    }

    public function create()
    {


        return View::make('admin.departments.create');
    }

    public function store(DepartmentRequest $request)
    {
        $this->departmentService->fillFromRequest($request);
        return redirect(route('admin.departments.index'))->with('success', trans('item_added_successfully'));
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', ['item' => $department]);
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $this->departmentService->fillFromRequest($request, $department);
        return redirect(route('admin.departments.index'))->with('success', trans('item_updated_successfully'));
    }
}
