<div>
    <div class="form-write-title grid-1-5" >
        <label for="">Topic</label>
        <select name="topic_id" class="span2-6 out-line-input" >
            <option value="0" >--None--</option>
            @foreach ($topics as  $t)
            <option value="{{$t->id}}" >{{$t->topic_name}}</option>
            @endforeach
           
        </select>
    </div>
    <div class="form-write-title grid-1-5" style="margin-top: 50px">
        <label for="">Esport</label>
        <select   name="esport_id" id="esport_id" class="span2-6 out-line-input" >
            <option value="0" >--None--</option>
            @foreach ($esports as  $e)
            <option value="{{$e->id}}" >{{$e->esport_name}}</option>
            @endforeach
           
        </select>
    </div>

    <div class="form-write-title grid-1-5" style="margin-top: 50px">
        <label for="">Position</label>
        <select  name="position_id" id="position_id" class="span2-6 out-line-input ">
            <option value="0">--None--</option>
            @foreach ($positions as  $p)
            <option value="{{$p->id}}" esport-id="{{$p->esport->id??0}}">{{$p->position_name}}</option>
            @endforeach
           
        </select>
    </div>
    <script>
        const esport = document.getElementById('esport_id');
        const positions = document.querySelectorAll('#position_id option')
        updateSelector(0)
        esport.addEventListener('change', e=>{
            updateSelector(esport.value)
        })
        function updateSelector(esport_id){
            positions.forEach(element => {
                var value = element.getAttribute('esport-id')
                if(value != esport_id)
                    element.style = `display:none`;
                else 
                element.style = `display:block`;
            });
        }
    </script>
</div>
