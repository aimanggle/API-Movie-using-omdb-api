$(document).ready(function(){
                $('.btn-primary').on('click', function(){
                    var id = $(this).val();
                    $.ajax({
                        url: 'https://www.omdbapi.com/?apikey=55f89a6&i=' + id,
                        success: function(result)
                        {
                            $('.modal-title').html(result.Title);
                            $('.modal-body').html(
                                `
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="${result.Poster}" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="list-group">
                                                <li class="list-group-item">Released : ${result.Year}</li>
                                                <li class="list-group-item">Actor : ${result.Actors}</li>
                                                <li class="list-group-item">Runtime : ${result.Runtime}</li>
                                                <li class="list-group-item">Genre : ${result.Genre}</li>
                                                <li class="list-group-item">Languange : ${result.Language}</li>
                                                <li class="list-group-item">Award : ${result.Awards}</li>
                                                <li class="list-group-item">Country : ${result.Country}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                `
                            );
                        }
                    });
                });
            });