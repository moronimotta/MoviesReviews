import Review from "./Review.js"
import RAdapterPostJSON from "./RAdapterPostJSON.js"
import RAdapterGetJSON from "./RAdapterGetJSON.js"

export default class RUseCases {

  RatingStar = null
  Review = null
  RAdapterPostJSON = null
  RAdapterGetJSON = null

  constructor() {
    this.Review = new Review()
    this.RAdapterPostJSON = new RAdapterPostJSON()
    this.RAdapterGetJSON = new RAdapterGetJSON()
  }

  contadorReviews = 0


  Create(idBotao) {
    // Variaveis dos campos do form
    let nome = document.querySelector("#name");
    let email = document.querySelector("#email");
    let review = document.querySelector("#review");
    let imdbID = idBotao;
    let spoiler = 0
    
    this.VerificaSeCriaComOuSemSpoiler(nome, email, review, imdbID, spoiler, this.RatingStar.getRatingValue())
    this.LimpaForm();
    this.LimpaExibe();
  }


  VerificaSeCriaComOuSemSpoiler(nome, email, review, imdbID, spoiler, rating) {
    if ($("#box-spoiler").is(":checked")) {
      spoiler = 1
    }
      let r = new Review(nome.value, email.value, review.value, imdbID, spoiler, rating)

    let input = {
      "dados": r
    }
    $.ajax({
      "url":"/criaReview.php" ,
            "method": "POST",
            "data": input
    })
  }

ListaReview(id) {

  let idReview = id
  this.VerificaUserQuerSpoiler(idReview)
  this.ContaNumeroReviews(this.contadorReviews)

}




  VerificaUserQuerSpoiler(idReview) {
    let instance = this

    this.RAdapterGetJSON.GetDadosDosReviews()
    .then(function(response){
      if ($("#spoiler-alert").is(":checked")){
        instance.Listagem(idReview, response, 1)
      }else{
        instance.Listagem(idReview, response, 0)
      }
      
    })
  }

  Listagem(id, tipoReview, spoilerFree) {
    let spoiler = spoilerFree

    let instance = this
    // console.log(tipoReview)
    for (let item in tipoReview) {
      if (tipoReview[item].imdbID == id && spoiler == 1){
        $("#user-review").append(this.CriaCardReview(tipoReview[item].nome, tipoReview[item].email, tipoReview[item].review, tipoReview[item].rating, id))
        instance.RatingStar.pintaEstrelinhas(tipoReview[item].rating,tipoReview[item].rating)
        instance.contadorReviews++
      }
      else if(tipoReview[item].imdbID == id && spoiler == 0) {
        if(tipoReview[item].spoiler == false) {
          $("#user-review").append(this.CriaCardReview(tipoReview[item].nome, tipoReview[item].email, tipoReview[item].review, tipoReview[item].rating, id))
          instance.RatingStar.pintaEstrelinhas(tipoReview[item].rating,tipoReview[item].rating)
          instance.contadorReviews++
        }
      }
    }
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

  CriaCardReview(nome = '', email = '', review = '', rating="") {
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
        </div>
      </div>
      `
    return card
  }


}