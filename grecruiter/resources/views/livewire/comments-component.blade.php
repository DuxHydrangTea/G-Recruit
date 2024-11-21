<div class="list-sport-comments ">
    <div class="filter-bar">
        <h1 class="text-2xl">Interactions</h1>
        <p><span><button href="" wire:click="likeAction"><i class=" {{$is_liked ? 'fa-solid' : 'fa-regular'}} fa-thumbs-up"></i></span> {{$countLike}} <span>Like</span></button></p> 
        <form wire:submit="submit_comment" class="form-comments  flex flex-column gap-5">

            <div class="input-group">
                <textarea wire:model="comment_text" type="text" class="form-control" placeholder="Comment here..." rows="5"></textarea> 
                
            </div>
            <button type="submit" class="btn btn-primary "><i class="fa-regular fa-paper-plane text-white"></i></button>
        </form>   
       

    </div>
    <div class="comment-container">
        <p class="text-xl comment-container-heading">Comments ( {{count($comments)}} )</p>
        <ul class="comment-list">
            
            @forelse ($comments as $cmt )
            <li class="flex flex-row gap-5">
                <img src="/storage/images/{{$cmt->user->avatar}}" alt="" class="avatar-sm" srcset=""> 
                <div class="comment-body ">
                     <p class="font-bold">{{$cmt->user->name}} <small class="text-gray-500 "> {{$cmt->created_at->diffForHumans()}}</small> </p>
                     <p class="comment-body-text">{!!nl2br($cmt->comment_text)!!}
                         </p>
                </div>
             </li>
            @empty
                
            @endforelse
            
           
            
        </ul>

    </div>
</div>