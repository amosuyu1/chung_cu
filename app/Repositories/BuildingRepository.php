<?php
// app/Repositories/CanHoRepository.php
namespace App\Repositories;

use App\Models\ChungCu;
use Illuminate\Support\Facades\DB;

class BuildingRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Khởi tạo BuildingRepository.
     */
    public function __construct(ChungCu $model)
    {
        parent::__construct($model); // Sử dụng ChungCu model như tham số
    }

    public function find($id)
    {
        return $this->model->find($id); // Tìm kiếm dựa trên ID
    }

    /**
     * Lấy danh sách các chung cư.
     */
    public function getAll()
    {
        return $this->model->all(); // Lấy tất cả các chung cư
    }
}
