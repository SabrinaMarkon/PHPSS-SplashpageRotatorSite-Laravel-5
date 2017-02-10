<nav class="navbar navbar-default navbar-ea navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse text-center" id="main_navbar">
            @if (Session::has('user'))
                <ul class="nav navbar-nav">
                    <li><a href="/" id="home"><i class="fa fa-home"></i>home</a></li>
                    <li><a href="/account" id="account">account</a></li>
                    <li><a href="/profile" id="profile">profile</a></li>
                    <li><a href="/promote" id="promote">promote</a></li>
                    <li><a href="/faqs/" id="faqs">faqs</a></li>
                    <li><a href="/support/" id="support">support</a></li>
                    <li><a href="/logout" id="logout">logout</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav">
                    <li><a href="/" id="home"><i class="fa fa-home"></i>home</a></li>
                    <li><a href="/about/" id="about">about</a></li>
                    <li><a href="/terms/" id="terms">terms</a></li>
                    <li><a href="/privacy/" id="privacy">privacy</a></li>
                    <li><a href="/faqs/" id="faqs">faqs</a></li>
                    <li><a href="/support/" id="support">support</a></li>
                    <li><a href="/join/" id="join">join</a></li>
                    <li><a href="/login/" id="login">login</a></li>
                </ul>
            @endif
        </div> <!-- navbar-collapse -->
    </div>
</nav>

