export default ( counter: number ) => {
    if ( counter < 10 ) {
        return '0' + counter;
    }

    return counter;
}