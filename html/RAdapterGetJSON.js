export default class RAdapterPostJSON {


    GetDadosDosReviews() {
        let promessa = new Promise(function (resolve, reject) {

            let output = null

            $.ajax({
                "url": "/listaReviews.php",
                "method": "GET",
            }).done(function (response) {

                output = JSON.parse(response)
                resolve(output)
            })
        })
        return promessa
    }
}