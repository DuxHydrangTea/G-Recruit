<?php
namespace App\Repositories\Eloquent;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->update($data);
            return $record;
        }
        return false;
    }

    public function restore($id)
    {
        $record = $this->model->withTrashed()->find($id);
        if ($record) {
            $record->restore();
            return true;
        }
        return false;
    }

    public function soft_delete($id)
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->delete();
            return true;
        }
        return false;
    }
    public function force_delete($id)
    {
        $record = $this->model->withTrashed()->find($id);
        if ($record) {
            $record->forceDelete();
            return true;
        }
        return false;

    }
    public function upload_as($file)
    {
        try {
            // $nameFile = $re->icon->getClientOriginalName();
            // $path = $re->icon->storeAs("public/images", $nameFile);
            $name_file = $file->getClientOriginalName();
            $path = $file->storeAs("public/images", $name_file);
            return $name_file;
        } catch (\Throwable $th) {
            echo $path;
            return "";
        }
    }

}