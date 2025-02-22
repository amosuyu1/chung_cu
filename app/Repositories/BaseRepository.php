<?php
// app/Repositories/BaseRepository.php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    /**
     * Khởi tạo BaseRepository.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Lấy tất cả bản ghi.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Tìm bản ghi theo ID.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
    /**
     * Tạo bản ghi mới.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Cập nhật bản ghi.
     */
    public function update($id, array $data)
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->update($data);
            return $record;
        }
        return null;
    }

    /**
     * Xóa bản ghi.
     */
    public function delete($id)
    {
        $record = $this->model->find($id);
        if ($record) {
            return $record->delete();
        }
        return false;
    }

    /**
     * Lấy bản ghi với điều kiện.
     */
    public function getByConditions(array $conditions)
    {
        $query = $this->model;
        foreach ($conditions as $field => $value) {
            $query = $query->where($field, $value);
        }
        return $query->get();
    }
}
