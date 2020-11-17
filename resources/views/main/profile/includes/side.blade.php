<div class="col-md-4">
    <div class="profile-work">
       
        <a href="">إرسال رسالة</a><br/>
        <div class="row col-md-4 the-likes">
            <span class="icon-thumbs-o-up" onclick="like()"></span> &nbsp;&nbsp; <div id="likes">{{ count($user->likes) }}</div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span class="icon-thumbs-o-down" onclick="dislike()"></span> &nbsp;&nbsp; <div id="dislikes">{{ count($user->dislikes) }}</div>
        </div>

        <div class="row">
            <a href="javascript:void(0)" onclick="favourite()" id="favouriting" class="bookmark col-md-6 text-center">
                <span class="{{ $user->favourite ? "icon-heart" : "icon-heart-o" }}"></span>
            </a>
            <a href="javascript:void(0)" class="report bookmark col-md-6 text-center"><span class="icon-report" onclick="reportPost()"></span></a>
        </div>

        {!! Share::currentPage()->facebook()->twitter()->linkedin()->whatsapp()->telegram() !!}

       
    </div>
</div>