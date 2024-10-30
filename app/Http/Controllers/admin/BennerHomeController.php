<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\BennerHome;
use Illuminate\Http\Request;

class BennerHomeController extends Controller
{
    public function index()
    {
        $benner_homes = BennerHome::all();
        return view('admin.benner.index', compact('benner_homes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $benner_home = BennerHome::find($id);

        $img_name = FileHelper::uploadFile($request->file('img'), 'benner');
        $benner_home->update([
            'img' => $img_name
        ]);

        return redirect()->route('admin.benner.index')->with('success', 'Benner Updated');
    }

    public function destroy($id)
    {
        $benner_home = BennerHome::find($id);
        FileHelper::deleteFile($benner_home->img, 'benner');
        $benner_home->img = null;

        $benner_home->save();

        return redirect()->route('admin.benner.index')->with('success', 'Benner Deleted');
    }
}
