<?php

namespace App\Http\Controllers\Dashboard\Admin\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customize\BlockRequest;
use App\Models\Block;
use App\Traits\UploadFiles;

class BlockController extends Controller
{
    use UploadFiles;
    
    public function __construct()
    {
        $this->middleware('permission:access_block', ['only' => 'index']);
        $this->middleware('permission:create_block', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_block', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_block', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blocks = Block::orderBy('id', "desc")->get();

        return view("admin.pages.customize.blocks.index", compact("blocks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.customize.blocks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlockRequest $request)
    {
        $data = $request->except("icon");
        $block = Block::create($data);

        $this->update_logo($block);

        return redirect_with_flash("msgSuccess", "Block created successfully", "customize/blocks");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Block $block)
    {
        return view("admin.pages.customize.blocks.update", compact("block"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlockRequest $request, Block $block)
    {
        $data = $request->except("icon");
        $block->fill($data);

        $this->update_logo($block);

        return redirect_with_flash("msgSuccess", "Block updated successfully", "customize/blocks");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Block $block)
    {
        $imgProps = [
            'old_image' => $block->icon,
            'default' => $block->icon,
        ];

        UploadFiles::removeFile($imgProps);
        $block->delete();

        return redirect_with_flash("msgSuccess", "Block deleted successfully", "customize/blocks");
    }

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $blocks_ids = json_decode(request()->ids, true);

        if (count($blocks_ids) > 0) {
            $blocks = Block::whereIn("id", $blocks_ids);
            $blocks->delete();

            return redirect_with_flash("msgSuccess", "Blocks removed successfully", "customize/blocks");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "customize/blocks");
    }

    // store partner image
    public function update_logo($partner)
    {
        if (request()->hasFile("icon")) {

            $photo = request()->file('icon');
            $storagePath = "assets/dist/storage/customize/blocks/";
            $oldFile = $partner->icon;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo,
                "storagePath" => $storagePath,
                "old_image" => $oldFile,
                "default" => $default,
                "width" => 68,
                "height" => 68,
                "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $partner->fill(['icon' => $fileInformation['file_path']])->save();
        }
    }
}
