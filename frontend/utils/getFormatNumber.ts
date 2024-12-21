export default ( counter: Number ) => {
    if ( counter < 10 ) {
        return '0' + counter;
    }

    return counter;
}