<?php

namespace App\Http\Controllers;

use App\Models\ChungCu;
use Illuminate\Http\Request;

class ChungCuController extends Controller
{
    //
    /**
     * Hiển thị danh sách tòa nhà.
     */
    public function index()
    {
        $buildings = ChungCu::all();
        return view('admin.building.index', compact('buildings'));
    }

    /**
     * Hiển thị form thêm tòa nhà.
     */
    public function create()
    {
        return view('admin.building.add');
    }

    /**
     * Xử lý lưu tòa nhà mới.
     */
    public function store(Request $request)
    {
    
        ChungCu::create([
            'ten_chung_cu' => $request->name,
            'dia_chi' => $request->address,
            'so_tang' => $request->floors
        ]);
        return redirect()->route('building.index')->with('success', 'Tòa nhà đã được thêm thành công!');
    }

    /**
     * Hiển thị chi tiết một tòa nhà.
     */
    public function show(ChungCu $building)
    {
        return view('admin.building.show', compact('building'));
    }

    /**
     * Hiển thị form chỉnh sửa tòa nhà.
     */
    public function edit(ChungCu $building)
    {
        return view('admin.building.edit', compact('building'));
    }

    /**
     * Xử lý cập nhật tòa nhà.
     */
    public function update(Request $request, ChungCu $building)
    {
        $request->validate([
            'ten_chung_cu' => 'required|string|max:255',
            'dia_chi' => 'required|string|max:255',
            'so_tang' => 'required|integer|min:1',
        ]);

        $building->update($request->all());

        return redirect()->route('building.index')->with('success', 'Tòa nhà đã được cập nhật!');
    }

    /**
     * Xóa một tòa nhà.
     */
    public function destroy(ChungCu $building)
    {
        $building->delete();
        return redirect()->route('building.index')->with('success', 'Tòa nhà đã được xóa!');
    }

}
