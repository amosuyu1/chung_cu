<?php

namespace App\Http\Controllers;

use App\Models\CanHo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{
    public function index()
    {
        // Cache danh sách căn hộ trong 1 ngày
        $canhos = Cache::remember('canho_list', 1440, function () {
            return CanHo::all();
        });
        return view('client.index', compact('canhos'));
    }
    public function cache()
    {
        // Kiểm tra cache trước
        $canhos = Cache::get('canho_list');

        // Nếu không có cache, lấy dữ liệu từ DB và lưu vào cache
        if (!$canhos) {
            $canhos = Cache::remember('canho_list', 1440, function () {
                return CanHo::all();
            });
        }

        // Trả về view với dữ liệu từ cache (hoặc DB)
        return view('client.index', compact('canhos'));
    }
}
