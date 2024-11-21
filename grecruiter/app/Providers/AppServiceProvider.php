<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\Esport;
use App\Models\Menu;
use App\Models\Rank;
use App\Models\EsportTeam;
use App\Models\Topic;
use App\Models\User;
use App\Models\Comment;

use App\Models\Like;
use App\Repositories\Eloquent\LikeRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\EsportRepository;
use App\Repositories\Eloquent\EsportTeamRepository;
use App\Repositories\Eloquent\MenuRepository;
use App\Repositories\Eloquent\PositionRepository;
use App\Repositories\TopicRepositoryInterface;
use App\Repositories\Eloquent\RankRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\TopicRepository;
use App\Repositories\EsportRepositoryInterface;
use App\Repositories\LikeRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;

use App\Repositories\EsportTeamRepositoryInterface;
use App\Repositories\MenuRepositoryInterface;
use App\Repositories\PositionRepositoryInterface;
use App\Repositories\RankRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Models\Position;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\Eloquent\PostRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(EsportRepositoryInterface::class, function () {
            return new EsportRepository(new Esport());
        });
        $this->app->singleton(RankRepositoryInterface::class, function () {
            return new RankRepository(new Rank());
        });
        $this->app->singleton(UserRepositoryInterface::class, function () {
            return new UserRepository(new User());
        });
        $this->app->singleton(PositionRepositoryInterface::class, function () {
            return new PositionRepository(new Position());
        });
        $this->app->singleton(EsportTeamRepositoryInterface::class, function () {
            return new EsportTeamRepository(new EsportTeam());
        });
        $this->app->singleton(MenuRepositoryInterface::class, function () {
            return new MenuRepository(new Menu());
        });
        $this->app->singleton(TopicRepositoryInterface::class, function () {
            return new TopicRepository(new Topic());
        });
        $this->app->singleton(PostRepositoryInterface::class, function () {
            return new PostRepository(new Post());
        });
        $this->app->singleton(CommentRepositoryInterface::class, function () {
            return new CommentRepository(new Comment());
        });
        $this->app->singleton(LikeRepositoryInterface::class, function () {
            return new LikeRepository(new Like());
        });
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}