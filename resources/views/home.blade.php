@extends('master') @section('title') Home @endsection @section('content')
<div class="home-container">
    <div class="home-desc-main">
        <h1>{{ __("A simple and secure way to share notes") }}</h1>
        <h3>
            {{
                __(
                    "SendNote is a free online service that allows you to share notes/messages securely. The notes you send are encrypted and deleted as quickly as possible, whether after a set period of time or after a set number of views."
                )
            }}
        </h3>
    </div>
    @if($errors->any())
    <div class="home-error-container">
        <div>
            @foreach($errors->all() as $err)
            <h4>{{ $err }}</h4>
            @endforeach
        </div>
    </div>
    @endif
    <div class="home-content">
        <form action="/create" method="post">
            @csrf
            <ul>
                <li>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="{{ __('Note title') }}..."
                        value="{{ old('title') }}"
                        max="255"
                    />
                </li>
                <li>
                    <label>
                        {{ __("Expiration date") }}
                        <input
                            type="date"
                            name="expiration_date"
                            value="{{ old('expiration_date') }}"
                        />
                    </label>
                </li>
            </ul>

            <textarea
                name="note_content"
                id="note_content"
                cols="30"
                rows="10"
                placeholder="{{ __('Write a note') }}..."
                maxlength="4096"
                >{{ old("note_content") }}</textarea
            >

            {{-- item --}}
            <div class="label-checkbox">
                <label
                    ><input
                        type="checkbox"
                        name="with_password"
                        id="with_password" />
                    <span></span></label
                >{{ __("Secure with password") }}
            </div>
            <div class="label-hidden" id="label-pass">
                <label for="password">{{
                    __("Enter password to secure the message")
                }}</label>
                <input type="password" name="password" id="password" />
                <label for="password_conf">{{ __("Confirm password") }}</label>
                <input
                    type="password"
                    name="password_conf"
                    id="password_conf"
                />
            </div>

            {{-- item --}}
            <div class="label-checkbox">
                <label>
                    <input
                        type="checkbox"
                        name="with_notification"
                        id="with_notification"
                        disabled />
                    <span></span></label
                >{{
                    __(
                        "Destruction notification (will be working in the future)"
                    )
                }}
            </div>
            <div class="label-hidden" id="label-notif">
                <label for="email">{{
                    __("Email address to notify when the message is destroyed")
                }}</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                />
                <label for="email_ref">{{
                    __("Reference name for the message (optional)")
                }}</label>
                <input
                    type="text"
                    name="email_ref"
                    value="{{ old('email_ref') }}"
                />
            </div>

            {{-- item --}}
            <div class="label-checkbox">
                <label>
                    <input type="checkbox" name="with_views" id="with_views" />
                    <span></span></label
                >{{ __("Destroy after number of views") }}
            </div>
            <div class="label-hidden label-hidden-alt" id="label-views">
                <label
                    ><input
                        type="number"
                        name="views"
                        id="views"
                        value="{{ old('views') }}"
                        max="100"
                    /><span>{{ __("view/s") }}</span></label
                >
            </div>

            <input
                type="submit"
                name="submit"
                value="{{ __('Create message') }}"
            />
        </form>
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/showOptions.js') }}"></script>
<script src="{{ asset('js/inputValidation.js') }}"></script>
@endsection
