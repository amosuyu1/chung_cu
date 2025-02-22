<?php
// app/Repositories/CanHoRepository.php
namespace App\Repositories;

use App\Models\CanHo;
use Illuminate\Support\Facades\DB;

class CanHoRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Khởi tạo CanHoRepository.
     */
    public function __construct(CanHo $model)
    {
        parent::__construct($model);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
    /**
     * Lấy danh sách căn hộ theo dự án.
     */
    public function getByDuAn($duAnId)
    {
        return $this->model->whereHas('toaNha.duAn', function ($query) use ($duAnId) {
            $query->where('id', $duAnId);
        })->get();
    }
    public function getAll($query)
    {
        return  DB::table('can_ho')
            ->join('chung_cu', 'can_ho.chung_cu_id', '=', 'chung_cu.id')
            ->select('can_ho.*', 'chung_cu.ten_chung_cu')
            ->when($query, function ($q) use ($query) {
                return $q->where('users.name', 'LIKE', "%{$query}%")
                    ->orWhere('users.email', 'LIKE', "%{$query}%")
                    ->orWhere('roles.role_name', 'LIKE', "%{$query}%");
            })
            ->get();
    }
    public function getAllWithRoles($query, $status = null, $orderBy = 'id', $orderDirection = 'asc', $perPage = 5)
    {
        return DB::table('can_ho')
            ->join('chung_cu', 'can_ho.chung_cu_id', '=', 'chung_cu.id')
            ->select('can_ho.*', 'chung_cu.ten_chung_cu')
            ->when($query, function ($q) use ($query) {
                return $q->where(function ($q) use ($query) {
                    $q->where('can_ho.ten_can_ho', 'LIKE', "%{$query}%")
                        ->orWhere('can_ho.so_phong', 'LIKE', "%{$query}%")
                        ->orWhere('chung_cu.ten_chung_cu', 'LIKE', "%{$query}%");
                });
            })
            ->when(isset($status), function ($q) use ($status) {
                return $q->where('can_ho.trang_thai', $status);
            })
            ->orderBy($orderBy, $orderDirection) // Sắp xếp theo cột
            ->paginate($perPage); // Phân trang
    }
    public function delete($id)
    {
        $canHo = $this->model->find($id);

        if (!$canHo) {
            return false;
        }

        // Xóa ảnh trong thư mục public (nếu có)
        $images = json_decode($canHo->images, true);
        if ($images) {
            foreach ($images as $image) {
                $imagePath = public_path(str_replace('\\', '/', $image)); // Chuyển `\` thành `/`
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Xóa bản ghi trong database
        return $canHo->delete();
    }
}
