import ReviewController from "./ReviewsJs/ReviewController.js"
import MenuReviewsController from "./MenuReviewsJs/MenuReviewsController.js"
import RatingStar from "./EstrelasJs/RatingStar.js"

// var itemRating
var estrelinha = new RatingStar(false)
var controllerReviews = new ReviewController(estrelinha)

var controller = new MenuReviewsController("json", controllerReviews)
$("#btn-search").on("click", function () {
   let str = $("#searchbar").val()
   controller.Search(str)
})

$("#send").on("click", function () {
   controllerReviews.CriaReview(controllerReviews.id)
   controllerReviews.ListaReview(controllerReviews.id)
})

$("#fecha-modal").on("click", function () {
   controllerReviews.LimpaReview()
})

$("#btn-ver-reviews").on("click", function () {
   controllerReviews.LimpaReview()
   controllerReviews.ListaReview(controllerReviews.id)

})

//$("#deleta-review").click(function () {
   //controllerReviews.DeletaReview()
  // console.log("clicado")
//})


