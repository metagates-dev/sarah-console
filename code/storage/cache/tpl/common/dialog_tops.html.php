<style>
    .tips-bg{position: fixed;left: 0;top: 0;right: 0;bottom: 0;background-color: rgba(0,0,0,0.3);z-index: 8;display: none;}
    .login-tips, .confirm-tips{position: fixed;left: 50%;top: 50%;z-index: 999999999999;background: #fff;width: 400px;border-radius: 5px;box-shadow: #524e4e 0 0 10px;overflow-x: hidden;-webkit-transform: translate(-50%,-50%) scale(0);-moz-transform: translate(-50%,-50%) scale(0);-ms-transform: translate(-50%,-50%) scale(0);-o-transform: translate(-50%,-50%) scale(0);transform: translate(-50%,-50%) scale(0);-webkit-transition: all 0.3s ease;-moz-transition: all 0.3s ease;-o-transition: all 0.3s ease;transition: all 0.3s ease;}
    .tips-show, .confirm-show{-webkit-transform: translate(-50%,-50%) scale(1);-moz-transform: translate(-50%,-50%) scale(1);-ms-transform: translate(-50%,-50%) scale(1);-o-transform: translate(-50%,-50%) scale(1);transform: translate(-50%,-50%) scale(1);}
    .tips-title{background-color: rgba(65, 74, 86, 0.59);color: #fff;padding: 10px 15px;}
    .confirm-title{background-color: #434547;color: #fff;padding: 10px 15px;}
    .tips-content, .confirm-content{padding:15px;color:#434547;text-align: center;}
    .tips-btn{padding: 10px 15px;text-align: center;border-top: 1px solid #eee;letter-spacing: 1px;cursor: pointer;}
    .tips-title-img, .confirm-title-img{width: 20px;margin-right: 5px;}
    .confirm-btn{display: flex;width: 100%;justify-content: center;align-items: center;height: 35px;}
    .confirm-btn-cancel{background-color: #fff;border: none;outline: none;width: 50%;height: 35px;color: #009688;}
    .confirm-btn-save{background-color: #fff;border: none;outline: none;width: 50%;height: 35px;color: #434547;}
    .confirm-btn-cancel:hover{color: #006c78;}
    .confirm-btn-save:hover{color: #777;}
    .receiver-bg{display: none;position: fixed;top: 0;bottom: 0;left: 0;right: 0;background-color: rgba(0,0,0,0.4);}
    .receiver-dialog{position: fixed;top: 50%;left: 50%;width: 500px;height: 300px;margin-left: -250px;margin-top: -150px;background-color: #fff;border-radius: 5px;color: #656565;overflow: hidden;-webkit-transform: scale(0);-moz-transform: scale(0);-ms-transform: scale(0);-o-transform: scale(0);transform: scale(0);-webkit-transition: all 0.2s ease-in-out;-moz-transition: all 0.2s ease-in-out;-o-transition: all 0.2s ease-in-out;transition: all 0.2s ease-in-out;}
    .receiver-dialog-show{-webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);}
    .receiver-dialog-header{width: 100%;height: 40px;line-height: 40px;padding-left: 10px;border-bottom: 1px solid #ddd;}
    .receiver-dialog-input{height: 50px;line-height: 50px;}
    .receiver-dialog-title{padding-left: 30px;width: 120px;}
    .receiver-dialog-content{height: 33px;font-size: 12px;padding-left: 7px;width: 350px;border: 1px solid #ddd;border-radius: 3px;outline: none;}
    .btn-receiver-dialog{display: flex;justify-content: center;align-items: center;margin-top: 20px;border-top: 1px solid #ddd;height: 40px;}
    .cancel-receiver-add{height: 40px;width: 50%;border: none;background-color: #fff;outline: none;}
    .cancel-receiver-add:hover, .save-receiver-add:hover{background-color: #f3f3f3;}

</style>
<div class="tips-bg"></div>
<div class="login-tips">
    <div class="tips-title"><img class="tips-title-img" src="/static/image/icon-tips.png" alt="提示">提示信息</div>
    <div class="tips-content"></div>
    <div class="tips-btn" style="display:none;">确定</div>
</div>

<div class="confirm-tips" id="confirm_tips">
    <div class="confirm-title"><img class="confirm-title-img" src="/static/image/dark/icon-tips.png" alt="提示">提示信息</div>
    <div class="confirm-content"></div>
    <div class="confirm-btn">
        <button class="confirm-btn-cancel" onclick="cancelbtn('confirm-tips','tips-bg','confirm-show')">取消</button>
        <button class="confirm-btn-save" v-on:click="delete_receiver">确定</button>
    </div>
</div>

<div class="receiver-bg"></div>
<div class="receiver-dialog" id="person_form">
    <div class="receiver-dialog-header">添加接收人</div>
    <div class="receiver-dialog-input">
        <label class="receiver-dialog-title" for="receiver_name">姓名：</label>
        <input class="receiver-dialog-content" id="receiver_name" type="text" placeholder="请输入接收人姓名" v-model="receivers_form.name">
    </div>
    <div class="receiver-dialog-input">
        <label class="receiver-dialog-title" for="receiver_tel">手机号码：</label>
        <input class="receiver-dialog-content" id="receiver_tel" type="text" placeholder="请输入接收人电话号码" v-model="receivers_form.mobile">
    </div>
    <div class="receiver-dialog-input">
        <label class="receiver-dialog-title" for="receiver_email">电子邮箱：</label>
        <input class="receiver-dialog-content" id="receiver_email" type="text" placeholder="请输入接收人电子邮箱" v-model="receivers_form.email">
    </div>
    <div class="receiver-dialog-input">
        <label class="receiver-dialog-title" for="receiver_email">微信openid：</label>
        <input class="receiver-dialog-content" id="receiver_openid" type="text" placeholder="请输入接收者微信的openi" v-model="receivers_form.wx_openid">
    </div>
    <div class="btn-receiver-dialog">
        <button class="cancel-receiver-add" v-on:click="cancelReceiver">取消</button>
        <button class="save-receiver-add" v-on:click="updateReceiver">添加</button>
    </div>
</div>

<script>
    function alertMsg(msg){
        $(".tips-content").text(msg);
        $(".tips-bg").show();
        $(".login-tips").addClass("tips-show");
        setTimeout(function(){
            $(".login-tips").removeClass("tips-show");
            $(".tips-bg").hide();
        },1000);
    }
    function cancelbtn(con,bg,removec){
        $("."+con).removeClass(removec);
        $("."+bg).hide()
    }
</script>
