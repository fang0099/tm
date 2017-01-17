<div class="m">
    <section class="wrapper" style="min-height: 1236px;">
        <section class="c-page page-cont">
            <div class="user-set-cont">
                <h1 class="title">账号设置</h1>
                <div class="avatar change-avatar_open" data-popup-ordinal="0" id="open_2047384">
                    <img width="100" height="100" src="{{data.avatar}}" id="user-setting-avatar" >
                    <span class="change-avatar">修改头像</span>
                </div>
                <div class="user-form">
                    <div class="form-part">
                        <label for="nickname">昵称</label>
                        <input type="text" name="params[username]" id="username" value="{{data.username}}" class="input_profile hide">
                        <div class="input_profile_txt">{{data.username}}</div>
                        <div class="right-button">
                            <button class="btn-bordered gray btn-small btn modify_nickname_open js-modify">修改</button>
                            <span class="modify-btns hide">
                                <button class="btn-bordered orange btn-small btn modify_nickname_open js-save">保存</button> 
                                <button class="btn-bordered gray btn-small btn modify_nickname_open js-cancel">取消</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-part">
                        <label for="nickname">个性签名</label>
                        <textarea name="params[brief]" class="input_profile hide" placeholder="" style="overflow: hidden; word-wrap: break-word; height: 40px;">{{data.brief}}</textarea>
                        <div class="input_profile_txt">{{data.brief}}</div>
                        <p class="part-reminder hide">可以输入280个字</p>
                        <div class="right-button top">
                            <button class="btn-bordered gray btn-small btn js-modify">修改</button>
                            <span class="modify-btns hide">
                            <button class="btn-bordered orange btn-small btn modify_nickname_open js-save">保存</button> <button class="btn-bordered gray btn-small btn modify_nickname_open js-cancel">取消</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-part">
                        <label>电子邮箱</label>
                        <input type="text" name="params[email]" id="email" value="{{data.email}}" class="input_profile hide">
                        <div class="input_profile_txt">{{data.email}}</div>
                        <p class="part-reminder hide">您的邮箱还没有验证激活，部分网站功能无法使用。您可以选择<a href="/account/verification" class="key-link verification_popup_open" data-popup-ordinal="0" id="open_84079044">重发激活邮件</a></p>
                        <div class="right-button top">
                            <button class="btn-bordered gray btn-small btn js-modify">修改</button>
                            <span class="modify-btns hide">
                                <button class="btn-bordered orange btn-small btn modify_nickname_open js-save">保存</button> <button class="btn-bordered gray btn-small btn modify_nickname_open js-cancel">取消</button>
                            </span>
                        </div>
                    </div>


                    <div class="form-part">
                        <label>修改密码</label>
                        <input type="password" value="***" name="params[password]" class="input_profile password" disabled="">
                        <div class="right-button">
                            <button class="btn-bordered gray btn-small btn change-password_open" data-popup-ordinal="0" id="open_39302769">修改</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>

</div>
