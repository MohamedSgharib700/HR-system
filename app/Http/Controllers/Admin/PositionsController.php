<?php

namespace App\Http\Controllers\Admin;

use App\Http\Admin\Requests\PositionRequest;
use App\Http\Controllers\BaseController;
use App\Http\Services\PositionService;
use App\Models\Position;
use App\Repositories\PositionRepository;
use Illuminate\Http\Request;
use View;

class PositionsController extends BaseController
{

    protected $positionService;
    private $positionRepository;

    public function __construct(PositionService $positionService, PositionRepository $positionRepository)
    {
        $this->positionService = $positionService;
        $this->positionRepository = $positionRepository;
    }

    public function index(Request $request)
    {
        $list = $this->positionRepository->searchFromRequest(request());

        $list = $list->paginate(10);
        $list->appends(request()->all());

        return View::make('admin.positions.index', ['list' => $list]);
    }

    public function create()
    {
        return View::make('admin.positions.create');
    }

    public function store(PositionRequest $request)
    {
        $this->positionService->fillFromRequest($request);
        return redirect(route('admin.positions.index'))->with('success', trans('item_added_successfully'));
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit', ['item' => $position]);
    }

    public function update(PositionRequest $request, Position $position)
    {
        $this->positionService->fillFromRequest($request, $position);
        return redirect(route('admin.positions.index'))->with('success', trans('item_updated_successfully'));
    }
}
