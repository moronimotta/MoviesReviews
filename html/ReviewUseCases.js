import ReviewAdapterJSON from "./ReviewAdapterJSON.js"
export default class ReviewUseCases {

  Adapter = null
  rController = null
  constructor(tipo = "json") {

    if (tipo == "json") {
      this.Adapter = new ReviewAdapterJSON()
    }
  }

  Search(busca) {
    let instance = this
    this.Adapter.Search(busca)
      .then(function (response) {
        $('#lista').empty()

        for (let i in response.Search) {

          let item = response.Search[i]
          let teste = instance.geraHtmlItem(item.Title, item.Year, item.Poster, item.imdbID)
          $('#lista').append(teste)
          filmesId.push(item.imdbID)
        };

      }).then(function () {
        $(".btn-ver-reviews").each(function (index) {
          // console.log(this)
          $(this).on("click", function () {
            instance.rController.id = this.id
            instance.rController.ListaReview(this.id)
            return this.id
          });
        });
      })

  }

  AlteraNomeAno(nome, ano, poster) {
    $('#item-year-modal').text(ano)
    $('#item-name-modal').text(nome)
    $('#item-poster-modal').text(poster)
  }

  geraHtmlItem(titulo = '', descricao = '', imagem = '', imdbID = '') {
    let html = `<div class="card card-primary card-outline" style="left: 50px;
                                                                width: 350px;
                                                                margin-top: 20px;
                                                                ">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid" src="${imagem}" alt="User profile picture">
                    </div>
    
                    <h3 class="profile-username text-center">${titulo}</h3>
    
                    <p class="text-muted text-center">${descricao}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                      <button type="button" class="btn btn-primary btn-ver-reviews" data-toggle="modal" data-target="#lista-review" data-backdrop="static" data-keyboard="false" id="${imdbID}">
                      Ver Reviews
                    </button>
                      </li>
                    </ul>
                  </div>
                  
                  <!-- /.card-body -->
                </div>`

    return html
  }
}

// module.exports = ReviewUseCases