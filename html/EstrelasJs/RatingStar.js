const allStars = document.querySelectorAll(".star")

export default class RatingStar {

    current_rating = 0
    itemRating = 0
    
    constructor(readOnly = false) {
        if (readOnly==true) {
            return
        }
        this.current_rating = document.querySelectorAll(".current_rating")

        
        let instance = this
        
        allStars.forEach((star, item) => {
            star.onclick = function (e) {
                e.stopPropagation()
                e.stopImmediatePropagation()
                e.preventDefault()
                let rating = []
                let current_star_level = item + 1
                $(instance.current_rating).text(`${current_star_level} de 5`)

                // rating.push(current_star_level)

                instance.pintaEstrelinhas(current_star_level)

                // itemRating = rating[rating.length - 1]
                instance.itemRating = current_star_level
                // rating = []
            }
        })

    }

    pintaEstrelinhas(current_star_level, estrelinhasAlvo =""){
        var estrelinhas = []
        if(estrelinhasAlvo == ""){
          estrelinhas = allStars
        }else{
           estrelinhas = $(`[data-imdbid='${estrelinhasAlvo}']`).get().reverse() 
        }
        
        $(estrelinhas).each(function (i, star) {
            if (current_star_level >= i + 1) {
              star.innerHTML = "&#9733"
            } else {
              star.innerHTML = "&#9734"
            }
          })
  
      }

      getRatingValue(){
        console.log(this.itemRating)
        return this.itemRating
      }


}