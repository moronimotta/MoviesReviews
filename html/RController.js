import RUseCases from "./RUseCases.js"

export default class RController {

    constructor(ratingStar = null) {
        this.RUseCases = new RUseCases() 
        this.RUseCases.RatingStar = ratingStar
    }

    id = 0
    RUseCases = null

    Create(id) {
        this.RUseCases.Create(id)
    }

    ListaReview(id) {
        this.RUseCases.ListaReview(id)
    }
    LimpaReview(){
        this.RUseCases.LimpaReview()
    }







}