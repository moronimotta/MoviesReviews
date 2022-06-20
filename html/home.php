<style>
  .poster {
    float: left;
    margin-right: 10px;
  }

  .bi-twitter {
    float: right;
  }

  .input-review {
    color: black;
  }

  .modal-header {
    display: block;
  }

  .bg-info {
    background-color: darkgoldenrod;
    color: white;
  }

.check-lista-reviews{
  float: right;
}

.star_rating {
  user-select: none;
 padding-left: 555px;
  float: right;
}
.star {
  font-size: 20px;
  color: #ff9800;
  background-color: unset;
  border: none;
  padding: 0px;
}
.review-star_rating {
  user-select: none;
  float: right;
}
.review-star {
  font-size: 20px;
  color: #ff9800;
  background-color: unset;
  border: none;
  padding: 0px;
  float: right;
}
.review-star:hover {
  cursor: default;
}
.star:hover {
  cursor: pointer;
}

.star_rating_2 {
  user-select: none;
 padding-left: 555px;
  float: right;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

<!-- SearchBar -->
<div class="form-inline">
  <div class="input-group">
    <input class="form-control wrapper" type="search" placeholder="Search" aria-label="Search" id="searchbar">
    <div class="input-group-append">
      <button class="btn btn-sidebar" id="btn-search"><i class="fas fa-search fa-fw"></i></button>
    </div>
  </div>
</div>


<!--Check List Modal -->
<div class="modal fade bd-example-modal-lg" id="lista-review" aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h4 class="modal-title">Lista de Reviews</h4>
      </div>
      <div class="modal-body" style="overflow-y: auto; height:80vh;">
        <img src="https://rotacult.com.br/wp-content/uploads/2022/03/Top-Gun-Maverick.png" class="poster" id="item-poster-modal" height="98" width="67">
        <h4 id="item-name-modal">Avengers Endgame</h4>
        <h4 id="item-year-modal">(2019) </h4>

        <h6><i id="numero-reviews"></i><i> Reviews</i></h6>
        <div class="form-check check-lista-reviews">
          <input type="checkbox" class="form-check-input check-lista-reviews" id="spoiler-alert">
          <label class="form-check-label check-lista-reviews" for="exampleCheck1">Spoilers</label>
          
        </div>
        <a class="bi bi-plus-circle-fill" data-toggle="modal" data-target="#create-review"><i> Adicionar Review</i></a>
       
        <ul id="modal-list"></ul>
        <div id="user-review">

        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal" id="fecha-modal">Fechar</button>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-review">Criar Review</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Create Review Modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" id="create-review" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <img src="https://rotacult.com.br/wp-content/uploads/2022/03/Top-Gun-Maverick.png" class="poster" height="98" width="67">
        <h4>Avengers Endgame (2019)</h4>
        <h5><i>Sua Avaliação</i></h5>
      </div>
      <div class="modal-body">
        <div class="card card-secondary">

          <form>
            <div class="card-body input-review">
              <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="Digite seu nome">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Digite seu email">
              </div>
              <div class="form-group">

                <label for="exampleInputPassword1">Review</label>
                <textarea class="form-control" rows="3" placeholder="Melhor blockbuster do ano! ..." style="height: 140px;" id="review"></textarea>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="box-spoiler">
                  <label class="form-check-label" for="exampleCheck1">Spoiler!
                      <div class="star_rating">
                        <button class="star">&#9734;</button>
                        <button class="star">&#9734;</button>
                        <button class="star">&#9734;</button>
                        <button class="star">&#9734;</button>
                        <button class="star">&#9734;</button>
                        <p class="current_rating">0 de 5</p>
                      </div>
                  </label>
                </div>
              </div>


            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" id="send" data-dismiss="modal">Enviar</button>
        <button type="button" class="btn btn-outline-light" data-dismiss="modal" data-toggle="modal">Fechar</button>
      </div>
    </div>
  </div>

</div>



<div id='lista'>

</div>
<script type="module" src="EstrelasJs/RatingStar.js"></script>
<script type="module" src="ReviewsJs/Review.js"></script>
<script type="module" src="app.js"></script>

<!-- <script src="ReviewUseCases.js"></script> -->
<!-- <script src="ReviewAdapterJSON.js"></script> -->
<script>
  var filmesId = []

</script>