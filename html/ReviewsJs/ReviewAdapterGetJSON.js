export default class ReviewAdapterPostJSON {


    GetDadosDosReviews(idReview) {
        let promessa = new Promise(function (resolve, reject) {

            let output = null
            let input = {
                "imdbID": idReview
            }
            $.ajax({
                "url": "/../ReviewPhp/listaReviews.php",
                "method": "POST",
                "data": input
            }).done(function (response) {

                output = JSON.parse(response)
                resolve(output)
            })
        })
        return promessa
    }
}