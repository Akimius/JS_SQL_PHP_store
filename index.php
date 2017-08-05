<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JS STORE</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">-->

    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <div class="container">

        <div class="masthead">
            <h3 class="text-muted">Project name</h3>

            <nav class="navbar navbar-light bg-faded rounded mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
          </button>
                <div class="collapse navbar-toggleable-md" id="navbarCollapse">
                    <ul class="nav navbar-nav text-md-center justify-content-md-between">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Downloads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>Marketing stuff!</h1>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
            <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success addProduct" data-toggle="modal" data-target="#myModal">NEW PRODUCT</button>
            </div>
        </div>

        <!-- Example row of columns -->
        <div class="product-list">
            <div class="row">
                
            </div>
        </div>

        <!-- Site footer -->
        <footer class="footer">
            <p>&copy; Company 2017</p>
        </footer>

    </div>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">New Product</h4>
                </div>
                <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Product title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                    <input type="hidden" name="id" class="product-id">
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary newproduct">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->

        </div>
        <!-- /.modal-dialog -->

    </div>


    </div>
    <!-- /.modal -->


    <?php
    require 'connection.php';

    // define how many results you want per page
    $results_per_page = 3;

    $sql = "SELECT * FROM products";

    if(!$result = mysqli_query($link, $sql)) {
        json_encode(['status'=>'Error', 'msg'=>'Query failed']);
        exit();
    }
    $number_of_results = mysqli_num_rows($result);

    // determine number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);

    // determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    // determine the sql LIMIT starting number for the results on the displaying page

    $this_page_first_result = ($page-1)*$results_per_page;

    // retrieve selected results from database and display them on page

    $sql='SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;

    $result = mysqli_query($link, $sql);


    // display the links to the pages

    for ($page=1;$page<=$number_of_pages;$page++) {
        echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
    }





    ?>


    <div class="container">
        <ul class="pagination">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
    </div>
    <!-- /container -->




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>