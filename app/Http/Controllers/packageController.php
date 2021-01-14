<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function addPackage()
    {
        return view('backend.pages.addPackage');
    }

    public function store(Request $request)
    {
        DB:: table('packages')->insert(
            [
                'packageName' => $request->packageName,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]
        );
        return redirect('/all-packages')->with('message', 'successfully Inserted.');
    }

    public function allPackages()
    {
        $packages = Package::all();
        return view('backend.pages.allPackages', compact('packages'));
    }


    public function edit($id)
    {
        $package = Package::find($id);
        return view('backend.pages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'packageName' => 'required',
            'quantity' => 'required',
            'price' => 'required',

        ]);
        $package = Package::find($id);
        $package->packageName = $request->packageName;
        $package->quantity = $request->quantity;
        $package->price = $request->price;

        $package->save();
        return redirect()->route("package.all");
    }

    public function delete($id)
    {
        if(intval($id) > 0) {
            $packages = Package::find($id);
            if ($packages->delete()) {
                return redirect()->route("package.all");
            }
        }else{
            return redirect()->route("package.all")->with("message", "Invalid id# ". $id);
        }
    }
}
