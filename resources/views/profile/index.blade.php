@extends('layouts.main')

@section('content')
    <body body style="background-color: #D9D9D9">
        <div class="Div">
            <h1 class="text-4xl font-semi-bold text-black">Personal Info</h1>
            <h2 class="line"></h2>
            <img src="https://i.pinimg.com/236x/47/5a/86/475a86177aeedacf8dc7f5e2b4eff61f.jpg" alt="default" style="float: left; margin-right: 15px" >
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                ชื่อ-นามสกุล
                <h1 id="name-show">
                    {{Auth::user()->name}}
                </h1>
            </h1>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                ชั้นปี
                <h1 id="year-show">
                    @if (Auth::user()->year == null)
                        -
                    @else
                        {{Auth::user()->year}}
                    @endif
                </h1>
            </h1>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                คณะ
                <h1 id="faculty-show">
                    @if (Auth::user()->faculty == null)
                        -
                    @else
                        {{Auth::user()->faculty}}
                    @endif
                </h1>
            </h1>
                {{-- <div class="bio">
                    bio
                </div> --}}
                <textarea readonly name="bio" id="bio" cols="20" rows="10" >bio</textarea>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                อีเมล
                <h1 id="email-show">
                    {{Auth::user()->email}}
                </h1>
            </h1>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                เบอร์
                <h1 id="tel-show">
                    @if (Auth::user()->tel == null)
                        -
                    @else
                        {{Auth::user()->tel}}
                    @endif
                </h1>
            </h1>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                ID LINE
                <h1 id="line-show">
                    @if (Auth::user()->line_account == null)
                        -
                    @else
                        {{Auth::user()->line_account}}
                    @endif
                </h1>
            </h1>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                FACEBOOK
                <h1 id="fb-show">
                    @if (Auth::user()->facebook_account == null)
                        -
                    @else
                        {{Auth::user()->facebook_account}}
                    @endif
                </h1>
            </h1>
            <h1 style="margin-top: 50px ; padding-left: 250px; ">
                INSTAGRAM
                <h1 id="ig-show">
                    @if (Auth::user()->instagram_account == null)
                        -
                    @else
                        {{Auth::user()->instagram_account}}
                    @endif
                </h1>
            </h1>
            <div style="margin-top: 50px; text-align: center; ">
                <a href="{{  route('profile.edit')   }}">
                    <button class="button" style="background-color: #A1C77B; border-radius: 25px; padding: 10px;">EDIT PROFILE</button>
                </a>
            </div>



        </div>
    </body>
@endsection
