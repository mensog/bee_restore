<?php

namespace App\Http\Controllers\Admin;

use App\Delivery;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('pages.admin.delivery.index', ['deliveries' => $deliveries]);
    }

    public function create()
    {
        return view('pages.admin.delivery.create');
    }

    public function createOrUpdate(Request $request, $id = 0)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'delay' => 'min:0',
            'price' => 'required|integer|min:0|max:999999',
            'serial_number' => 'required|integer|min:0',
            'start' => 'required',
            'end' => 'required',
            'icon_path' => 'file|mimes:svg',
        ]);

        if ($id != 0) {
            $delivery = Delivery::findOrFail($id);
        } else {
            $delivery = new Delivery();
        }

        $delivery->title = $request->input('title');
        $delivery->description = $request->input('description');
        $delivery->price = $request->input('price') * 100;
        $delivery->color = $request->input('color');
        $delivery->delay = $request->input('delay');
        $delivery->serial_number = $request->input('serial_number');
        $delivery->start = Carbon::createFromTimeString($request->input('start'));
        $delivery->end = Carbon::createFromTimeString($request->input('end'));

        $delivery->save();
        if ($request->hasFile('icon_path')) {
            if (!is_null($delivery->icon_path)) {
                $delivery->deleteIcon();
            }
            $path = Storage::putFileAs(Delivery::ICON_DIRECTORY, $request->file('icon_path'), $delivery->id . '_' . $delivery->id . '.svg');
            $delivery->icon_path = $path;
        }
        $delivery->save();
        return redirect()->route('admin_delivery', [$delivery->id]);
    }

    public function show($id)
    {
        $delivery = Delivery::findOrFail($id);
        return view('pages.admin.delivery.show', ['delivery' => $delivery]);
    }

    public function delete($id)
    {
        $delivery = Delivery::findOrFail($id);

        if (!is_null($delivery->icon_path)) {
            $delivery->deleteIcon();
        }

        $delivery->delete();
        return redirect()->route('admin_deliveries');
    }

}
