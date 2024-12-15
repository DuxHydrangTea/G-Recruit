<div class="container" id="tab-info-2" style="display: none; margin-top: 20px">
    @if (!isset($team))
        <h1>Anh bạn này chưa gia nhập đội tuyển nào!</h1>      
    @else
    <div class="team-info">
      <div class="team-info-side side-1">
       <form action="{{route('my_team.handle_avatar')}}" class="py-2 change-profile" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="avatar_team">
          <img
          id="show_avatar_team"
            class="side-1-avatar"
            src="/storage{{$team->avatar}}"
            alt=""
            accept="image/*"
          />
          <input type="file" name="avatar" hidden id="avatar_team" onchange="document.getElementById('show_avatar_team').src = window.URL.createObjectURL(this.files[0])">
          
         </label>
        <button type="submit" class="my-btn my-btn-Lưu">Lưu</button>
      
        
        
      
          <h1 class="font-bold uppercase text-center mb-3">{{$team->name}}</h1>
         
       
        <hr />
        <div class="side-1-esport change-profile flex"  >
          
          <img
            src="/storage{{$team->esport->icon}}"
            height="30px"
            width="30px"
            alt=""
          />
          
          <span>{{$team->esport->esport_name}}</span>
        </div>
        <p class="founder"><strong><i class="fa-solid fa-user-tie"></i> :</strong> 
        @foreach ($team->users as $founder )
                {{$founder->name." / "}}
        @endforeach
            
        </p>
        <i class="created_at"> <strong><i class="fa-solid fa-calendar-days"></i> : </strong> {{$team->created_at->format('Y-d-m')}} </i>
        <table class="esport-team-member">
            @foreach ($members as $mem )
            <tr>
                <td class="position">{{$mem->position->position_name}}:</td>
                <td><a href="">{{$mem->name}} ({{$mem->nickname}})</a></td>
                
               
              </tr>
            @endforeach
        
         
        </table>

        <details class="team-info-down" open>
          <summary>
            <h2 class="btn bg-purple-800 text-white w-full">
              Team Introduce
              <i class="fa-solid fa-chevron-down text-white"></i>
            </h2>
          </summary>

          <div class="">
           
              <div class="p-3">{!!$team->description!!}
              </div>
               
          </div>
        </details>
      </div>
      <div class="team-info-side">
        
        <div class="" id="introduce-tab">
          <div class="main-text-part">
            <h2>Bài viết của đội tuyển</h2>
            @forelse ($posts as $post )
            <div class="poster-item bg-gray-50">
                <div class="p-2">
                  <header class="poster-item-header pb-1">
                    <img
                      src="/storage{{$post->thumbnail}}"
                      class="poster-item-header-img rounded"
                    />
                    <div class="poster-name">
                      <p class="hover:underline font-bold text-rose-600">
                        {{$team->name}}
                      </p>
                      <span>{{$post->topic->topic_name}}</span>
                      <span class="esport-in-post">
                        - {{$post->esport->esport_name}}</span
                      >
                      <span class="text-gray-400"> - {{$post->created_at->diffForHumans()}}</span>
                    </div>
                  </header>
                  <hr>
                  <div class="divider"> <h1 class="cursor-pointer ">{{$post->title}}</h1></div>
                  <hr />
                  <div class=" line-clamp-4">
                    {!!$post->content!!}
                  </div>
                </div>
                <hr>
                <img
                  src="/assets/images/Virtus-Pro-.jpg"
                  alt=""
                  srcset=""
                  width="100%"
                />
                <p class="count-comment">53 comments</p>
              </div>
            
            @empty
                <h1>Team chưa có bài viết nào!</h1>
            @endforelse
          
          </div>
        </div>
        <div id="approve-tab"></div>
      </div>
    </div>
    @endif
    <script>
      $(document).ready(function () {
       $('#avatar_team').change(function(){
         if(this.value){
          
         }
       });
        
      });
    </script>
</div>