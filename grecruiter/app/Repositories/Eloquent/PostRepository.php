<?php
namespace App\Repositories\Eloquent;
use App\Repositories\PostRepositoryInterface;
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function findBySlug($slug)
    {
        return $this->model->get()->where('slug', $slug)->first();
    }
    public function publicPosts()
    {
        return $this->model->public()->get();
    }
}