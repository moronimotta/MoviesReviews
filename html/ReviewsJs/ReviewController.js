import ReviewUseCases from "./ReviewUseCases.js"

export default class ReviewController {

    constructor(ratingStar = null) {
        this.ReviewUseCases = new ReviewUseCases() 
        this.ReviewUseCases.RatingStar = ratingStar
    }

    id = 0
    ReviewUseCases = null

    CriaReview(id) {
        this.ReviewUseCases.CriaReview(id)
    }

    ListaReview(id) {
        this.ReviewUseCases.ListaReview(id)
    }
    LimpaReview(){
        this.ReviewUseCases.LimpaReview()
    }







}