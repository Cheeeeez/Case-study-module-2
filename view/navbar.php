<header class="row">
    <div class="col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3b5998">
            <a class="navbar-brand" href="">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/mvc-exercise">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Action</a>
                            <a class="dropdown-item" href="">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Something else here</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo "Welcome, " . $_SESSION["user"]["username"]; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Action</a>
                            <a class="dropdown-item" href="./index.php?page=change-password">Change password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./index.php?page=logout">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="container-fluid m-t-20">
    <div class="row">
        <ul class="nav flex-column col-sm-2">
            <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
</div>
