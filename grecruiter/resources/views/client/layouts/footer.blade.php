<footer>
    <div class="footer-container">
        <div class="icon-social-list">
            <div class="circle-shape">
                <i class="fa-brands fa-facebook"></i>
              
            </div>
            <div class="circle-shape">
                 <i class="fa-brands fa-twitter"></i>
       
            </div>
            <div class="circle-shape">
               
                <i class="fa-brands fa-discord"></i>    
            </div>
            <div class="circle-shape"> 
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="circle-shape">
               
                <i class="fa-solid fa-paper-plane"></i> 
            </div>
        </div>
        <div class="name-social-list">
            <a href="">Home</a>
            <a href="">Contact</a>
            <a href="">About</a>
            <a href="">News</a>
            <a href="">About Me</a>
        </div>
    </div>
</footer>


<script src="{{asset('assets/user')}}/assets/js/side-bar.js"></script>

<script src="{{asset('assets/user')}}/assets/js/read-more.js"></script>

<script src="{{asset('assets/user')}}/assets/js/tab-detail-teams.js"></script>


@livewireScripts
@notifyJs
<script type="text/javascript" src="{{asset('assets/user')}}/assets/froala_editor_4.2.2/js/froala_editor.pkgd.min.js"></script>
<script>
    var editor = new FroalaEditor('#example');
</script>

</body>
</html>
