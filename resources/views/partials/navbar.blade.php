<nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0 inner">

        <a href="@yield("h1_route")" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">@yield("h1")</a><br>
        <a href="@yield("route")">
            <button type="menu">@yield("button")</button>
        </a>

    </div>

    @auth("web")
        <div class="sm:mb-0 self-center">
            <a href="{{route("logout")}}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Log Out</a>
        </div>
    @endauth

    @guest("web")
        <div class="sm:mb-0 self-center">
            <a href="{{route("login")}}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Log In</a>
        </div>
    @endguest


</nav>

