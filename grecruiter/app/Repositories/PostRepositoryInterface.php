<?php
namespace App\Repositories;
interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function findBySlug($slug);
    public function publicPosts();
}