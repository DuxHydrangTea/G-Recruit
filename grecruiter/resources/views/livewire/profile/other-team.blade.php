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
          <div class="icon-open-gallary">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
              <path fill="currentColor" d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3" />
            </svg>
          </div>
         </label>
        <button type="submit" class="my-btn my-btn-save">Save</button>
       </form>
        
        
        <form class="py-2 change-profile" method="post" action="{{route('client.update_name_team')}}">
          @csrf
          <input type="text" name="name" value="{{$team->name}}"> 
          <button type="submit" class="edit-btn">Rename</button>
        </form>
        <hr />
        <form action="{{route('client.update_esport_my_team')}}" class="side-1-esport change-profile" method="post" >
          @csrf
          <img
            src="/storage/images/{{$team->esport->icon}}"
            height="30px"
            width="30px"
            alt=""
          />
          
          <select name="esport_id" id="" >
              @foreach ($esports as $eps )
              <option value="{{$eps->id}}" {{$team->esport->id == $eps->id ? "selected" : ""}}>{{$eps->esport_name}}</option>
              @endforeach    
          </select>
          <button type="submit" class="my-btn my-btn-save">Save</button>
          {{-- <h3><i>{{$team->esport->esport_name}}</i></h3> --}}
        </form>
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
                
                <td><a href="{{route('client.kick_my_member', $mem->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                  <g fill="none">
                    <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                    <path fill="currentColor" d="M16 14a5 5 0 0 1 5 5v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1a5 5 0 0 1 5-5zM12 2a5 5 0 1 1 0 10a5 5 0 0 1 0-10m10 8a1 1 0 0 1 .117 1.993L22 12h-4a1 1 0 0 1-.117-1.993L18 10z" />
                  </g>
                </svg></a></td>
              </tr>
            @endforeach
        
         
        </table>

        <details class="team-info-down" open>
          <summary>
            <h2 class="team-introduce-heading">
              Team Introduce
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="1.2em"
                height="1.2em"
                viewBox="0 0 48 48"
              >
                <defs>
                  <mask id="ipSDownC0">
                    <g
                      fill="none"
                      stroke-linejoin="round"
                      stroke-width="4"
                    >
                      <path
                        fill="#fff"
                        stroke="#fff"
                        d="M24 44c11.046 0 20-8.954 20-20S35.046 4 24 4S4 12.954 4 24s8.954 20 20 20Z"
                      />
                      <path
                        stroke="#000"
                        stroke-linecap="round"
                        d="m33 21l-9 9l-9-9"
                      />
                    </g>
                  </mask>
                </defs>
                <path
                  fill="currentColor"
                  d="M0 0h48v48H0z"
                  mask="url(#ipSDownC0)"
                />
              </svg>
            </h2>
          </summary>

          <form class="team-introduce-content change-profile" method="POST" action="{{route('client.update_information_team')}}">
            @csrf
            <button type="submit" class="my-btn my-btn-save">Save</button>
              <textarea name="description" id="" rows="10">{{$team->description}}
              </textarea>
               
          </form>
        </details>
      </div>
      <div class="team-info-side">
        <div class="team-info-side-tab">
          <button id="introduce-tab-button" class="active">
            Introduce & Posts
          </button>
          <a href="">Approving</a>
        </div>
        <div class="" id="introduce-tab">
          <div class="main-text-part">
            <h2>Posts of Team</h2>
            @forelse ($posts as $post )
            <div class="poster-item bg-gray-50">
                <div class="p-2">
                  <header class="poster-item-header pb-1">
                    <img
                      src="/storage/images/{{$post->thumbnail}}"
                      class="poster-item-header-img"
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
                  <hr />
                  <div class="content max-line-4">
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