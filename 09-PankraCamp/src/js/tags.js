(function(){

    const tagsInput = document.getElementById('tags_input');

    if( tagsInput ){

        let tags = [];
        
        tagsInput.addEventListener('keypress', guardarTag);

        function guardarTag(e){

            if(e.keyCode === 44){

                if( e.target.value.trim() === '' || e.target.value < 1 ){
                    return;
                }
                    
                e.preventDefault();
                tags = [...tags, e.target.value.trim()];
                tagsInput.value = '';
            }

        }
    }

}());