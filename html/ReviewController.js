import ReviewUseCases from "./ReviewUseCases.js"

export default class ReviewController {

    constructor(tipo = "json", rController = null){
        this.useCases = new ReviewUseCases(tipo)
        this.useCases.rController = rController
    }
    useCases = null
    
    Search(str){
        this.useCases.Search(str)
        // console.log("teste")
    }
    AlteraNomeAno(nome,ano,poster){
        this.useCases.AlteraNomeAno(nome,ano,poster)
    }

}
