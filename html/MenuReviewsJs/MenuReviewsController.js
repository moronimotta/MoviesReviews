import MenuReviewsUseCases from "./MenuReviewsUseCases.js"

export default class MenuReviewsController {

    constructor(tipo = "json", rController = null){
        this.useCases = new MenuReviewsUseCases(tipo)
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
