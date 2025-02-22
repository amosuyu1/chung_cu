<?php

namespace App\Http\Controllers;

use App\Models\CanHo;
use App\Models\ChungCu;
use App\Repositories\CanHoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CanHoController extends Controller
{
    protected $canHoRepository;
    // Inject Repository vào constructor
    public function __construct(CanHoRepository $canHoRepository)
    {
        $this->canHoRepository = $canHoRepository;
    }
    public function show($id)
    {
        // Lấy CanHo từ repository
        $canHo = $this->canHoRepository->findOrFail($id);

        // Eager load quan hệ 'building' sau khi đã lấy đối tượng
        $canHo->load('building');
        return view('admin.apartment.show', compact('canHo'));
    }
    public function indexAdmin()
    {
        // Sử dụng phương thức từ Repository
        $canHos = $this->canHoRepository->getAll();

        return view('admin.layout', compact('canHos'));
    }
    public function index(Request $request)
    {
        // Sử dụng phương thức từ Repository
        // $query = $request->input('query');
        // $orderBy = $request->input('orderBy', 'id');
        // $orderDirection = $request->input('orderDirection', 'asc');
        // $perPage = $request->input('perPage', 5);
        // $status = $request->input('status', 0);
        // $rows = $this->canHoRepository->getAllWithRoles($query, $status, $orderBy, $orderDirection, $perPage);
        $rows = CanHo::all()->load('building');
        return view('admin.apartment.index', compact('rows'));
    }

    public function updateStatus(Request $request, $id)
    {;
        $room = CanHo::find($id);

        if ($room) {
            $room->trang_thai = $request->status;
            $room->save();

            return response()->json(['success' => true, 'message' => 'Cập nhật thành công!']);
        }

        return response()->json(['success' => false, 'message' => 'Không tìm thấy căn hộ!']);
    }
    public function destroy($id)
    {
        $canHo = $this->canHoRepository->find($id);

        if (!$canHo) {
            return redirect()->route('room.index')->with('error', 'Không tìm thấy căn hộ!');
        }

        $deleted = $this->canHoRepository->delete($id);

        if ($deleted) {
            return redirect()->back()->with('success', 'Xóa thành công!');
        } else {
            return redirect()->back()->with('error', 'Xóa không thành công!');
        }
    }
    public function create()
    {
        $buildings = ChungCu::all();
        return view('admin.apartment.add', compact('buildings'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ten_can_ho' => 'required|string|max:255',
            'so_phong' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate ảnh
        ]);
        // Xử lý upload nhiều ảnh
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Lưu ảnh vào public/images/canho
                $fileName = time() . '_' . $image->getClientOriginalName(); // Đổi tên tránh trùng lặp
                $image->move(public_path('images/canho'), $fileName); // Di chuyển ảnh vào thư mục public

                // Lưu đường dẫn ảnh vào database
                $imagePaths[] = 'images/canho/' . $fileName;
            }
        }
        // Lưu dữ liệu vào database
        CanHo::create([
            'ten_can_ho' => $request->ten_can_ho,
            'so_phong' => $request->so_phong,
            'phong_tam' => $request->phong_tam,
            'mo_ta' => $request->mo_ta,
            'Huong_nha' => $request->Huong_nha,
            'muc_dich' => $request->muc_dich,
            'dien_tich' => $request->dien_tich,
            'gia' => $request->gia,
            'noi_that' => $request->noi_that,
            'gia_thue' => $request->gia_thue,
            'chung_cu_id' => $request->id_chung_cu,
            'images' => json_encode($imagePaths), // Lưu đường dẫn dưới dạng JSON
        ]);

        return redirect()->route('addNewRoom')->with('success', 'Thêm căn hộ thành công!');
    }
    public function edit($id)
    {
        $room = $this->canHoRepository->find($id); // Hoặc lấy từ repository của bạn
        $buildings = ChungCu::all(); // Danh sách các dự án
        return view('admin.apartment.edit', compact('room', 'buildings'));
    }
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'ten_can_ho'  => 'required|string|max:255',
            'mo_ta'       => 'nullable|string',
            'dien_tich'   => 'required|numeric',
            'gia'         => 'nullable|string',
            'gia_thue'    => 'nullable|string',
            // Các validation khác nếu cần
        ]);

        // Lấy căn hộ cần sửa
        $room = $this->canHoRepository->find($id);

        if (!$room) {
            return redirect()->route('room.index')->with('error', 'Căn hộ không tồn tại!');
        }
        // Cập nhật thông tin căn hộ (không xử lý ảnh ở đây)
        $room->update([
            'ten_can_ho'  => $request->ten_can_ho,
            'mo_ta'       => $request->mo_ta,
            'dien_tich'   => $request->dien_tich,
            'gia'         => $request->gia,
            'gia_thue'    => $request->gia_thue,
            'huong_nha'   => $request->Huong_nha,
            'muc_dich'    => $request->muc_dich,
            'so_phong'    => $request->so_phong,
            'phong_tam'   => $request->phong_tam,
            'noi_that'    => $request->noi_that,
            'chung_cu_id' => $request->id_chung_cu, // Lưu dự án căn hộ
        ]);

        // Xử lý ảnh nếu có ảnh mới được upload
        if ($request->hasFile('images')) {

            // Xóa các ảnh cũ nếu có
            if ($room->images) {
                $oldImages = json_decode($room->images, true);
                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        $oldImagePath = public_path($oldImage);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                }
            }

            // Upload ảnh mới
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                // Đặt tên file mới để tránh trùng lặp (sử dụng timestamp kết hợp tên gốc)
                $filename = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('images/canho');
                $image->move($destinationPath, $filename);
                $imagePaths[] = 'images/canho/' . $filename;
            }
            // Cập nhật lại trường images của room
            $room->images = json_encode($imagePaths);
            $room->save();
        }

        return redirect()->route('room.index')->with('success', 'Cập nhật căn hộ thành công!');
    }
}
