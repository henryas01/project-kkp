<?php

namespace App\Http\Controllers\PurchaseRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterData;
use App\Models\PurchaseRequestHead;
use App\Models\PurchaseRequestList;
use App\Models\PurchaseRequestSignature;
use App\Helpers\ConvertMassVolume;


class PurchaseRequestController extends Controller
{

  protected $purchaseRequestNumber;

  public function __construct()
  {
    $this->purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";
  }

  public function index(User $user, Request $request,  MasterData $masterData, PurchaseRequestHead $purchaseRequestHead, PurchaseRequestList $purchaseRequestList, PurchaseRequestSignature $purchaseRequestSignature)
  {
    $user = Auth::user();
    // $material = MasterData::select('material')->paginate(5);
    $material = MasterData::pluck('material');
    // $purchaseRequestNumber = $request->input('purchase_request_number', 'PRRM 0001');
    // $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";

    $purchaseRequestNumber = request('purchase_request_number');
    if ($purchaseRequestNumber && preg_match('/^[a-zA-Z0-9\s-]+$/', $purchaseRequestNumber)) {
      // Valid purchase request number
    } else {
      // Possible SQL injection or invalid input, redirect
      return redirect()->route('purchase-request.index', ['purchase_request_number' => 'PRRM 0001']);
    }

    //  dd($purchaseRequestNumber);

    $head = PurchaseRequestHead::where('purchase_request_number', $purchaseRequestNumber)->first() ?? new PurchaseRequestHead;
    $listAll = PurchaseRequestList::where('purchase_request_number')->first() ?? new PurchaseRequestList;
    $list = PurchaseRequestList::where('purchase_request_number', $purchaseRequestNumber)->paginate(5) ?? new PurchaseRequestList; // or you could be use collect()
    $signature = PurchaseRequestSignature::where('purchase_request_number', $purchaseRequestNumber)->first() ?? new PurchaseRequestSignature;


    //  $head = PurchaseRequestHead::all();
    // $list = PurchaseRequestList::all();
    // $signature = PurchaseRequestSignature::all();
    // dd($material->toArray(), $head->toArray(), $list->toArray(), $signature->toArray());
    // dd($head-<);

    // dd($user->role);
    $notFound = empty($head->toArray()) && empty($listAll->toArray()) && empty($signature->toArray());
    // dd($notFound);
    // dd($head->toArray(), $listAll->toArray(), $signature->toArray());

    if ($notFound) {
      return redirect()->route('page-not-found.index');
    } else {
      return view('purchase-request.index', compact(['user', 'material', 'head', 'list', 'signature', 'notFound']));
    }
  }


  public function createNewPR(PurchaseRequestHead $purchaseRequestHead, PurchaseRequestSignature $purchaseRequestSignature)
  {

    $user = Auth::user();
    $purchaseRequestHeadID = $purchaseRequestHead->latest()->first()->id;
    $nextNumber = $purchaseRequestHeadID + 1;
    $NewPurchaseRequestNumber = 'PRRM ' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    $dataPayloadHead = [];
    $dataPayloadHead["purchase_request_number"] = $NewPurchaseRequestNumber;
    $dataPayloadHead["user_ID"] = $user->id;
    $dataPayloadHead["document_date"] = date('Y-m-d H:i:s');
    $dataPayloadHead["status"] = 0;

    $dataPayloadSignature = [];
    $dataPayloadSignature["purchase_request_number"] = $NewPurchaseRequestNumber;
    $dataPayloadSignature["approved_user"] = $user->name;

    // dd($dataPayloadHead, $dataPayloadSignature);

    if ($purchaseRequestHead->create($dataPayloadHead) && $purchaseRequestSignature->create($dataPayloadSignature)) {
      Session()->flash("Success", "Data have been created");
      return redirect()->route('purchase-request.index', $dataPayloadHead["purchase_request_number"]);
    } else {
      Session()->flash("Error", "Data failed to create");
      return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
    }
  }

  // this function for insert data PR PurchaseRequest list
  public function store(Request $request,  MasterData $masterData, PurchaseRequestList $purchaseRequestList,)
  {

    $data = $request->all();
    $data['material'] = $request->material;
    $data["description"] = $request->description;
    $masterData = MasterData::where('material', $data['material'])->first();
    $data['purchase_request_number']  = request('purchase_request_number');
    $data['kategory'] = $masterData->kategory;
    $data['qty'] = $request->qty;
    $data['uom'] = $request->uom;


    if ($purchaseRequestList->create($data)) {
      Session()->flash("Success", "Data have been created");
    } else {
      Session()->flash("Error", "Data failed to create");
    }
    return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
  }

  public function show(Request $request, $id,  PurchaseRequestList $purchaseRequestList, MasterData $masterData,)
  {

    if ($request->ajax()) {
      $list = $purchaseRequestList->findOrFail($id);
      $material = MasterData::pluck('material');
      return view('purchase-request.edit', compact(['list', 'material']));
    } else {
      return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
    }
  }

  public function update(Request $request, $id)
  {
    $list = PurchaseRequestList::find($id);
    $data = $request->all();
    $data['material'] = $request->material;
    $data["description"] = $request->description;
    $masterData = MasterData::where('material', $data['material'])->first();
    $data['kategory'] = $masterData->kategory;
    $data['qty'] = $request->qty;
    $data['uom'] = $request->uom;

    // dd($id, $list->toArray(), $data);

    if ($list->update($data)) {
      Session()->flash("Success", "Data have been updated");
    } else {
      Session()->flash("Error", "Data failed to update");
    }
    return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
  }

  public function destroy($id)
  {
    $list = PurchaseRequestList::findOrFail($id);
    if ($list->delete()) {
      Session()->flash("Success", "Data have been deleted");
    } else {
      Session()->flash("Error", "Data failed to delete");
    }
    return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
  }

  public function signature(Request $request,  PurchaseRequestHead $purchaseRequestHead)
  {
    $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";
    $signature = PurchaseRequestSignature::where('purchase_request_number', $purchaseRequestNumber)->first() ?? new PurchaseRequestSignature;
    $data = $request->all();
    $data['purchase_request_number'] = $request->purchase_request_number;
    $data['approved_user'] = $request->approved_user ?? $signature->approved_user;
    $data['approved_manager'] = $request->approved_manager ?? $signature->approved_manager;
    $data['acknowledge'] = $request->acknowledge ?? $signature->acknowledge;

    $signature->update($data);
    $signatureAfterUpdate = PurchaseRequestSignature::where('purchase_request_number', $purchaseRequestNumber)->first();

    $purchaseRequestHead = PurchaseRequestHead::where('purchase_request_number', $purchaseRequestNumber)->first();

    $checksStatus = $signatureAfterUpdate->approved_user && $signatureAfterUpdate->approved_manager && $signatureAfterUpdate->acknowledge;

    if ($purchaseRequestHead->update(['status' => $checksStatus])) {
      Session()->flash("Success", "Signature have been updated");
    } else {
      dd($purchaseRequestHead->errors());
      Session()->flash("Error", "Signature failed to update");
    }
    return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
  }


  public function convertion(Request $request, PurchaseRequestHead $purchaseRequestHead, PurchaseRequestList $purchaseRequestList, PurchaseRequestSignature $purchaseRequestSignature)
  {

    // // $mass = $request->mass ?? 1; // 1 kg by default
    // // $mass = 15; // 1 kg by default
    // $mass = 117750.0;
    // $density = 'steel';

    // $volume = (new ConvertMassVolume)->kgToM3($mass, $density);
    // // $volume = (new ConvertMassVolume)->m3ToKg($mass, $density);

    // // echo "Volume: " . $volume . " m³";
    // dd($volume);
    // $head = new PurchaseRequestHead;
    // $head->purchase_request_number = $request->input('purchase_request_number', 'PRRM 0001');
    // $head->user_id = $user->id;
    // // $nextNumber = $lastNumber + 1;
    // return 'PRRM ' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);



    $user = Auth::user();
    $purchaseRequestHeadID = PurchaseRequestHead::latest()->first()->id;
    $nextNumber = $purchaseRequestHeadID + 1;
    $NewPurchaseRequestNumber = 'PRRM ' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    $dataPayloadHead = [];
    $dataPayloadHead["purchase_request_number"] = $NewPurchaseRequestNumber;
    $dataPayloadHead["user_ID"] = $user->id;
    $dataPayloadHead["document_date"] = date('Y-m-d H:i:s');
    $dataPayloadHead["status"] = 0;

    $dataPayloadSignature = [];
    $dataPayloadSignature["purchase_request_number"] = $NewPurchaseRequestNumber;
    $dataPayloadSignature["approved_user"] = $user->name;
    $dataPayloadSignature["approved_user"] = $user->name;


    dd($dataPayloadHead, $dataPayloadSignature);
  }

  public function updateUom(Request $request, $id)
  {
    $list = PurchaseRequestList::find($id);
    $convertMassVolume = new ConvertMassVolume();
    $calculate = $request->uom == 'kg' ? $convertMassVolume->kgToM3($list->qty) : $convertMassVolume->m3ToKg($list->qty);
    $data = $request->all();
    $data['uom'] = $request->uom;
    $data['qty'] = $calculate;

    if ($list->update($data)) {
      Session()->flash("Success", "Data have been updated");
    } else {
      Session()->flash("Error", "Data failed to update");
    }
    return redirect()->route('purchase-request.index', $this->purchaseRequestNumber);
  }
}
