class LinkedSelect {

    /**
     * 
     * @param {HTMLSelectElement} $select 
     */
    constructor($select){
        this.$select = $select
        this.$target = document.querySelector(this.$select.dataset.target)
        this.$placeholder = this.$target.firstElementChild
        this.onChange = this.onChange.bind(this)
        this.$select.addEventListener('change', this.onChange)
    }

    /**
     * Se déclenche au changement de valeur d'un select
     * @param {Event} e 
     */
    onChange(e) {
        // on récupère les données en AJAX
        let request = new XMLHttpRequest()
        request.open('GET', this.$select.dataset.source.replace('$id', e.target.value), true)
        request.onload = () => {
            if(request.status >= 200 && request.status < 400) {
                let data = JSON.parse(request.responseText)
                let options = data.reduce(function(acc,option) {
                    return acc + '<option value="'+option.value + '">' + option.label + '</option>'
                },'')
                this.$target.innerHTML = options
                this.$target.insertBefore(this.$placeholder, this.$target.firstChild)
                this.$target.selectedIndex = 0
                this.$target.style.display = null
            }
        }
        request.onerror = function() {
            alert('Impossible de charger la liste')
        }
        request.send()
        // on injecte les données dans le prochain select
    }
}





let $selects = document.querySelectorAll('.linked-select')
$selects.forEach(function ($select) {
    new LinkedSelect($select)
})
