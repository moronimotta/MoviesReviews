export default class RAdapterPostJSON {

    xhr = new XMLHttpRequest()
    Post(arr) {

       const jsonString = JSON.stringify(arr)

        this.xhr.open("POST", "receive.php")

        this.xhr.setRequestHeader("Content-Type", "application/json")
        this.xhr.send(jsonString)

    }



}