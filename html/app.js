import RController from "./RController.js"
import ReviewController from "./ReviewController.js"
import RatingStar from "./RatingStar.js"

// var itemRating
var estrelinha = new RatingStar(false)
var controllerReviews = new RController(estrelinha)

var controller = new ReviewController("json", controllerReviews)
$("#btn-search").click(function () {
   let str = $("#searchbar").val()
   controller.Search(str)

})

$("#send").click(function () {
   controllerReviews.Create(controllerReviews.id)
   controllerReviews.ListaReview(controllerReviews.id)
})

$("#fecha-modal").click(function () {
   controllerReviews.LimpaReview()
})

$("#btn-ver-reviews").click(function () {
   controllerReviews.LimpaReview()
   controllerReviews.ListaReview(controllerReviews.id)

})


