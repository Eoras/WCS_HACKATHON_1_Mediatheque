<div class="col-md-2 col-sm-3">
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <hr/>
            <form action="index.php" method="GET" class="text-right">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Recherche ..."/>
                        <span class="input-group-btn">
                    <button class="btn btn-info" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                    </div>
                </div>
            </form>
            <hr/>
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active">
                    <a href="index.php" class="button">
                        <span class="glyphicon glyphicon-home"> </span> Home
                    </a>
                </li>
                <hr/>
                <li role="presentation" class="active">
                    <a href="myvideos.php" class="button">
                        <span class="glyphicon glyphicon-film"> </span> My Videogame
                    </a>
                </li>
                <br/>
                <div class="collapse" id="collapseVideo">
                    <ul class="nav nav-pills nav-stacked">
                        <li>Test1</li>
                        <li>Test2</li>
                    </ul>
                </div>
            </ul>
            <hr/>

        </div><!-- /.navbar-collapse -->
    </nav>
</div>
