@extends('admins::elements.default')

@section('title')
<title>Login</title>
@endsection

@section('content')
<div id="main-container">
    <section id="wrap-login">
        <div class="login bg-white">
            <h3 class="title-login">Pocketにログイン</h3>
            <form action="{{ route('post-login') }}" class="wrap-form" id="form-login" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="inputEmail">メールアドレス</label>
                    <input type="text" name="email" class="form-control" placeholder="メールアドレス" id="inputEmail">
                    <div class="valid-feedback ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword">パスワード</label>
                    <input type="password" name="password" class="form-control" placeholder="パスワード" id="inputPassword">
                    <div class="valid-feedback ">

                    </div>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">私を覚えて</label>
                </div>
                <div class="alert alert-danger" role="alert" id="error-response">

                </div>
                <button class="btn big bg-blue" id="btn-login">ログイン</button>
            </form>
            <a href="" class="forgot-password">パスワードを忘れた場合</a>
        </div>
    </section>
</div>
@endsection

@section('more-script')
    <script src="js/message.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/user.js"></script>
    @endsection

