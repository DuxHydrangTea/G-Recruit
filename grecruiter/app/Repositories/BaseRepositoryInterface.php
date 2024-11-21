<?php
namespace App\Repositories;
interface BaseRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function restore($id);
    public function soft_delete($id);
    public function force_delete($id);
    public function upload_as($file);
}