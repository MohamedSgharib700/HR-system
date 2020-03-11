<?php

namespace App\Http\Controllers\Admin;

use App\Http\Admin\Requests\LocationRequest;
use App\Http\Controllers\BaseController;
use App\Http\Services\LocationService;
use App\Models\Location;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;
use View;

class LocationsController extends BaseController
{

    protected $locationService;
    private $locationRepository;

    public function __construct(LocationService $LocationService, LocationRepository $locationRepository)
    {
        $this->locationService = $LocationService;
        $this->locationRepository = $locationRepository;
    }

    public function index(Request $request)
    {
        request()->query->set('parent', 1);

        $list = $this->locationRepository->searchFromRequest(request());

        if ($request->query->get('view') == 'tree') {
            return View::make('admin.locations.tree', [
                'all' => $list->get(),
                'list' => $list->where('parent_id', '=', null)->get(),
            ]);
        }
        $list = $list->paginate(10);
        $list->appends(request()->all());

        return View::make('admin.locations.index', ['list' => $list]);
    }

    public function create()
    {
        request()->query->set('active', 1);
        $parents = $this->locationRepository->searchFromRequest(request())->get();

        return View::make('admin.locations.create', ['parents' => $parents]);
    }

    public function store(LocationRequest $request)
    {
        $this->locationService->fillFromRequest($request);
        return redirect(route('admin.locations.index'))->with('success', trans('item_added_successfully'));
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }

    public function edit(Location $location)
    {
        request()->query->set('active', 1);
        $parents = $this->locationRepository->searchFromRequest(request())->get();

        return view('admin.locations.edit', ['item' => $location, 'parents' => $parents]);
    }

    public function update(LocationRequest $request, Location $location)
    {
        $this->locationService->fillFromRequest($request, $location);
        return redirect(route('admin.locations.index'))->with('success', trans('item_updated_successfully'));
    }
}
