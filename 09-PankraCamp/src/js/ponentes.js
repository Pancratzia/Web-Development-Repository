(function(){

    const ponentesInput = document.querySelector('#ponentes');

    if(ponentesInput){
        let ponentes = [];

        let ponentesFiltrados = [];

        obtenerPonentes();

        async function obtenerPonentes(){
            const url = `/api/ponentes`;
        
            const resultado = await fetch(url);
            const ponentes = await resultado.json();
            console.log(ponentes);
        }

    }

})();