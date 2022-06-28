import Review from "./Review.js"
import ReviewAdapterGetJSON from "./ReviewAdapterGetJSON.js"

export default class ReviewUseCases {

  RatingStar = null
  Review = null
  ReviewAdapterGetJSON = null

  constructor() {
    this.Review = new Review()
    this.ReviewAdapterGetJSON = new ReviewAdapterGetJSON()
  }

  contadorReviews = 0

  idReviewDeletar = 0

  DeletaReview(idReview){
    let id = idReview
    let input = {
      "id": id
    }
  
    $.ajax({
      "url":"/../ReviewPhp/deletaReviews.php",
      "method": "POST",
      "data": input
    })
  
  }

  CriaReview(idBotao) {
    // Variaveis dos campos do form
    let nome = document.querySelector("#name");
    let email = document.querySelector("#email");
    let review = document.querySelector("#review");
    let imdbID = idBotao;
    let spoiler = 0
    let id =0
    
    this.VerificaSeCriaComOuSemSpoiler(nome, email, review, imdbID, spoiler, this.RatingStar.getRatingValue(), id)
    this.LimpaForm();
    this.LimpaExibe();
  }


  VerificaSeCriaComOuSemSpoiler(nome, email, review, imdbID, spoiler, rating, id) {
    if ($("#box-spoiler").is(":checked")) {
      spoiler = 1
    }
      let r = new Review(nome.value, email.value, review.value, imdbID, spoiler, rating, id)

    let input = {
      "dados": r
    }
    $.ajax({
      "url":"/../ReviewPhp/criaReviewBanco.php" ,
            "method": "POST",
            "data": input
    })
  }

ListaReview(btnVerMaisId) {

  let btnId = btnVerMaisId
  this.VerificaUserQuerSpoiler(btnId)
  this.MediaReviews(btnId)
  this.ContaNumeroReviews(this.contadorReviews)

}



  VerificaUserQuerSpoiler(btnId) {
    let instance = this

    this.ReviewAdapterGetJSON.GetDadosDosReviews(btnId)
    .then(function(response){
      if ($("#spoiler-alert").is(":checked")){
        instance.CriaCardReview(btnId, response, 1)
      }else{
        instance.CriaCardReview(btnId, response, 0)
      }
    })
  }

  //get data from mediaReviews.php
  MediaReviews(btnId) {
    let input = {
      "imdbID": btnId
  }
    $.ajax({
      "url":"/../ReviewPhp/mediaReviews.php" ,
    "method": "POST",
    "data": input
  }).done(function(response){
    let average = parseInt(Math.round(response))
    if(average>=3) {
      $("#average-icon").prop("src", "https://www.rottentomatoes.com/assets/pizza-pie/images/icons/audience/aud_score-fresh.6c24d79faaf.svg")
    }else {}
  })

}

  CriaCardReview(btnId, response, spoilerFreeBox) {
    let spoiler = spoilerFreeBox

    let instance = this
    for (let item in response) {
      if (response[item].imdbID == btnId && spoiler == 1){
        $("#user-review").append(this.TemplateCardReview(response[item].nome, response[item].email, response[item].review, response[item].rating, response[item].id))
        instance.RatingStar.pintaEstrelinhas(response[item].rating,response[item].rating)
        instance.contadorReviews++
      }
      else if(response[item].imdbID == btnId && spoiler == 0) {
        if(response[item].spoiler == false) {
          $("#user-review").append(this.TemplateCardReview(response[item].nome, response[item].email, response[item].review, response[item].rating, response[item].id))
          instance.RatingStar.pintaEstrelinhas(response[item].rating,response[item].rating)
          instance.contadorReviews++
        }
      }

    }
    $(".btn-deletar-review").each(function (index) {
      $(this).on("click", function () {
        let idReview = $(this).data("idreview")
        instance.DeletaReview(idReview)
      });
    });
  }












  ContaNumeroReviews(contadorReviews) {
    $("#numero-reviews").text(contadorReviews)
  }

  LimpaForm() {
    $("#name").val("")
    $("#email").val("")
    $("#review").val("")
    $("#box-spoiler").prop('checked', false);
    $(".star").html("&#9734")
    $(".current_rating").html("0 de 5")

  }

  LimpaExibe() {
    this.LimpaReview()
    this.ListaReview()
    this.contadorReviews = 0
  }

  LimpaReview() {
    document.querySelector("#user-review").innerHTML = "";
    this.contadorReviews = 0
  }

  TemplateCardReview(nome = '', email = '', review = '', rating="", id = '') {
    let card = `
        <div class="card">
        <div class="card-header">
          <h5>${nome} 
          <div class="review-star_rating">
          <button class="review-star" data-imdbid="${rating}" >&#9734;</button>
          <button class="review-star" data-imdbid="${rating}">&#9734;</button>
          <button class="review-star" data-imdbid="${rating}">&#9734;</button>
          <button class="review-star" data-imdbid="${rating}">&#9734;</button>
          <button class="review-star" data-imdbid="${rating}">&#9734;</button>
        </div>
          </h5>
          <h6>${email}</h6>
        </div>
        <div class="card-body">
          <p class="card-text">${review}</p>
          <h6><button type="button" id="deleta-review" data-idreview="${id}" class="btn btn-danger btn-deletar-review" style="float: right">Deletar Review</button></h6>
        </div>
      </div>
      `
    return card
  }


}