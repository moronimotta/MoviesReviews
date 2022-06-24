
export default class MenuReviewsAdapterJSON {

    Search(procura){
        let promessa = new Promise(function(resolve, reject){
             // Requisição Get
        let settings = {
            "url":"/../movies.json" ,
            "method": "GET",
          };
          let output = {
            // A resposta dela deve ser um array com todos os elementos na Search Bar
            Search : []
        }
          $.ajax(settings).done(function(response) {
            // Loop para verificar o que deve ser empurrado para o Array
            for(let i in response){
                let filme = response[i]
                if(filme.Title.includes(procura)) {
                    output.Search.push(filme)
                    // console.log(filme)
                }
            }
            // Retorna o Objeto com todos os filmes filtrados
            resolve(output) 
          })
          
        })
       return promessa
    }
}