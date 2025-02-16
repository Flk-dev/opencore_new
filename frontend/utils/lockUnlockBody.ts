const luBody = () => {
    const body = document.querySelector( 'body' );
    if(body){
        body.classList.toggle( '_lock' );
    }
}

export default luBody;