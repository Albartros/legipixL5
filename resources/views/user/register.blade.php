@extends('layout.layout')

@section('title', trans('register.pageTitle'))

@section('content')
    <section class="register">
        <article class="register__container">
            <div class="register__form">
                <div class="register__form__top">
                    <svg class="register__form__top__icon" version="1.1" viewBox="0 0 658 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="register__form__top__icon__path"
                              d="M182.857 438.857h292.571v-109.714q0-60.571-42.857-103.429t-103.429-42.857-103.429 42.857-42.857 103.429v109.714zM658.286 493.714v329.143q0 22.857-16 38.857t-38.857 16h-548.571q-22.857 0-38.857-16t-16-38.857v-329.143q0-22.857 16-38.857t38.857-16h18.286v-109.714q0-105.143 75.429-180.571t180.571-75.429 180.571 75.429 75.429 180.571v109.714h18.286q22.857 0 38.857 16t16 38.857z"></path>
                    </svg>
                    <h3 class="register__form__top__title">{{ trans('register.loginTitle') }}
                        <small>{{ trans('register.loginTitleSmall') }}</small>
                    </h3>
                    <p class="register__form__top__description">{{ trans('register.loginTitleSub') }} :</p>
                </div>
                <div class="register__form__bottom">
                    {!! Form::open(array('route' => 'user.register')) !!}
                    {!! Form::label('login-email', trans('register.loginFormEmailLabel'), array('class' => 'form__largeLabel')) !!}
                    {!! Form::email('login-email', null, array('class' => 'form__largeInput', 'required', 'placeholder' => 'ex: john.doe@example.com')) !!}
                    {!! Form::label('login-pass', trans('register.loginFormPassLabel'), array('class' => 'form__largeLabel')) !!}
                    {!! Form::password('login-pass', array('class' => 'form__largeInput', 'required', 'placeholder' => 'ex: &#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;')) !!}
                    {!! Form::submit(trans('register.loginSubmit'), array('class' => 'button form__largeSubmit')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </article>
        <div class="register__separator">{{ trans('register.orSeparator') }}</div>
        <article class="register__container">
            <div class="register__form">
                <div class="register__form__top">
                    <svg class="register__form__top__icon register__form__top__icon--alt" version="1.1"
                         viewBox="0 0 877.7142857142858 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="register__form__top__icon__path"
                              d="M207.429 877.714l52-52-134.286-134.286-52 52v61.143h73.143v73.143h61.143zM506.286 347.429q0-12.571-12.571-12.571-5.714 0-9.714 4l-309.714 309.714q-4 4-4 9.714 0 12.571 12.571 12.571 5.714 0 9.714-4l309.714-309.714q4-4 4-9.714zM475.429 237.714l237.714 237.714-475.429 475.429h-237.714v-237.714zM865.714 292.571q0 30.286-21.143 51.429l-94.857 94.857-237.714-237.714 94.857-94.286q20.571-21.714 51.429-21.714 30.286 0 52 21.714l134.286 133.714q21.143 22.286 21.143 52z"></path>
                    </svg>
                    <h3 class="register__form__top__title">{{ trans('register.registerTitle') }}
                        <small>{{ trans('register.registerTitleSmall') }}</small>
                    </h3>
                    <p class="register__form__top__description">{{ trans('register.registerTitleSub') }} :</p>
                </div>
                <div class="register__form__bottom formWithCaptcha">
                    {!! Form::open(array('route' => 'user.register')) !!}
                    <label class="form__largeLabel form__largeLabel--withSmall" for="register-email">{{ trans
                    ('register.registerFormEmailLabel') }}<br>
                        <small>{{ trans('register.registerFormEmailLabelSub') }}</small>
                    </label>
                    {!! Form::email('register-email', null, array('id' => 'register-email', 'class' => 'form__largeInput', 'required', 'placeholder' => 'ex: john.doe@example.com')) !!}
                    <label class="form__largeLabel form__largeLabel--withSmall" for="register-name">{{ trans
                    ('register.registerFormNameLabel') }}<br>
                        <small>{{ trans('register.registerFormNameLabelSub') }}</small>
                    </label>
                    {!! Form::text('register-name', null, array('id' => 'register-name', 'class' => 'form__largeInput', 'required', 'placeholder' => 'ex: johnDoe007')) !!}
                    <label class="form__largeLabel form__largeLabel--withSmall"
                           for="register-pass">{{ trans('register.registerFormPassLabel') }}<br>
                        <small>{{ trans('register.registerFormPassLabelSub') }}</small>
                    </label>
                    {!! Form::password('register-pass', array('id' => 'register-pass', 'class' => 'form__largeInput', 'required', 'placeholder' => 'ex: &#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;')) !!}
                    {!! Form::label('register-confirm', trans('register.registerFormConfirmLabel'), array('class' => 'form__largeLabel')) !!}
                    {!! Form::password('register-confirm', array('class' => 'form__largeInput', 'required', 'placeholder' => 'ex: &#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;')) !!}
                    {!! Recaptcha::render() !!}
                    {!! Form::submit(trans('register.registerSubmit'), array('class' => 'button form__largeSubmit')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </article>
    </section>
@endsection

@section('scripts')
    @parent
@endsection