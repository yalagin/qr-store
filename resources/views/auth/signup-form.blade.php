<form class="form" novalidate="novalidate" id="kt_login_signup_form" method="post"
      action="{{ url('/register') }}">
@csrf

<!--begin::Title-->
    <div class="pb-13 pt-lg-0 pt-5">
        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
        <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your
            account</p>
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
               type="text" placeholder="name" name="name" autocomplete="off" value="{{ old('name') }}"/>
        @if ($errors->has('name'))
            <span class="fv-plugins-message-container">
                <strong class="fv-help-block">>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div>{{debug(old()) }}</div>
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
               type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}"/>
        @if ($errors->has('email'))
            <span class="fv-plugins-message-container">
                <strong class="fv-help-block">{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
               type="password" placeholder="Password" name="password" autocomplete="off"/>
        @if ($errors->has('password'))
            <span class="fv-plugins-message-container">
                <strong class="fv-help-block">{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
               type="password" placeholder="Confirm password" name="password_confirmation" autocomplete="off"/>
        @if ($errors->has('password_confirmation'))
            <span class="fv-plugins-message-container">
                <strong class="fv-help-block">{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <label class="checkbox mb-0">
            <input type="checkbox" name="agree"/>I Agree the
            <a href="#">terms and conditions</a>.
            <span></span></label>
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
        <button type="button" id="kt_login_signup_submit"
                class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit
        </button>
        <button type="submit" id="kt_login_signup_cancel"
                class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Back to
            Login
        </button>
    </div>
    <!--end::Form group-->
</form>
