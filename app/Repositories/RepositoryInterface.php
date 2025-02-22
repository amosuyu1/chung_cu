<?php
// app/Repositories/RepositoryInterface.php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Lấy tất cả bản ghi.
     */
    public function all();

    /**
     * Tìm bản ghi theo ID.
     */
    public function find($id);

    /**
     * Tạo bản ghi mới.
     */
    public function create(array $data);

    /**
     * Cập nhật bản ghi.
     */
    public function update($id, array $data);

    /**
     * Xóa bản ghi.
     */
    public function delete($id);

   /**
     * Lấy bản ghi với điều kiện.
     */ 
    public function getByConditions(array $conditions);
/**
     * Lấy tất cả bản ghi với điều kiện.
     */
    public function getAllWithRoles($query, $orderBy, $orderDirection, $perPage);
}