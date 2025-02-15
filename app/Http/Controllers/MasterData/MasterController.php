<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MasterData;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{

    public function index(User $user,  MasterData $masterData)
    {
        $user = Auth::user();
        $masterData = $masterData->paginate(5);
        if ($user->role == "admin") {

            return view('master-data', compact(['user', 'masterData']));
        } else {
            return view('/dashboard',);
        }
    }

    public function store(Request $request, MasterData $masterData)
    {
        $data = $request->all();
        $data['material'] = $request->material;
        $data["kategory"] = $request->kategory;
        $data["tebal"] = $request->tebal;
        $data["lebar"] = $request->lebar;
        $data["berat_jenis"] = $request->berat_jenis;

        // dd($data);
        if ($masterData->create($data)) {
            Session()->flash("Success", "Master Data have been created");
        } else {
            Session()->flash("Error", "Data failed to create");
        }
        return redirect()->route('master-data');
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $masterData = MasterData::find($id);
            return view('masterData.master-data-edit', compact('masterData'));
        } else {
            return redirect()->route('master-data');
        }
    }

    public function update(Request $request, $id)
    {
        $masterData = MasterData::find($id);
        $data = $request->all();
        $data['material'] = $request->material;
        $data["kategory"] = $request->kategory;
        $data["tebal"] = $request->tebal;
        $data["lebar"] = $request->lebar;
        $data["berat_jenis"] = $request->berat_jenis;
        if ($masterData->update($data)) {
            Session()->flash("Success", "Master Data have been updated");
        } else {
            Session()->flash("Error", "Data failed to update");
        }
        return redirect()->route('master-data');
    }

    public function destroy($id)
    {
        $masterData = MasterData::find($id);
        if ($masterData->delete()) {
            Session()->flash("Success", "Master Data have been deleted");
        } else {
            Session()->flash("Error", "Data failed to delete");
        }
        return redirect()->route('master-data');
    }
}
