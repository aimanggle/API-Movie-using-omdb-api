<?php

$search = $_POST['search'];

if($search)
{
    $api = 'https://www.omdbapi.com/?apikey=55f89a6&s=' . $search;
}
else
{
    $api = 'https://www.omdbapi.com/?apikey=55f89a6&s=smurf';
}

// $data = file_get_contents('https://www.omdbapi.com/?apikey=55f89a6&s=' . $search);
$data = file_get_contents($api);

$movie = json_decode($data, true);
// var_dump($movie);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Api Movie</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <div class="container-fluid">
        <div class="row mt-3 ">
            <div class="col-12">
                <h1 class="d-flex justify-content-center">Find your favourite Movie</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/api-movie/index.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search Movie" aria-label="Search Movie" aria-describedby="button-addon2">
                        <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php foreach($movie['Search'] as $m) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="<?=$m['Poster']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $m['Title'];?></h5>
                            <p class="card-text"><?= $m['Year'];?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" value="<?=$m['imdbID']?>"data-bs-target="#exampleModal">View Detail</button>
                        </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <strong>Loading...</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/api-movie/script.js"></script>

    </body>
</html>