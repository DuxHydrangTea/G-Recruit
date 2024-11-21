<div>
    <div class="list-esport">
        <div class="title-list-bar">
          <h3>Posts</h3>
          <h3>See All</h3>
        </div>
        <div class="list-post-main">
        @foreach ($posts as $p )
        <div class="post-main-item">
            <div class="post-detail">
                @php
                $author = $p->user_id != 0 ? $p->user: $p->esportTeam 
            @endphp
              <div class="post-detail-header">
                   <img src="{{asset('storage/images')}}/{{$author->avatar}}" class="avatar-post" alt="" style="border-radius: 50%" >
                  <div class="post-detail-header-user">
                   
                    <span> {{$author->name}}   </span><span> - {{$p->created_at->diffForHumans()}}</span>
                    <p class="esport-in-post">{{$p->esport->esport_name?? "Không môn nào"}}</p>
                  </div>
              </div>
              <hr>
              <div class="post-detail-content">
                {{$p->title}}
                    <br>
                <span class="topic-name-post">{{$p->topic->topic_name?? "Không chủ đề"}}</span><span>
                 
                    
                    {{$p->abstract}}</span>
              </div>
            </div>
            <div class="thumbnail-container">
              <img class="post-thumbnail" src="{{asset('storage/images')}}/{{$p->thumbnail}}" alt="">
            </div>
            
            <a href="{{route('client.post.show', $p->slug)}}" class="read-more-post">Read More</a>
          </div>
        @endforeach
           

        </div>
      </div>
</div>
