<?php

namespace App\Http\Controllers\Dashboard\Admin\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customize\PartnerRequest;
use App\Models\Partner;
use App\Traits\UploadFiles;

class PartnerController extends Controller
{
    use UploadFiles;

    public function __construct()
    {
        $this->middleware('permission:access_partner', ['only' => 'index']);
        $this->middleware('permission:create_partner', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_partner', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_partner', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderBy('id', "desc")->get();

        return view("admin.pages.customize.partners.index", compact("partners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.customize.partners.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $data = $request->except("logo");
        $partner = Partner::create($data);

        $this->update_logo($partner);

        return redirect_with_flash("msgSuccess", "Partner created successfully", "customize/partners");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view("admin.pages.customize.partners.update", compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, Partner $partner)
    {
        $data = $request->except("logo");
        $this->update_logo($partner);

        return redirect_with_flash("msgSuccess", "Partner updated successfully", "customize/partners");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $imgProps = [
            'old_image' => $partner->logo,
            'default' => $partner->logo,
        ];

        UploadFiles::removeFile($imgProps);
        $partner->delete();

        return redirect_with_flash("msgSuccess", "Partner deleted successfully", "customize/partners");
    }

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $partners_ids = json_decode(request()->ids, true);

        if (count($partners_ids) > 0) {
            $partners = Partner::whereIn("id", $partners_ids);
            $partners->delete();

            return redirect_with_flash("msgSuccess", "Partners removed successfully", "customize/partners");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "customize/partners");
    }

    // store partner image
    public function update_logo($partner)
    {

        if (request()->hasFile("logo")) {

            $photo = request()->file('logo');
            $storagePath = "assets/dist/storage/customize/partners/";
            $oldFile = $partner->logo;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 200,
                "height" => 130,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $partner->fill(['logo' => $fileInformation['file_path']])->save();
        }
    }
}
