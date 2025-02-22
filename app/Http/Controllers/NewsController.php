<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }
    public function create()
    {
        return view('admin.news.add');
    }

    /**
     * Xử lý lưu tòa nhà mới.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'tieude' => 'required|string|max:255|unique:news,tieude',
            'noidung' => 'required',
            'hinhanh' => 'nullable|image', // Hình ảnh phải là file ảnh
        ]);

        // Xử lý hình ảnh nếu có
        if ($request->hasFile('hinhanh')) {
            // Lấy file hình ảnh
            $image = $request->file('hinhanh');

            // Tạo tên mới cho file hình ảnh
            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images/news'), $imageName); // Di chuyển ảnh vào thư mục public


            // Thêm đường dẫn hình ảnh vào dữ liệu bài viết
            $validatedData['hinhanh'] = '/images/news/' . $imageName;
        }
        // Tạo bài viết mới và lưu vào cơ sở dữ liệu
        $news = News::create($validatedData);

        // Chuyển hướng về trang danh sách tin tức
        return redirect()->route('news.index')->with('success', 'Bài viết đã được thêm!');
    }


    /**
     * Hiển thị chi tiết một tòa nhà.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Hiển thị form chỉnh sửa tòa nhà.
     */
    public function edit(News $news)
    {
        return view('admin.building.edit', compact('news'));
    }

    /**
     * Xử lý cập nhật tòa nhà.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'ten_chung_cu' => 'required|string|max:255',
            'dia_chi' => 'required|string|max:255',
            'so_tang' => 'required|integer|min:1',
        ]);

        $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'Tòa nhà đã được cập nhật!');
    }

    /**
     * Xóa một tòa nhà.
     */
    public function destroy(News $news)
    {
        try {
            // Kiểm tra xem có hình ảnh không
            if ($news->hinhanh && file_exists(public_path($news->hinhanh))) {
                // Xóa hình ảnh khỏi thư mục public
                unlink(public_path($news->hinhanh));
            }

            // Xóa bài viết
            $news->delete();
            return redirect()->route('news.index')->with('success', 'Bài viết đã được xóa!');
        } catch (\Exception $e) {
            // Lưu lỗi vào log nếu cần
            \Log::error('Lỗi khi xóa bài viết: ' . $e->getMessage());

            // Trả về thông báo lỗi cho người dùng
            return redirect()->route('news.index')->with('error', 'Có lỗi xảy ra khi xóa bài viết!');
        }
    }
}
